@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<div class="bg-white shadow-lg text-gray-900 rounded-2xl p-6 max-w-3xl mx-auto mt-10">
    
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Crear Producto</h2>

    <form class="space-y-4" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold">Nombre</label>
            <input type="text" name="nombre" class="w-full border-gray-300 rounded-lg p-2 shadow-sm" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Descripción</label>
            <textarea name="descripcion" class="w-full border-gray-300 rounded-lg p-2 shadow-sm"></textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Cantidad</label>
            <input type="number" name="stock" min="0" class="w-full border-gray-300 rounded-lg p-2 shadow-sm" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Stock Mínimo</label>
            <input type="number" name="stock_minimo" min="0" class="w-full border-gray-300 rounded-lg p-2 shadow-sm" required>
        </div>
                <div>
            <label class="block text-gray-700 font-semibold">Precio</label>
            <input type="number" name="precio" step="0.01"
                class="w-full border-gray-300 rounded-lg p-2 shadow-sm" required>
        </div>


        <div>
            <label class="block text-gray-700 font-semibold">Distribuidor</label>
            <select name="id_distribuidor" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
                <option value="">Seleccionar distribuidor</option>
                @foreach($distribuidores as $distribuidor)
                    <option value="{{ $distribuidor->id }}">{{ $distribuidor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Imágenes</label>
            <input type="file" name="imagenes[]" multiple class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div class="flex justify-between pt-6">
            <a href="{{ route('productos.index') }}" 
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
