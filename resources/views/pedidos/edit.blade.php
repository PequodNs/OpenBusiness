@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')

<div class="max-w-lg mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">
  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Editar Pedido
  </h2>

  <!-- El formulario para editar el pedido -->
  <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" class="space-y-4">
    @csrf
    @method('PUT')

    <!-- Código de Pedido (disabled ya que no puede ser editado) -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Código del Pedido</label>
      <input type="text" name="codigo_pedido" value="{{ old('codigo_pedido', $pedido->codigo_pedido) }}" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400" disabled>
    </div>

    <!-- Proveedor (dropdown con distribuidores disponibles) -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Proveedor</label>
      <select name="id_distribuidor" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option value="">Seleccionar proveedor</option>
        @foreach($distribuidores as $distribuidor)
          <option value="{{ $distribuidor->id }}" {{ old('id_distribuidor', $pedido->id_distribuidor) == $distribuidor->id ? 'selected' : '' }}>
            {{ $distribuidor->nombre }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Fecha de Pedido -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Fecha de Pedido</label>
      <input type="date" name="fecha_pedido" 
      value="{{ old('fecha_pedido', $pedido->fecha_pedido->format('Y-m-d')) }}" 
      class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <!-- Fecha de Entrega -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Fecha de Entrega</label>
      <input type="date" name="fecha_entrega" value="{{ old('fecha_entrega', $pedido->fecha_entrega->format('Y-m-d')) }}" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <!-- Estado del Pedido -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Estado</label>
      <select name="estado" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option value="pendiente" {{ old('estado', $pedido->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="en_proceso" {{ old('estado', $pedido->estado) == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
        <option value="completado" {{ old('estado', $pedido->estado) == 'completado' ? 'selected' : '' }}>Completado</option>
      </select>
    </div>

    <!-- Observaciones -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Observaciones</label>
      <textarea name="observaciones" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400" placeholder="Notas adicionales…">{{ old('observaciones', $pedido->observaciones) }}</textarea>
    </div>

    <!-- Botones de acción -->
    <div class="flex justify-between mt-6">
      <a href="/pedidos" class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">Volver</a>

      <button type="submit" class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Guardar Cambios
      </button>
    </div>

  </form>
</div>

@endsection
