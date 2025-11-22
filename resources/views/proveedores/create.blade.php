@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<div class="max-w-lg mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">
  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Añadir Proveedor
  </h2>

  <form action="{{ route('proveedores.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
      <input type="text" name="nombre" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400" required>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Contacto</label>
      <input type="text" name="contacto" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Email</label>
      <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Dirección</label>
      <textarea name="direccion" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400"></textarea>
    </div>

    <div class="flex justify-between mt-6">
      <a href="{{ route('proveedores.index') }}"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Volver
      </a>

      <button type="submit"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Guardar
      </button>
    </div>

  </form>
</div>
@endsection
