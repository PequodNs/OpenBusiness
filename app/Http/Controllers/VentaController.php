<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Historial;


class VentaController extends Controller
{

    public function index()
    {
        $ventas = Venta::with('usuario')->orderBy('id', 'desc')->get();
        return view('ventas.index', compact('ventas'));
    }
    public function create()
{
    $productos = Producto::all();
    return view('ventas.create', compact('productos'));
}

public function store(Request $request)
{
    $request->validate([
        'productos' => 'required|array',
        'productos.*.id_producto' => 'required|exists:productos,id',
        'productos.*.cantidad' => 'required|integer|min:1',
    ]);

    DB::beginTransaction();

    try {
        // Crear venta
        $venta = Venta::create([
            'id_usuario' => Auth::id(),
            'fecha' => now(),
            'total' => 0
        ]);

        $total = 0;

        foreach ($request->productos as $item) {
            $producto = Producto::findOrFail($item['id_producto']);

            // Validación: stock disponible
            if ($producto->stock < $item['cantidad']) {
                throw new \Exception("No hay stock suficiente para el producto {$producto->nombre}");
            }

            $subtotal = $producto->precio * $item['cantidad'];
            $total += $subtotal;

            // Crear detalle venta
            DetalleVenta::create([
                'id_venta' => $venta->id,
                'id_producto' => $producto->id,
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $producto->precio,
                'subtotal' => $subtotal
            ]);

            // Restar stock
            $producto->stock -= $item['cantidad'];
            $producto->save();
        }

        // Actualizar el total de la venta
        $venta->total = $total;
        $venta->save();


        DB::commit();

        return redirect()->route('ventas.show', $venta->id)
            ->with('success', 'Venta registrada correctamente');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage());
    }
}


public function show($id)
{
    $venta = Venta::with('detalles.producto', 'usuario')->findOrFail($id);
    return view('ventas.show', compact('venta'));
}
}
