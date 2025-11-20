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

class DespachoController extends Controller
{
    // crear guia de despacho desde un pedido
    public function create($id)
    {
        $pedido = Pedido::with('detallePedidos.producto')->findOrFail($id);

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
}