@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

<div class="max-w-5xl mx-auto mt-10
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[rgb(var(--color-text))]">Listado de Ventas</h2>

        <a href="{{ route('ventas.create') }}"
           class="px-4 py-2 rounded-lg shadow 
                  bg-[rgb(var(--color-hover))] 
                  text-[rgb(var(--color-text))] 
                  hover:opacity-80 transition">
            + Nueva Venta
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-600 text-white rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse">
        <thead>
            <tr class="border-b border-[rgb(var(--color-hover))]
                       bg-[rgb(var(--color-hover))]/20">
                <th class="p-3 text-left font-semibold">ID</th>
                <th class="p-3 text-left font-semibold">Fecha</th>
                <th class="p-3 text-left font-semibold">Usuario</th>
                <th class="p-3 text-left font-semibold">Total</th>
                <th class="p-3 text-left font-semibold">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($ventas as $venta)
            <tr class="border-b border-[rgb(var(--color-hover))]
                       hover:bg-[rgb(var(--color-hover))]/10 transition">

                <td class="p-3">{{ $venta->id }}</td>
                <td class="p-3">{{ $venta->fecha }}</td>
                <td class="p-3">{{ $venta->usuario->name ?? 'Usuario Eliminado' }}</td>
                <td class="p-3">${{ number_format($venta->total, 0, ',', '.') }}</td>

                <td class="p-3 flex gap-2">
                    <a href="{{ route('ventas.show', $venta->id) }}"
                        class="px-3 py-1.5 rounded-lg 
                               bg-[rgb(var(--color-hover))]
                               text-[rgb(var(--color-text))]
                               hover:opacity-80 transition">
                        👁️ Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-6 ">
        {{ $ventas->links('components.pagination') }}
    </div>
</div>

@endsection
