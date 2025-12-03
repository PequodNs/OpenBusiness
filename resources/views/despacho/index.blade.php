@extends('layouts.app')

@section('title', 'Listado de Despachos')

@section('content')

<div class="max-w-5xl mx-auto mt-10
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))]
            text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">

    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[rgb(var(--color-text))]">
            Listado de Despachos
        </h2>

        <a href="{{ route('pedidos.index') }}"
           class="px-4 py-2 rounded-lg shadow
                  bg-[rgb(var(--color-hover))]
                  text-[rgb(var(--color-text))]
                  hover:opacity-80 transition font-semibold">
            + Nuevo Despacho
        </a>
    </div>

    <!-- Tabla estilo igual a PEDIDOS -->
    <table class="w-full border-collapse">
        <thead>
            <tr class="border-b border-[rgb(var(--color-hover))]
                       bg-[rgb(var(--color-hover))]/20">
                <th class="p-3 text-left font-semibold">ID</th>
                <th class="p-3 text-left font-semibold">Fecha</th>
                <th class="p-3 text-left font-semibold">Pedido</th>
                <th class="p-3 text-left font-semibold">Estado</th>
                <th class="p-3 text-left font-semibold">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($despachos as $despacho)
            <tr class="border-b border-[rgb(var(--color-hover))]
                       hover:bg-[rgb(var(--color-hover))]/10 transition">

                <td class="p-3">
                    DES-{{ str_pad($despacho->id, 3, '0', STR_PAD_LEFT) }}
                </td>

                <td class="p-3">
                    {{ $despacho->fecha_recepcion ?? '—' }}
                </td>

                <td class="p-3">
                    Pedido #{{ $despacho->id_pedido }}
                </td>

                <td class="p-3">
                    <span class="px-3 py-1 rounded-lg text-white
                        {{ $despacho->estado == 'Recibido'
                            ? 'bg-green-600'
                            : 'bg-yellow-600' }}">
                        {{ $despacho->estado }}
                    </span>
                </td>

                <td class="p-3 flex gap-2">

                    <!-- VER -->
                    <a href="{{ route('despacho.show', $despacho->id) }}"
                        class="flex items-center gap-1 
                            px-3 py-1.5 rounded-lg 
                            bg-[rgb(var(--color-hover))] 
                            text-[rgb(var(--color-text))] 
                            hover:opacity-80 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="white"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        Ver
                    </a>

                    <!-- EDITAR -->
                    <a href="{{ route('despachos.edit', $despacho->id) }}"
                        class="flex items-center gap-1 
                            px-3 py-1.5 rounded-lg 
                            bg-[rgb(var(--color-hover))] 
                            text-[rgb(var(--color-text))] 
                            hover:opacity-80 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="white"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 3.487a2.25 2.25 0 113.182 3.182l-10.5 10.5a4.5 4.5 0 01-1.897 1.13l-3.087.88a.75.75 0 01-.927-.928l.88-3.086a4.5 4.5 0 011.13-1.898l10.5-10.5z" />
                        </svg>
                        Editar
                    </a>

                    <!-- ELIMINAR -->
                    <form action="{{ route('despachos.destroy', $despacho->id) }}"
                          method="POST"
                          onsubmit="return confirm('¿Eliminar despacho?')">
                        @csrf
                        @method('DELETE')

                        <button class="flex items-center gap-1 px-3 py-1.5 rounded-lg transition
                                    bg-red-600 text-white hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="white"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 7h12M9 7V4h6v3m-7 4v7m4-7v7m4-7v7M4 7h16l-1 12a2 2 0 01-2 2H7a2 2 0 01-2-2L4 7z" />
                            </svg>
                            Eliminar
                        </button>
                    </form>

                </td>
            </tr>

            @empty
            <tr>
                <td colspan="5" class="text-center p-5 opacity-70">
                    No hay despachos registrados.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
<!-- Paginación -->
    <div class="mt-6 ">
        {{ $despachos->links('components.pagination') }}
    </div>
</div>

@endsection
