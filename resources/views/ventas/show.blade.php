@extends('layouts.app')

@section('title', 'Detalle de Venta')

@section('content')

<div class="max-w-4xl mx-auto mt-10 bg-white text-gray-900 shadow-lg border rounded-xl p-6">

    <h2 class="text-2xl font-bold mb-4">Detalle de Venta #{{ $venta->id }}</h2>

    <p><strong>Fecha:</strong> {{ $venta->fecha }}</p>
    <p><strong>Usuario:</strong> {{ $venta->usuario->name ?? 'Usuario Eliminado' }}</p>
    <p><strong>Total:</strong> ${{ number_format($venta->total, 0, ',', '.') }}</p>

    <h3 class="text-xl font-semibold mt-6 mb-3">Productos vendidos</h3>

    <table class="w-full border-collapse mb-4">
        <thead>
            <tr class="bg-gray-200 border-b">
                <th class="p-3 text-left">Producto</th>
                <th class="p-3 text-left">Cantidad</th>
                <th class="p-3 text-left">Precio</th>
                <th class="p-3 text-left">Subtotal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($venta->detalles as $d)
            <tr class="border-b">
                <td class="p-3">{{ $d->producto->nombre }}</td>
                <td class="p-3">{{ $d->cantidad }}</td>
                <td class="p-3">${{ number_format($d->precio_unitario, 0, ',', '.') }}</td>
                <td class="p-3">${{ number_format($d->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('productos.index')  }}"
       class="px-4 py-2 rounded-lg shadow 
                    bg-[rgb(var(--color-hover))] 
                    text-[rgb(var(--color-text))] 
                    hover:opacity-80 transition">
       🔙 Volver
    </a>

</div>

@endsection
