@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">
  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Editar Proveedor
  </h2>

  <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
      <input type="text" name="nombre" value="{{ old('nombre', $proveedor->nombre) }}"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Contacto</label>
      <input type="text" name="contacto" value="{{ old('contacto', $proveedor->contacto) }}"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Email</label>
      <input type="email" name="email" value="{{ old('email', $proveedor->email) }}"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Dirección</label>
      <textarea name="direccion" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">{{ old('direccion', $proveedor->direccion) }}</textarea>
    </div>

    <div class="flex justify-between mt-6">
      <a href="{{ route('proveedores.index') }}"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Volver
      </a>

      <button type="submit"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Guardar Cambios
      </button>
    </div>

  </form>
</div>
@endsection
