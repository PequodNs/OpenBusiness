<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Pedido;

class DashboardController extends Controller
{
    public function index()
    {
        $stock_bajo = Producto::whereColumn('stock', '<=', 'stock_minimo')->take(5)->get();

        $pedidos_pendientes = Pedido::where('estado', 'Pendiente')->take(5)->get();

        $total_productos = Producto::count();

        $total_pedidos_pendientes = Pedido::where('estado', 'Pendiente')->count();

        $ultimos_pedidos = Pedido::latest()->take(5)->get();

        return view('dashboard', compact(
                    'stock_bajo',
                    'pedidos_pendientes',
                    'total_productos',
                    'total_pedidos_pendientes',
                    'ultimos_pedidos'
            ));

    }
}
