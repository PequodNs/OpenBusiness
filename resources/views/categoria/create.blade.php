@extends('layouts.app')

@section('title', 'Añadir Categoría')

@section('content')

<div class="max-w-lg mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">
  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Añadir Categoría
  </h2>

  <form class="space-y-4">

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
      <input type="text"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Descripción</label>
      <textarea
        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400"
        rows="3"></textarea>
    </div>

    <div class="flex justify-between mt-6">

      <!-- Botón volver -->
      <a href="/categorias"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Volver
      </a>

      <!-- Botón guardar -->
      <button type="submit"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Guardar
      </button>

    </div>

  </form>
</div>

@endsection
