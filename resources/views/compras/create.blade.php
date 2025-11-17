@extends('layouts.app')

@section('title', 'Nueva Compra')

@section('content')

<div class="max-w-lg mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">

  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Registrar Nueva Compra
  </h2>

  <form class="space-y-4">

    <div>
      <label class="block text-gray-700 font-semibold mb-1">N° Orden de Compra</label>
      <input type="text" placeholder="OC-001"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Fecha</label>
      <input type="date"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Proveedor</label>
      <select class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option>Seleccione un proveedor</option>
        <option>Proveedor Ejemplo</option>
      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Producto</label>
      <select class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option>Seleccione un producto</option>
        <option>Laptop Asus TUF15</option>
      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Cantidad</label>
      <input type="number" min="1" value="1"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Total Estimado</label>
      <input type="text" placeholder="$0"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Observaciones</label>
      <textarea class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400"
                placeholder="Notas adicionales…"></textarea>
    </div>

    <div class="flex justify-between mt-6">
      <a href="/compras"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Volver
      </a>

      <button
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Crear Compra
      </button>
    </div>

  </form>

</div>

@endsection