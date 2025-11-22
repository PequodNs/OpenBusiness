@extends('layouts.app')

@section('title', 'Detalle de Guía de Despacho')

@section('content')

<div class="max-w-4xl mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Guía de Despacho Nº {{ $despacho->id }}
    </h2>

    <div class="mb-6">
        <p><strong>Pedido asociado:</strong> #{{ $despacho->pedido->id }}</p>
        <p><strong>Fecha recepción:</strong> {{ $despacho->fecha_recepcion }}</p>
        <p><strong>Estado:</strong> 
            <span class="px-2 py-1 bg-green-600 text-white rounded-lg">{{ $despacho->estado }}</span>
        </p>
    </div>

    <h3 class="text-xl font-semibold mb-3">Productos recibidos</h3>

    <table class="w-full border border-gray-300 mb-6">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Producto</th>
                <th class="p-2 border">Cantidad recibida</th>
            </tr>
        </thead>

        <tbody>
        @foreach($despacho->detalleDespachos as $detalle)
            <tr class="border-b">
                <td class="p-2 border">{{ $detalle->producto->nombre }}</td>
                <td class="p-2 border text-center">{{ $detalle->cantidad_recibida }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="flex justify-between mt-6">
        <a href="{{ route('despachos.index') }}" 
           class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600">
            Volver
        </a>

        <a href="{{ route('despachos.edit', $despacho->id) }}" 
           class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600">
            Editar
        </a>
    </div>

</div>

@endsection
