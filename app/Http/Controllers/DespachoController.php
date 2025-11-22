<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\OrdenDespacho;
use App\Models\DetalleDespacho;
use App\Models\Producto;
use App\Models\Documento;
use App\Models\Historial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Despacho;

class DespachoController extends Controller
{   
    public function index()
{
    $despachos = OrdenDespacho::all(); 
    return view('despacho.index', compact('despachos'));
}



    public function create($id)
    {
        // Buscar el pedido usando el ID pasado como parámetro
        $pedido = Pedido::with('detallePedidos.producto')->findOrFail($id);

        // Pasar el pedido a la vista para usarlo en el formulario de creación de despacho
        return view('despacho.create', compact('pedido'));
    }

    // guardar la guia despacho
    public function store(Request $request)
    {
        $request->validate([
            'id_pedido' => 'required|exists:pedidos,id',
            'fecha' => 'required|date',
            'productos' => 'required|array',
            'productos.*.id_producto' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:0',
        ]);

        DB::beginTransaction();

        try {
            // 1. Crear guía de despacho
            $despacho = OrdenDespacho::create([
                'id_pedido' => $request->id_pedido,
                'fecha_recepcion' => $request->fecha,
                'estado' => 'Recibido'
            ]);

            // 2. Guardar detalle de despacho
            foreach ($request->productos as $item) {

                // Crear detalle despacho
                DetalleDespacho::create([
                    'id_orden' => $despacho->id,
                    'id_producto' => $item['id_producto'],
                    'cantidad_recibida' => $item['cantidad'],
                ]);

                // SUMAR STOCK AL PRODUCTO
                $producto = Producto::find($item['id_producto']);
                $producto->stock += $item['cantidad'];
                $producto->save();
            }

            // 3. Cambiar estado del pedido a recibido
            Pedido::find($request->id_pedido)->update([
                'estado' => 'Recibido'
            ]);

            DB::commit();

            return redirect()->route('pedidos.index')
                ->with('success', 'Guía de despacho registrada y stock actualizado correctamente.');
        
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    // ========================
// EDITAR DESPACHO
// ========================
public function edit($id)
{
    $despacho = OrdenDespacho::with('detalleDespachos.producto')->findOrFail($id);
    return view('despacho.edit', compact('despacho'));
}


// ========================
// ACTUALIZAR DESPACHO
// ========================
public function update(Request $request, $id)
{
    // Validación
    $request->validate([
        'fecha_recepcion' => 'required|date',
        'estado' => 'required|string',
        'productos' => 'required|array',
        'productos.*.id_detalle' => 'required|exists:detalle_despacho,id',
        'productos.*.cantidad_recibida' => 'required|integer|min:0',
    ]);

    DB::beginTransaction();

    try {
        $despacho = OrdenDespacho::findOrFail($id);

        // Actualizar datos generales
        $despacho->update([
            'fecha_recepcion' => $request->fecha_recepcion,
            'estado' => $request->estado
        ]);

        // Actualizar detalles
        foreach ($request->productos as $item) {
            $detalle = DetalleDespacho::find($item['id_detalle']);

            // Ajustar stock SOLO si cambió la cantidad
            $diferencia = $item['cantidad_recibida'] - $detalle->cantidad_recibida;

            if ($diferencia !== 0) {
                $producto = Producto::find($detalle->id_producto);
                $producto->stock += $diferencia;
                $producto->save();
            }

            $detalle->update([
                'cantidad_recibida' => $item['cantidad_recibida']
            ]);
        }

        DB::commit();

        return redirect()->route('despachos.index')
            ->with('success', 'Despacho actualizado correctamente.');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage());
    }
}


// ========================
// ELIMINAR DESPACHO
// ========================
public function destroy($id)
{
    DB::beginTransaction();

    try {
        $despacho = OrdenDespacho::with('detalleDespachos')->findOrFail($id);

        // Revertir stock
        foreach ($despacho->detalleDespachos as $detalle) {
            $producto = Producto::find($detalle->id_producto);
            $producto->stock -= $detalle->cantidad_recibida; // quitar lo que se sumó
            $producto->save();
        }

        // Eliminar detalles
        DetalleDespacho::where('id_orden', $despacho->id)->delete();

        // Eliminar despacho
        $despacho->delete();

        DB::commit();

        return redirect()->route('despachos.index')
            ->with('success', 'Despacho eliminado correctamente.');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Error al eliminar despacho: ' . $e->getMessage());
    }
}
    public function show($id)
{
    // Buscar la orden de despacho con sus relaciones
    $despacho = OrdenDespacho::with([
        'pedido.distribuidor',
        'detalleDespachos.producto'
    ])->findOrFail($id);

    return view('despacho.show', compact('despacho'));
}

}