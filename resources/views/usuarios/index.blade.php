@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="bg-white shadow-lg rounded-2xl p-6">

    <!-- Encabezado -->
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Lista de Usuarios</h2>

        <a href="{{ route('register') }}"
            class="bg-gray-800 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-700 transition">
            Agregar Usuario
        </a> 
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">

            <thead class="bg-gray-100 border-b-2 border-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Nombre</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Correo</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Contraseña</th>
                    <th class="px-4 py-2 text-center text-gray-700 font-semibold">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

                @forelse ($usuarios as $usuario)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-2 text-gray-800">{{ $usuario->name }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $usuario->email }}</td>

                    <!-- Contraseña oculta -->
                    <td class="px-4 py-2 text-gray-800">************</td>

                    <!-- Rol (si tienes columna, si no colócale “Sin Rol”) -->
                    <!-- <td class="px-4 py-2 text-gray-800">
                        {{ $usuario->role ?? 'Sin Rol' }}
                    </td> -->

                    <td class="px-4 py-2 flex gap-2 justify-center">

                        <!-- EDITAR -->
                        <a href="/usuarios/{{ $usuario->id }}/editar"
                            class="flex items-center gap-1 bg-yellow-500 text-white px-3 py-1.5 rounded-lg hover:bg-yellow-600 transition">
                            ✏️ Editar
                        </a>

                        <!-- ELIMINAR -->
                        <form action="/usuarios/{{ $usuario->id }}" method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                            @csrf
                            @method('DELETE')

                            <button
                                class="flex items-center gap-1 bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition">
                                🗑️ Eliminar
                            </button>
                        </form>

                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-600">
                        No hay usuarios registrados.
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection