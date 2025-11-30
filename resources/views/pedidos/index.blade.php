@extends('layouts.app')

@section('title', 'Listado de Pedidos')

@section('content')

<div class="max-w-6xl mx-auto mt-10
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">

  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">
      Listado de Pedidos
    </h2>

    <a href="{{ route('pedidos.create') }}"
       class="px-4 py-2 rounded-lg shadow 
                    bg-[rgb(var(--color-hover))] 
                    text-[rgb(var(--color-text))] 
                    hover:opacity-80 transition">
      + Nuevo Pedido
    </a>
  </div>

  {{-- Mensajes de éxito --}}
  @if(session('success'))
    <div class="p-4 rounded-lg mb-4
                bg-green-600 text-white">
      {{ session('success') }}
    </div>
  @endif

  <table class="w-full border-collapse">
    <thead>
      <tr class="border-b border-[rgb(var(--color-hover))]
                 bg-[rgb(var(--color-hover))]/20">
        <th class="p-3 text-left font-semibold">Proveedor</th>
        <th class="p-3 text-left font-semibold">Fecha Pedido</th>
        <th class="p-3 text-left font-semibold">Estado</th>
        <th class="p-3 text-left font-semibold">Acciones</th>
      </tr>
    </thead>

    <tbody>
      @foreach($pedidos as $pedido)
      <tr class="border-b border-[rgb(var(--color-hover))]
                 hover:bg-[rgb(var(--color-hover))]/10 transition">
        <td class="p-3">{{ $pedido->distribuidor->nombre ?? 'Sin proveedor' }}</td>

        <td class="p-3">{{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d-m-Y') }}</td>

        <td class="p-3">{{ ucfirst($pedido->estado) }}</td>

        <td class="p-3 flex gap-2">

          {{-- Agregar Productos --}}
          <a href="{{ route('despacho.create', $pedido->id) }}"
            class="flex items-center gap-1 
                                px-3 py-1.5 rounded-lg 
                                bg-[rgb(var(--color-hover))] 
                                text-[rgb(var(--color-text))] 
                                hover:opacity-80 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="white"
                class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 4v16m8-8H4" />
            </svg>
            Agregar Productos
          </a>

          {{-- Ver --}}
          <a href="{{ route('pedidos.show', $pedido->id) }}"
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

          {{-- Editar --}}
          <a href="{{ route('pedidos.edit', $pedido->id) }}"
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

          {{-- Eliminar --}}
          <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST"
                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este pedido?');">
            @csrf
            @method('DELETE')

            <button type="submit"
              class="flex items-center gap-1 px-3 py-1.5 rounded-lg transition
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
      @endforeach
    </tbody>

  </table>

</div>

@endsection
