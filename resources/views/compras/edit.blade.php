@extends('layouts.app')

@section('title', 'Editar Compra')

@section('content')

<div class="max-w-lg mx-auto mt-10 bg-white shadow-lg border border-gray-300 rounded-xl p-6">

  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Editar Compra
  </h2>

  <form class="space-y-4">

    <div>
      <label class="block text-gray-700 font-semibold mb-1">N° Orden de Compra</label>
      <input type="text" value="OC-001"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Fecha</label>
      <input type="date" value="2025-01-10"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Proveedor</label>
      <select class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option>Proveedor Ejemplo</option>
      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Producto</label>
      <select class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option>Laptop Asus TUF15</option>
        <option>Monitor LG</option>
      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Cantidad</label>
      <input type="number" value="2"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Total Estimado</label>
      <input type="text" value="$1.800.000"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Observaciones</label>
      <textarea class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">Compra para oficina</textarea>
    </div>

    <div class="flex justify-between mt-6">
      <a href="/compras"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Volver
      </a>

      <button
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Guardar Cambios
      </button>
    </div>

  </form>

</div>

@endsection