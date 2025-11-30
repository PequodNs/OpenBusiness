@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

<div class="shadow-lg rounded-2xl p-6
            bg-[rgb(var(--color-bg))]
            text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-border))]">

    <!-- Encabezado -->
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold">
            Lista de Usuarios
        </h2>

        <a href="{{ route('register') }}"
           class="flex items-center gap-1 px-4 py-2 rounded-lg shadow 
                  bg-[rgb(var(--color-hover))]
                  text-[rgb(var(--color-text))] 
                  hover:opacity-80 transition">
            Agregar Usuario
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-[rgb(var(--color-hover))]/40">

        <!-- Tabla con borde igual al de 'Pedidos' -->
        <table class="w-full border-collapse border border-[rgb(var(--color-hover))]/40 rounded-xl">
            <thead>
                <tr class="bg-[rgb(var(--color-hover))]/20 
                           border-b border-[rgb(var(--color-hover))]">
                    <th class="p-3 text-left font-semibold">Nombre</th>
                    <th class="p-3 text-left font-semibold">Correo</th>
                    <th class="p-3 text-left font-semibold">Contraseña</th>
                    <th class="p-3 text-center font-semibold">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-[rgb(var(--color-hover))]/30">

                @forelse ($usuarios as $usuario)
                <tr class="hover:bg-[rgb(var(--color-hover))]/10 transition">

                    <td class="p-3">{{ $usuario->name }}</td>

                    <td class="p-3">{{ $usuario->email }}</td>

                    <td class="p-3">************</td>

                    <td class="p-3">
                        <div class="flex justify-center gap-2">

                            <!-- EDITAR -->
                            <a href="/usuarios/{{ $usuario->id }}/editar"
                               class="px-3 py-1.5 rounded-lg 
                                      bg-[rgb(var(--color-hover))] 
                                      text-[rgb(var(--color-text))] 
                                      hover:opacity-80 transition">
                                      Editar
                                ✏️
                            </a>

                            <!-- ELIMINAR -->
                            <form action="/usuarios/{{ $usuario->id }}" method="POST"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="px-3 py-1.5 rounded-lg
                                           bg-red-600 text-white 
                                           hover:bg-red-700 transition">
                                           Eliminar
                                    🗑️
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 opacity-70">
                        No hay usuarios registrados.
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>
</div>

@endsection
