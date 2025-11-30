@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
<div class="max-w-6xl mx-auto mt-10
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">

    <!-- Encabezado -->
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-[rgb(var(--color-text))]">Lista de Proveedores</h2>

        <a href="{{ route('proveedores.create') }}"
           class="px-4 py-2 rounded-lg shadow 
                    bg-[rgb(var(--color-hover))] 
                    text-[rgb(var(--color-text))] 
                    hover:opacity-80 transition">
            Agregar Proveedor
        </a>
    </div>

    <!-- Tabla estilo pedidos -->
    <table class="w-full border-collapse">
        <thead>
            <tr class="border-b border-[rgb(var(--color-hover))]
                       bg-[rgb(var(--color-hover))]/20">
                <th class="p-3 text-left font-semibold">ID Proveedor</th>
                <th class="p-3 text-left font-semibold">Nombre</th>
                <th class="p-3 text-left font-semibold">Contacto</th>
                <th class="p-3 text-left font-semibold">Email</th>
                <th class="p-3 text-left font-semibold">Dirección</th>
                <th class="p-3 text-left font-semibold">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($proveedores as $proveedor)
            <tr class="border-b border-[rgb(var(--color-hover))]
                       hover:bg-[rgb(var(--color-hover))]/10 transition">

                <td class="p-3">{{ $proveedor->id }}</td>
                <td class="p-3">{{ $proveedor->nombre }}</td>
                <td class="p-3">{{ $proveedor->contacto }}</td>
                <td class="p-3">{{ $proveedor->email }}</td>
                <td class="p-3">{{ $proveedor->direccion }}</td>

                <td class="p-3 flex gap-2">
                    <!-- Editar -->
                    <a href="{{ route('proveedores.edit', $proveedor->id) }}"
                       class="flex items-center gap-1 
                              px-3 py-1.5 rounded-lg 
                              bg-[rgb(var(--color-hover))] 
                              text-[rgb(var(--color-text))] 
                              hover:opacity-80 transition">
                        ✏️ Editar
                    </a>

                    <!-- Eliminar -->
                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="flex items-center gap-1 px-3 py-1.5 rounded-lg transition
                                       bg-red-600 text-white hover:bg-red-700">
                            🗑️ Eliminar
                        </button>
                    </form>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center p-4 text-gray-500">
                    No hay proveedores registrados.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection

