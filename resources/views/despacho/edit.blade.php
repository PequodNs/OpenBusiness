@extends('layouts.app')

@section('title', 'Editar Despacho')

@section('content')

<div class="max-w-lg mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">
  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Editar Despacho
  </h2>

  <form class="space-y-4">

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Número de Despacho</label>
      <input type="text" value="DES-001" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Fecha</label>
      <input type="date" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Cliente / Destinatario</label>
      <input type="text" value="Cliente ejemplo" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Estado</label>
      <select class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
      </select>
    </div>

    <div class="flex justify-between mt-6">
      <a href="/despacho"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Volver
      </a>

      <button
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Editar
      </button>
    </div>

  </form>
</div>

@endsection
