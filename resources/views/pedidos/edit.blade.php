@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')

<div class="max-w-lg mx-auto mt-10 
            bg-white dark:bg-[rgb(var(--color-card))] 
            text-gray-900 dark:text-[rgb(var(--color-text))] 
            shadow-lg rounded-xl p-6 
            border border-gray-300 dark:border-[rgb(var(--color-border))]">

  <h2 class="text-2xl font-bold text-gray-800 dark:text-[rgb(var(--color-text))] mb-6 text-center">
    Editar Pedido
  </h2>

  <!-- Formulario para editar -->
  <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" class="space-y-4">
    @csrf
    @method('PUT')

    <!-- Código del pedido -->
    <div>
      <label class="block text-gray-700 dark:text-[rgb(var(--color-text))] font-semibold mb-1">
        Código del Pedido
      </label>

      <input type="text" 
             value="{{ old('codigo_pedido', $pedido->codigo_pedido) }}" 
             disabled
             class="w-full rounded-lg p-2
                    border border-gray-300 dark:border-[rgb(var(--color-border))]
                    bg-white dark:bg-[rgb(var(--color-card))]
                    text-gray-900 dark:text-[rgb(var(--color-text))]
                    focus:ring-2 focus:ring-[rgb(var(--color-hover))]">
    </div>

    <!-- Proveedor -->
    <div>
      <label class="block text-gray-700 dark:text-[rgb(var(--color-text))] font-semibold mb-1">
        Proveedor
      </label>

      <select name="id_distribuidor"
              class="w-full rounded-lg p-2 
                     border border-gray-300 dark:border-[rgb(var(--color-border))]
                     bg-white dark:bg-[rgb(var(--color-card))]
                     text-gray-900 dark:text-[rgb(var(--color-text))]
                     focus:ring-2 focus:ring-[rgb(var(--color-hover))]">
        <option value="">Seleccionar proveedor</option>

        @foreach($distribuidores as $d)
          <option value="{{ $d->id }}"
                  {{ old('id_distribuidor', $pedido->id_distribuidor) == $d->id ? 'selected' : '' }}>
            {{ $d->nombre }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Fecha Pedido -->
    <div>
      <label class="block text-gray-700 dark:text-[rgb(var(--color-text))] font-semibold mb-1">
        Fecha de Pedido
      </label>

      <input type="date"
             name="fecha_pedido"
             value="{{ old('fecha_pedido', $pedido->fecha_pedido->format('Y-m-d')) }}"
             class="w-full rounded-lg p-2
                    border border-gray-300 dark:border-[rgb(var(--color-border))]
                    bg-white dark:bg-[rgb(var(--color-card))]
                    text-gray-900 dark:text-[rgb(var(--color-text))]
                    focus:ring-2 focus:ring-[rgb(var(--color-hover))]">
    </div>

    <!-- Fecha de Entrega -->
    <div>
      <label class="block text-gray-700 dark:text-[rgb(var(--color-text))] font-semibold mb-1">
        Fecha de Entrega
      </label>

      <input type="date"
             name="fecha_entrega"
             value="{{ old('fecha_entrega', $pedido->fecha_entrega->format('Y-m-d')) }}"
             class="w-full rounded-lg p-2
                    border border-gray-300 dark:border-[rgb(var(--color-border))]
                    bg-white dark:bg-[rgb(var(--color-card))]
                    text-gray-900 dark:text-[rgb(var(--color-text))]
                    focus:ring-2 focus:ring-[rgb(var(--color-hover))]">
    </div>

    <!-- Estado -->
    <div>
      <label class="block text-gray-700 dark:text-[rgb(var(--color-text))] font-semibold mb-1">
        Estado
      </label>

      <select name="estado"
              class="w-full rounded-lg p-2
                     border border-gray-300 dark:border-[rgb(var(--color-border))]
                     bg-white dark:bg-[rgb(var(--color-card))]
                     text-gray-900 dark:text-[rgb(var(--color-text))]
                     focus:ring-2 focus:ring-[rgb(var(--color-hover))]">
        <option value="pendiente" {{ old('estado', $pedido->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="en_proceso" {{ old('estado', $pedido->estado) == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
        <option value="completado" {{ old('estado', $pedido->estado) == 'completado' ? 'selected' : '' }}>Completado</option>
      </select>
    </div>

    <!-- Observaciones -->
    <div>
      <label class="block text-gray-700 dark:text-[rgb(var(--color-text))] font-semibold mb-1">
        Observaciones
      </label>

      <textarea name="observaciones"
                class="w-full rounded-lg p-2
                       border border-gray-300 dark:border-[rgb(var(--color-border))]
                       bg-white dark:bg-[rgb(var(--color-card))]
                       text-gray-900 dark:text-[rgb(var(--color-text))]
                       focus:ring-2 focus:ring-[rgb(var(--color-hover))]">{{ old('observaciones', $pedido->observaciones) }}</textarea>
    </div>

    <!-- Botones -->
    <div class="flex justify-between mt-6">
      <a href="/pedidos"
         class="px-4 py-2 rounded-lg shadow 
                    bg-[rgb(var(--color-hover))] 
                    text-[rgb(var(--color-text))] 
                    hover:opacity-80 transition">
        Volver
      </a>

      <button type="submit"
         class="px-4 py-2 rounded-lg shadow 
                    bg-[rgb(var(--color-hover))] 
                    text-[rgb(var(--color-text))] 
                    hover:opacity-80 transition">
        Guardar Cambios
      </button>
    </div>

  </form>
</div>

@endsection
