@extends('layouts.app')

@section('title', 'Listado de Despachos')

@section('content')

<div class="max-w-5xl mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Listado de Despachos
        </h2>

        {{-- BOTÓN REDIRIGE A PEDIDOS --}}
        <a href="{{ route('pedidos.index') }}" 
           class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition font-semibold">
            + Nuevo Despacho
        </a>
    </div>


    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200 border-b border-gray-300">
                <th class="p-3 text-left text-gray-700 font-semibold">ID</th>
                <th class="p-3 text-left text-gray-700 font-semibold">Fecha</th>
                <th class="p-3 text-left text-gray-700 font-semibold">Pedido</th>
                <th class="p-3 text-left text-gray-700 font-semibold">Estado</th>
                <th class="p-3 text-left text-gray-700 font-semibold">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($despachos as $despacho)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-3">DES-{{ str_pad($despacho->id, 3, '0', STR_PAD_LEFT) }}</td>

                    <td class="p-3">
                        {{ $despacho->fecha_recepcion ?? '—' }}
                    </td>

                    <td class="p-3">
                        Pedido #{{ $despacho->id_pedido }}
                    </td>

                    <td class="p-3">
                        <span class="px-3 py-1 rounded-lg text-white
                            {{ $despacho->estado == 'Recibido' ? 'bg-green-600' : 'bg-yellow-600' }}">
                            {{ $despacho->estado }}
                        </span>
                    </td>

                    <<td class="p-3 flex gap-2">

    {{-- BOTÓN VER (AZUL) --}}
    <a href="{{ route('despacho.show', $despacho->id) }}"
       class="flex items-center gap-1 bg-blue-600 text-white px-3 py-1.5 rounded-lg hover:bg-blue-700 transition">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="2" stroke="white"
             class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
          <circle cx="12" cy="12" r="3" />
        </svg>
        Ver
    </a>

    {{-- BOTÓN EDITAR --}}
    <a href="{{ route('despachos.edit', $despacho->id) }}"
       class="flex items-center gap-1 bg-yellow-500 text-white px-3 py-1.5 rounded-lg hover:bg-yellow-600 transition">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="2" stroke="white"
             class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.862 3.487a2.25 2.25 0 113.182 3.182l-10.5 10.5a4.5 4.5 0 01-1.897 1.13l-3.087.88a.75.75 0 01-.927-.928l.88-3.086a4.5 4.5 0 011.13-1.898l10.5-10.5z" />
        </svg>

        Editar
    </a>

    {{-- BOTÓN ELIMINAR --}}
    <form action="{{ route('despachos.destroy', $despacho->id) }}" method="POST" onsubmit="return confirm('¿Eliminar despacho?')">
        @csrf
        @method('DELETE')

        <button class="flex items-center gap-1 bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition">
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
                    <td colspan="5" class="text-center p-5 text-gray-500">
                        No hay despachos registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection
