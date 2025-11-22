@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="bg-white shadow-lg rounded-2xl p-6">

    <!-- Encabezado -->
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Lista de Proveedores</h2>

        <a href="{{ route('proveedores.create') }}"
           class="bg-gray-800 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            Agregar Proveedor
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 border-b-2 border-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">ID Proveedor</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Nombre</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Contacto</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Email</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Dirección</th>
                    <th class="px-4 py-2 text-center text-gray-700 font-semibold">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($proveedores as $proveedor)
                <tr class="hover:bg-gray-50 transition-all">
                    <td class="px-4 py-2 text-gray-800">{{ $proveedor->id }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $proveedor->nombre }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $proveedor->contacto }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $proveedor->email }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $proveedor->direccion }}</td>

                    <td class="px-4 py-2 flex gap-2 justify-center">
                        <a href="{{ route('proveedores.edit', $proveedor->id) }}"
                           class="flex items-center gap-1 bg-yellow-500 text-white px-3 py-1.5 rounded-lg hover:bg-yellow-600 transition">
                            ✏️ Editar
                        </a>

                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center gap-1 bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">No hay proveedores registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
