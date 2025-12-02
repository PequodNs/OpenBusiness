<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Distribuidor;
use App\Models\Documento;
use App\Models\Producto;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    //Mostrar todos los pedidos

    public function index()
    {
        $pedidos = Pedido::with('distribuidor')->orderBy('id','desc')->get();
        return view('pedidos.index', compact('pedidos'));
    }


    //Mostrar formulario para crear un nuevo pedido
    public function create()
    {
        $proveedores = \App\Models\Distribuidor::all();
        $productos   = \App\Models\Producto::all();

        return view('pedidos.create', compact('proveedores', 'productos'));
    }

    public function edit($id)
    {  
        $pedido = Pedido::findOrFail($id);

        // Asegurémonos de que las fechas son convertidas correctamente a Carbon
        $pedido->fecha_pedido = \Carbon\Carbon::parse($pedido->fecha_pedido);
        $pedido->fecha_entrega = \Carbon\Carbon::parse($pedido->fecha_entrega);

        // Obtener todos los distribuidores
        $distribuidores = Distribuidor::all();

        return view('pedidos.edit', compact('pedido', 'distribuidores'));
    }


    
    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $request->validate([
            'id_distribuidor' => 'required|exists:distribuidores,id',
            'fecha_pedido' => 'required|date',
            'fecha_entrega' => 'required|date',
            'estado' => 'required|in:pendiente,en_proceso,completado,cancelado',
            'observaciones' => 'nullable|string',
        ]);

        // Encontrar el pedido y actualizar sus datos
        $pedido = Pedido::findOrFail($id);
        $pedido->update([
            'id_distribuidor' => $request->id_distribuidor,
            'fecha_pedido' => $request->fecha_pedido,
            'fecha_entrega' => $request->fecha_entrega,
            'estado' => $request->estado,
            'observaciones' => $request->observaciones,
        ]);

        // Registrar historial 
         Historial::create([
        'id_usuario' => Auth::id(),
        'accion' => 'Editar Pedido',
        'detalles' => "Se Edito el Pedido con la ID : {$pedido->id} (Fecha {$pedido->fecha_pedido})"
        ]);

        // Redirigir a la vista del pedido con un mensaje de éxito
        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido actualizado correctamente.');
    }   

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        // Registrar historial 
         Historial::create([
        'id_usuario' => Auth::id(),
        'accion' => 'Cancelar Pedido',
        'detalles' => "Se Cancelo el Pedido con la ID : {$pedido->id} (Fecha {$pedido->fecha_pedido})"
        ]);

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado correctamente.');
    }

    //Guardar un nuevo pedido
        public function store(Request $request)
    {
        $request->validate([
            'id_distribuidor' => 'required|exists:distribuidores,id',
            'fecha_pedido'    => 'required|date',
            'productos'       => 'required|array|min:1',
        ]);

        // Crear pedido
        $pedido = Pedido::create([
            'id_distribuidor' => $request->id_distribuidor,
            'fecha_pedido'    => $request->fecha_pedido,
            'estado'          => 'pendiente',
            'id_usuario'      => Auth::id(),
        ]);

        // Crear detalle de productos
        foreach ($request->productos as $item) {
            if (!$item['id_producto']) continue;

            DetallePedido::create([
                'id_pedido'     => $pedido->id,
                'id_producto'   => $item['id_producto'],
                'cantidad'      => $item['cantidad'],
                'precio_unitario' => $item['precio_unitario']
            ]);
        }

        // Guardar documento si existe
        if ($request->archivo) {
            $path = $request->archivo->store('documentos_pedido');

            Documento::create([
                'nombre'        => $request->archivo->getClientOriginalName(),
                'ruta_archivo'  => $path,
                'tipo_documento'=> $request->tipo_documento,
                'id_pedido'     => $pedido->id,
            ]);
        }

        // Registrar historial 
         Historial::create([
        'id_usuario' => Auth::id(),
        'accion' => 'Crear Pedido',
        'detalles' => "Se Creo el Pedido con la ID : {$pedido->id} (Fecha {$pedido->fecha_pedido})"
        ]);

        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido creado exitosamente');
    }


    //Mostrar detalles de un pedido
    public function show($id)
    {
        // Cambia 'detalles' por 'detallePedidos' para que coincida con el nombre de la relación en el modelo
        $pedido = Pedido::with('distribuidor', 'detallePedidos.producto')->findOrFail($id);

        return view('pedidos.show', compact('pedido'));
    }

//cambiar estado del pedido

public function actualizarEstado(Request $request, $id){

    $pedido = Pedido::findOrFail($id);
    $pedido->estado = $request->estado;
    $pedido->save();

    Historial::create([
        'accion' => 'Actualización de Estado de Pedido',
        'descripcion' => 'Se actualizó el estado del pedido con ID: ' . $pedido->id . ' a ' . $request->estado,
        'id_usuario' => Auth::id()
    ]);

    return redirect()->back()->with('success', 'Estado del pedido actualizado exitosamente.');
}


//Cancelar un pedido

public function cancelar($id){

    $pedido = Pedido::findOrFail($id);
    $pedido->estado = 'Cancelado';
    $pedido->save();

    Historial::create([
        'accion' => 'Cancelación de Pedido',
        'descripcion' => 'Se canceló el pedido con ID: ' . $pedido->id,
        'id_usuario' => Auth::id()
    ]);

    return redirect()->back()->with('success', 'Pedido cancelado exitosamente.');}



}

