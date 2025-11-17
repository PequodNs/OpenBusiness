@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="bg-white text-gray-900 shadow-lg rounded-2xl p-6 max-w-3xl mx-auto mt-10">
    
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Editar Producto</h2>

    <form class="space-y-4">

        <div>
            <label class="block text-gray-700 font-semibold">Nombre</label>
            <input type="text" value="Laptop HP" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Descripción</label>
            <textarea class="w-full border-gray-300 rounded-lg p-2 shadow-sm">Notebook 15" Ryzen 5</textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Cantidad</label>
            <input type="number" value="10" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Precio</label>
            <input type="number" step="0.01" value="699990" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">ID Categoría</label>
            <input type="number" value="3" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">ID Distribuidor</label>
            <input type="number" value="2" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Imagen</label>
            <input type="file" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div class="flex justify-between pt-6">

            <a href="#" 
               class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
                Volver
            </a>

            <button type="button"
                class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
                Actualizar
            </button>

        </div>

    </form>

</div>
@endsection
