@extends('layouts.app')

@section('title', 'Crear Pedido')

@section('content')

<div class="max-w-lg mx-auto mt-10 bg-white shadow-lg border border-gray-300 rounded-xl p-6">
  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Crear Pedido
  </h2>

  <form class="space-y-4">

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Código del Pedido</label>
      <input type="text" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Fecha</label>
      <input type="date" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Proveedor</label>
      <select class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option>Seleccionar proveedor</option>
      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Observaciones</label>
      <textarea class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400"></textarea>
    </div>

    <div class="flex justify-between mt-6">
      <a href="/pedidos"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Volver
      </a>

      <button
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Guardar
      </button>
    </div>

  </form>
</div>

@endsection
