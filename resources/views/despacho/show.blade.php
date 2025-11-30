@extends('layouts.app')

@section('title', 'Detalle de Guía de Despacho')

@section('content')

<div class="max-w-4xl mx-auto mt-10 
            bg-[rgb(var(--color-bg))] 
            text-[rgb(var(--color-text))] 
            shadow-lg 
            border border-[rgb(var(--color-border))] 
            rounded-xl p-6">

    <h2 class="text-2xl font-bold text-[rgb(var(--color-text))] mb-6">
        Guía de Despacho Nº {{ $despacho->id }}
    </h2>

    <div class="mb-6 space-y-1">
        <p><strong>Pedido asociado:</strong> #{{ $despacho->pedido->id }}</p>
        <p><strong>Fecha recepción:</strong> {{ $despacho->fecha_recepcion }}</p>

        <p><strong>Estado:</strong>
            <span class="px-2 py-1 rounded-lg 
                         bg-[rgb(var(--color-hover))] 
                         text-[rgb(var(--color-text))]">
                {{ $despacho->estado }}
            </span>
        </p>
    </div>

    <h3 class="text-xl font-semibold mb-3 text-[rgb(var(--color-text))]">
        Productos recibidos
    </h3>

    <table class="w-full mb-6 
                  border border-[rgb(var(--color-border))] 
                  text-[rgb(var(--color-text))]">
        <thead class="bg-[rgb(var(--color-hover))] text-[rgb(var(--color-text))]">
            <tr>
                <th class="p-2 border border-[rgb(var(--color-border))]">Producto</th>
                <th class="p-2 border border-[rgb(var(--color-border))]">Cantidad recibida</th>
            </tr>
        </thead>

        <tbody>
        @foreach($despacho->detalleDespachos as $detalle)
            <tr class="border-b border-[rgb(var(--color-border))]">
                <td class="p-2 border border-[rgb(var(--color-border))]">
                    {{ $detalle->producto->nombre }}
                </td>

                <td class="p-2 border border-[rgb(var(--color-border))] text-center">
                    {{ $detalle->cantidad_recibida }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="flex justify-between mt-6">

        <a href="{{ route('despachos.index') }}"
           class="flex items-center gap-1 
                  px-3 py-1.5 rounded-lg 
                  bg-[rgb(var(--color-hover))] 
                  text-[rgb(var(--color-text))] 
                  hover:opacity-80 transition">
            Volver
        </a>

        <a href="{{ route('despachos.edit', $despacho->id) }}"
           class="flex items-center gap-1 
                  px-3 py-1.5 rounded-lg 
                  bg-[rgb(var(--color-hover))] 
                  text-[rgb(var(--color-text))] 
                  hover:opacity-80 transition">
            Editar
        </a>

    </div>

</div>

@endsection
