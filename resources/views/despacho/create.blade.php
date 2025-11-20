@extends('layouts.app')

@section('title', 'Registrar llegada del Pedido')

@section('content')

<div class="bg-white shadow-lg rounded-2xl p-6 max-w-4xl mx-auto mt-10 text-gray-900">

    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        Registrar Llegada (Guía de Despacho)
    </h2>

    <form method="POST" action="{{ route('despachos.store') }}">
        @csrf

        <input type="hidden" name="id_pedido" value="{{ $pedido->id }}">

        <div class="mb-4">
            <label class="font-semibold">Fecha de recepción</label>
            <input type="date" name="fecha"
                class="w-full border-gray-300 rounded-lg p-2">
        </div>

        <h3 class="text-xl font-semibold mb-3">Productos solicitados</h3>

        <table class="w-full border border-gray-300 mb-5">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-2">Producto</th>
                    <th class="p-2">Solicitado</th>
                    <th class="p-2">Recibido</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pedido->detallePedidos as $detalle)
                <tr class="border-b">
                    <td class="p-2">{{ $detalle->producto->nombre }}</td>
                    <td class="p-2 text-center">{{ $detalle->cantidad }}</td>

                    <td class="p-2">
                        <input type="number" min="0"
                               name="productos[{{ $loop->index }}][cantidad]"
                               class="border-gray-300 rounded-lg p-2 w-28">

                        <input type="hidden"
                               name="productos[{{ $loop->index }}][id_producto]"
                               value="{{ $detalle->producto->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <label class="font-semibold">Observaciones</label>
            <textarea name="observaciones"
                class="w-full border-gray-300 rounded-lg p-2"></textarea>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('pedidos.index') }}"
                class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600">
                Volver
            </a>

            <button class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600">
                Registrar Llegada
            </button>
        </div>

    </form>

</div>

@endsection
