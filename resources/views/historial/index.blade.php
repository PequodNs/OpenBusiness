@extends('layouts.app')

@section('title', 'Historial')

@section('content')

<div class="shadow-lg rounded-2xl p-6
            bg-[rgb(var(--color-bg))]
            text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">

    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-[rgb(var(--color-text))]">
            Historial de acciones
        </h2>
    </div>

    <!-- Tabla estilo igual a la de PEDIDOS -->
    <table class="w-full border-collapse">
        <thead>
            <tr class="border-b border-[rgb(var(--color-hover))]
                       bg-[rgb(var(--color-hover))]/20">
                <th class="p-3 text-left font-semibold">Usuario</th>
                <th class="p-3 text-left font-semibold">Acción</th>
                <th class="p-3 text-left font-semibold">Detalles</th>
                <th class="p-3 text-left font-semibold">Fecha</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($historial as $item)
            <tr class="border-b border-[rgb(var(--color-hover))]
                       hover:bg-[rgb(var(--color-hover))]/10 transition">

                <!-- Usuario -->
                <td class="p-3">
                    {{ $item->usuario->name ?? 'Usuario eliminado' }}
                </td>

                <!-- Acción -->
                <td class="p-3">
                    {{ $item->accion }}
                </td>

                <!-- Detalles -->
                <td class="p-3">
                    {{ $item->detalles }}
                </td>

                <!-- Fecha -->
                <td class="p-3">
                    {{ $item->created_at->format('d-m-Y H:i') }}
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-5 text-center opacity-70">
                    No hay acciones registradas.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
<!-- Paginación -->
    <div class="mt-6 ">
        {{ $historial->links('components.pagination') }}
    </div>
</div>

@endsection
