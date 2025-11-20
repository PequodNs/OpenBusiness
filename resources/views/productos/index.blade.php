@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="bg-white shadow-lg rounded-2xl p-6">

    <!-- Encabezado -->
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Lista de Productos</h2>
        <a href="{{ route('productos.create') }}"
           class="bg-gray-800 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            Agregar Producto
        </a>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 border-b-2 border-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Imagen</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Nombre</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Descripción</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Stock</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Stock mínimo</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Proveedor</th>
                    <th class="px-4 py-2 text-center text-gray-700 font-semibold">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach($productos as $producto)
                <tr class="hover:bg-gray-50 transition-all">
                    <td class="px-4 py-2">
                        @php
                            $imagen = $producto->imagenes->first();
                            $ruta = $imagen ? 'storage/' . $imagen->ruta_imagen : null;
                            $existe = $ruta && file_exists(public_path($ruta));
                        @endphp

                        <img src="{{ $existe ? asset($ruta) : 'https://via.placeholder.com/60' }}"
                             alt="Imagen del producto"
                             class="w-12 h-12 rounded-lg object-cover border border-gray-300">
                    </td>

                    <td class="px-4 py-2 text-gray-800">{{ $producto->nombre }}</td>
                    <td class="px-4 py-2 text-gray-600">{{ $producto->descripcion }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $producto->stock }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $producto->stock_minimo }}</td>
                    <td class="px-4 py-2 text-gray-800">
                        {{ $producto->distribuidor->nombre ?? 'Sin proveedor' }}
                    </td>

                    <!-- Acciones -->
                    <td class="px-4 py-2 flex gap-2 justify-center">
                        <a href="{{ route('productos.edit', $producto->id) }}"
                           class="flex items-center gap-1 bg-yellow-500 text-white px-3 py-1.5 rounded-lg hover:bg-yellow-600 transition">
                            ✏️ Editar
                        </a>

                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                               class="flex items-center gap-1 bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
