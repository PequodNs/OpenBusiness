@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="max-w-7xl mx-auto mt-10 px-4 text-gray-900">

    <h1 class="text-3xl font-bold mb-6 text-gray-800">Panel de Control</h1>

    {{-- ======= CARDS DE RESUMEN ======= --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

        <div class="bg-white shadow-lg rounded-xl p-6 border">
            <p class="text-sm text-gray-500 font-semibold">Productos Totales</p>
            <h3 class="text-3xl font-bold">{{ $total_productos }}</h3>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 border">
            <p class="text-sm text-gray-500 font-semibold">Pedidos Pendientes</p>
            <h3 class="text-3xl font-bold">{{ $total_pedidos_pendientes }}</h3>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 border">
            <p class="text-sm text-gray-500 font-semibold">Stock Bajo</p>
            <h3 class="text-3xl font-bold">{{ $stock_bajo->count() }}</h3>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 border">
            <p class="text-sm text-gray-500 font-semibold">Últimos pedidos</p>
            <h3 class="text-3xl font-bold">{{ $ultimos_pedidos->count() }}</h3>
        </div>

    </div>


    {{-- ======= TABLA STOCK BAJO ======= --}}
    <div class="bg-white shadow-lg rounded-xl p-6 border mb-10">

        <h2 class="text-xl font-bold mb-4">Productos con Stock Crítico</h2>

        @if($stock_bajo->isEmpty())
            <p class="text-gray-600">No hay productos con stock crítico.</p>
        @else
            <table class="w-full text-left border">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2">Producto</th>
                        <th class="p-2">Stock</th>
                        <th class="p-2">Mínimo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stock_bajo as $producto)
                    <tr class="border-b">
                        <td class="p-2">{{ $producto->nombre }}</td>
                        <td class="p-2">{{ $producto->stock }}</td>
                        <td class="p-2">{{ $producto->stock_minimo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>


    {{-- ======= TABLA PEDIDOS PENDIENTES ======= --}}
    <div class="bg-white shadow-lg rounded-xl p-6 border mb-10">

        <h2 class="text-xl font-bold mb-4">Pedidos Pendientes</h2>

        @if($pedidos_pendientes->isEmpty())
            <p class="text-gray-600">No hay pedidos pendientes.</p>
        @else
            <table class="w-full text-left border">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Proveedor</th>
                        <th class="p-2">Fecha Pedido</th>
                        <th class="p-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos_pendientes as $pedido)
                    <tr class="border-b">
                        <td class="p-2">{{ $pedido->id }}</td>
                        <td class="p-2">{{ $pedido->distribuidor->nombre ?? 'N/A' }}</td>
                        <td class="p-2">{{ $pedido->fecha_pedido }}</td>
                        <td class="p-2">
                            <a href="{{ route('pedidos.show', $pedido->id) }}"
                                class="text-blue-600 hover:underline">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>


    {{-- ======= ÚLTIMOS PEDIDOS ======= --}}
    <div class="bg-white shadow-lg rounded-xl p-6 border mb-10">

        <h2 class="text-xl font-bold mb-4">Últimos Pedidos</h2>

        <table class="w-full text-left border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Proveedor</th>
                    <th class="p-2">Estado</th>
                    <th class="p-2">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ultimos_pedidos as $pedido)
                <tr class="border-b">
                    <td class="p-2">{{ $pedido->id }}</td>
                    <td class="p-2">{{ $pedido->distribuidor->nombre ?? 'N/A' }}</td>
                    <td class="p-2">{{ $pedido->estado }}</td>
                    <td class="p-2">{{ $pedido->fecha_pedido }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@endsection
