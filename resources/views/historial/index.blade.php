@extends('layouts.app')

@section('title', 'Historial')

@section('content')
<div class="bg-white shadow-lg rounded-2xl p-6">

    <!-- Encabezado: Título izquierda – Botón derecha -->
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Historial</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 border-b-2 border-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">ID usuario</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">ID Producto</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Accion realizada</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Fecha</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

                <!-- FILA EJEMPLO -->
                <tr class="hover:bg-gray-50 transition-all">
                    <td class="px-4 py-2 text-gray-800">3</td>
                    <td class="px-4 py-2 text-gray-800">2</td>
                    <td class="px-4 py-2 text-gray-800">Editar</td>
                    <td class="px-4 py-2 text-gray-800">30-02-2026</td>

                    <!-- ACCIONES -->
                    <td class="px-4 py-2 flex gap-2 justify-center">

                        <!-- BOTÓN ELIMINAR -->
                        <a href="/categorias/1/eliminar"
                           class="flex items-center gap-1 bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="white" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 7h12M9 7V4h6v3m-7 4v7m4-7v7m4-7v7M4 7h16l-1 12a2 2 0 01-2 2H7a2 2 0 01-2-2L4 7z"/>
                            </svg>
                            Eliminar
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection