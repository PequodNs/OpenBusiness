@extends('layouts.app')

@section('title', 'Registrar llegada del Pedido')

@section('content')

<div class="max-w-5xl mx-auto mt-10
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))]
            text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">

    <h2 class="text-2xl font-bold text-[rgb(var(--color-text))] mb-6 text-center">
        Registrar Llegada (Guía de Despacho)
    </h2>

    <form method="POST" action="{{ route('despachos.store') }}">
        @csrf

        <input type="hidden" name="id_pedido" value="{{ $pedido->id }}">

        <div class="mb-4">
            <label class="block font-semibold text-[rgb(var(--color-text))]">Fecha de recepción</label>
            <input type="date" name="fecha"
                class="w-full bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                       border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm">
        </div>

        <h3 class="text-xl font-semibold mb-3 text-[rgb(var(--color-text))]">Productos solicitados</h3>

        <table class="w-full border border-[rgb(var(--color-border))] mb-5">
            <thead class="bg-[rgb(var(--color-hover))] text-[rgb(var(--color-text))]">
                <tr>
                    <th class="p-2">Producto</th>
                    <th class="p-2">Solicitado</th>
                    <th class="p-2">Recibido</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pedido->detallePedidos as $detalle)
                <tr class="border-b border-[rgb(var(--color-border))]">
                    <td class="p-2">{{ $detalle->producto->nombre }}</td>
                    <td class="p-2 text-center">{{ $detalle->cantidad }}</td>

                    <td class="p-2">
                        <input type="number" min="0"
                            name="productos[{{ $loop->index }}][cantidad]"
                            class="bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                                   border-[rgb(var(--color-border))] rounded-lg p-2 w-28 shadow-sm">

                        <input type="hidden"
                            name="productos[{{ $loop->index }}][id_producto]"
                            value="{{ $detalle->producto->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <label class="block font-semibold text-[rgb(var(--color-text))]">Observaciones</label>
            <textarea name="observaciones"
                class="w-full bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                       border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm"></textarea>
        </div>

        <div class="flex justify-between mt-6">

            <a href="{{ route('pedidos.index') }}"
               class="flex items-center gap-1 
                      px-3 py-1.5 rounded-lg 
                      bg-[rgb(var(--color-hover))] 
                      text-[rgb(var(--color-text))] 
                      hover:opacity-80 transition">
                Volver
            </a>

            <button class="flex items-center gap-1 
                           px-3 py-1.5 rounded-lg 
                           bg-[rgb(var(--color-hover))] 
                           text-[rgb(var(--color-text))] 
                           hover:opacity-80 transition">
                Registrar Llegada
            </button>

        </div>

    </form>

</div>

@endsection