@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="max-w-7xl mx-auto mt-10 px-4 
            text-[rgb(var(--color-text))]">

    <!-- TÍTULO -->
    <h1 class="text-3xl font-bold mb-6">Panel de Control</h1>


    {{-- ======= CARDS DE RESUMEN ======= --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

        <!-- CARD -->
        <div class="shadow-lg rounded-xl p-6 border 
                    bg-[rgb(var(--color-bg))] 
                    border-[rgb(var(--color-border))]">
            <p class="text-sm font-semibold opacity-70">Productos Totales</p>
            <h3 class="text-3xl font-bold">{{ $total_productos }}</h3>
        </div>

        <div class="shadow-lg rounded-xl p-6 border
                    bg-[rgb(var(--color-bg))]
                    border-[rgb(var(--color-border))]">
            <p class="text-sm font-semibold opacity-70">Pedidos Pendientes</p>
            <h3 class="text-3xl font-bold">{{ $total_pedidos_pendientes }}</h3>
        </div>

        <div class="shadow-lg rounded-xl p-6 border
                    bg-[rgb(var(--color-bg))]
                    border-[rgb(var(--color-border))]">
            <p class="text-sm font-semibold opacity-70">Stock Bajo</p>
            <h3 class="text-3xl font-bold">{{ $stock_bajo->count() }}</h3>
        </div>

        <div class="shadow-lg rounded-xl p-6 border
                    bg-[rgb(var(--color-bg))]
                    border-[rgb(var(--color-border))]">
            <p class="text-sm font-semibold opacity-70">Últimos pedidos</p>
            <h3 class="text-3xl font-bold">{{ $ultimos_pedidos->count() }}</h3>
        </div>

    </div>


    {{-- ======= TABLA STOCK BAJO ======= --}}
    <div class="shadow-lg rounded-xl p-6 border mb-10
                bg-[rgb(var(--color-bg))]
                border-[rgb(var(--color-border))]">

        <h2 class="text-xl font-bold mb-4">Productos con Stock Crítico</h2>

        @if($stock_bajo->isEmpty())
            <p class="opacity-70">No hay productos con stock crítico.</p>
        @else

            <table class="w-full text-left rounded-lg overflow-hidden
                           border border-[rgb(var(--color-border))]">

                <thead class="bg-[rgb(var(--color-hover))] 
                             border-b border-[rgb(var(--color-border))]">
                    <tr>
                        <th class="p-2 font-semibold">Producto</th>
                        <th class="p-2 font-semibold">Stock</th>
                        <th class="p-2 font-semibold">Mínimo</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[rgb(var(--color-border))]">
                    @foreach($stock_bajo as $producto)
                    <tr class="hover:bg-[rgb(var(--color-hover))] transition">
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
    <div class="shadow-lg rounded-xl p-6 border mb-10
                bg-[rgb(var(--color-bg))]
                border-[rgb(var(--color-border))]">

        <h2 class="text-xl font-bold mb-4">Pedidos Pendientes</h2>

        @if($pedidos_pendientes->isEmpty())
            <p class="opacity-70">No hay pedidos pendientes.</p>
        @else

            <table class="w-full text-left rounded-lg overflow-hidden
                           border border-[rgb(var(--color-border))]">

                <thead class="bg-[rgb(var(--color-hover))] 
                             border-b border-[rgb(var(--color-border))]">
                    <tr>
                        <th class="p-2 font-semibold">ID</th>
                        <th class="p-2 font-semibold">Proveedor</th>
                        <th class="p-2 font-semibold">Fecha Pedido</th>
                        <th class="p-2 font-semibold">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[rgb(var(--color-border))]">
                    @foreach($pedidos_pendientes as $pedido)
                    <tr class="hover:bg-[rgb(var(--color-hover))] transition">
                        <td class="p-2">{{ $pedido->id }}</td>
                        <td class="p-2">{{ $pedido->distribuidor->nombre ?? 'N/A' }}</td>
                        <td class="p-2">{{ $pedido->fecha_pedido }}</td>
                        <td class="p-2">
                            <a href="{{ route('pedidos.show', $pedido->id) }}"
                               class="underline hover:opacity-70 transition">
                               Ver
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        @endif

    </div>


    {{-- ======= ÚLTIMOS PEDIDOS ======= --}}
    <div class="shadow-lg rounded-xl p-6 border mb-10
                bg-[rgb(var(--color-bg))]
                border-[rgb(var(--color-border))]">

        <h2 class="text-xl font-bold mb-4">Últimos Pedidos</h2>

        <table class="w-full text-left rounded-lg overflow-hidden
                       border border-[rgb(var(--color-border))]">

            <thead class="bg-[rgb(var(--color-hover))] 
                         border-b border-[rgb(var(--color-border))]">
                <tr>
                    <th class="p-2 font-semibold">ID</th>
                    <th class="p-2 font-semibold">Proveedor</th>
                    <th class="p-2 font-semibold">Estado</th>
                    <th class="p-2 font-semibold">Fecha</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-[rgb(var(--color-border))]">
                @foreach($ultimos_pedidos as $pedido)
                <tr class="hover:bg-[rgb(var(--color-hover))] transition">
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