@extends('layouts.app')

@section('title', 'Detalle de Venta')

@section('content')

<div class="max-w-4xl mx-auto mt-10 
            bg-[rgb(var(--color-bg))]
            text-[rgb(var(--color-text))]
            shadow-lg border border-[rgb(var(--color-border))]
            rounded-xl p-6">

    <h2 class="text-2xl font-bold mb-4">Detalle de Venta #{{ $venta->id }}</h2>

    <p><strong>Fecha:</strong> {{ $venta->fecha }}</p>
    <p><strong>Usuario:</strong> {{ $venta->usuario->name ?? 'Usuario Eliminado' }}</p>
    <p><strong>Total:</strong> ${{ number_format($venta->total, 0, ',', '.') }}</p>

    <h3 class="text-xl font-semibold mt-6 mb-3">Productos vendidos</h3>

    <table class="w-full border-collapse mb-4 border border-[rgb(var(--color-border))] rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-[rgb(var(--color-hover))]/20 border-b border-[rgb(var(--color-border))]">
                <th class="p-3 text-left">Producto</th>
                <th class="p-3 text-left">Cantidad</th>
                <th class="p-3 text-left">Precio</th>
                <th class="p-3 text-left">Subtotal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($venta->detalles as $d)
            <tr class="border-b border-[rgb(var(--color-border))] hover:bg-[rgb(var(--color-hover))]/10 transition">
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
              hover:opacity-80 transition inline-block">
       🔙 Volver
    </a>

</div>

@endsection

