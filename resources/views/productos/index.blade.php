@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="bg-white shadow-lg rounded-2xl p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Lista de Productos</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 border-b-2 border-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">ID</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Nombre</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Descripción</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Cantidad</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Precio</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">ID Categoría</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">ID Distribuidor</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Imagen</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Ejemplo de fila -->
                <tr class="hover:bg-gray-50 transition-all">
                    <td class="px-4 py-2 text-gray-800">1</td>
                    <td class="px-4 py-2 text-gray-800">Laptop HP</td>
                    <td class="px-4 py-2 text-gray-600">Notebook 15" Ryzen 5</td>
                    <td class="px-4 py-2 text-gray-800">10</td>
                    <td class="px-4 py-2 text-gray-800">$699.990</td>
                    <td class="px-4 py-2 text-gray-800">3</td>
                    <td class="px-4 py-2 text-gray-800">2</td>
                    <td class="px-4 py-2">
                        <img src="https://via.placeholder.com/60" alt="Imagen del producto" class="w-12 h-12 rounded-lg object-cover border border-gray-300">
                    </td>
                </tr>

                <!-- Otra fila de ejemplo -->
                <tr class="hover:bg-gray-50 transition-all">
                    <td class="px-4 py-2 text-gray-800">2</td>
                    <td class="px-4 py-2 text-gray-800">Mouse Logitech</td>
                    <td class="px-4 py-2 text-gray-600">Mouse inalámbrico</td>
                    <td class="px-4 py-2 text-gray-800">25</td>
                    <td class="px-4 py-2 text-gray-800">$19.990</td>
                    <td class="px-4 py-2 text-gray-800">1</td>
                    <td class="px-4 py-2 text-gray-800">5</td>
                    <td class="px-4 py-2">
                        <img src="https://via.placeholder.com/60" alt="Imagen del producto" class="w-12 h-12 rounded-lg object-cover border border-gray-300">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection