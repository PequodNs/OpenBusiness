@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="bg-white text-gray-900 shadow-lg rounded-2xl p-6 max-w-3xl mx-auto mt-10">
    
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Editar Producto</h2>

    <form class="space-y-4" 
          method="POST" 
          action="{{ route('productos.update', $producto->id) }}" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold">Nombre</label>
            <input type="text" name="nombre"
                value="{{ old('nombre', $producto->nombre) }}"
                class="w-full border-gray-300 rounded-lg p-2 shadow-sm" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Descripción</label>
            <textarea name="descripcion"
                class="w-full border-gray-300 rounded-lg p-2 shadow-sm">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold">Stock</label>
                <input type="number" name="stock"
                    value="{{ old('stock', $producto->stock) }}"
                    class="w-full border-gray-300 rounded-lg p-2 shadow-sm" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Stock Mínimo</label>
                <input type="number" name="stock_minimo"
                    value="{{ old('stock_minimo', $producto->stock_minimo) }}"
                    class="w-full border-gray-300 rounded-lg p-2 shadow-sm" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Precio</label>
            <input type="number" name="precio" step="0.01"
                value="{{ old('precio', $producto->precio) }}"
                class="w-full border-gray-300 rounded-lg p-2 shadow-sm" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Distribuidor</label>
            <select name="id_distribuidor"
                class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
                <option value="">Seleccionar distribuidor</option>

                @foreach($distribuidores as $distribuidor)
                    <option value="{{ $distribuidor->id }}"
                        {{ $producto->id_distribuidor == $distribuidor->id ? 'selected' : '' }}>
                        {{ $distribuidor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Agregar nuevas imágenes</label>
            <input type="file" name="imagenes[]" multiple
                class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        {{-- Mostrar imágenes actuales --}}
        @if($producto->imagenes->count() > 0)
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Imágenes actuales</label>
            <div class="grid grid-cols-3 gap-3">
                @foreach($producto->imagenes as $img)
                    <div class="border rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/'.$img->ruta_imagen) }}" class="w-full h-24 object-cover">
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="flex justify-between pt-6">

            <a href="{{ route('productos.index') }}"
               class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
                Volver
            </a>

            <button type="submit"
                class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
                Actualizar
            </button>

        </div>

    </form>

</div>
@endsection
