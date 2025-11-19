@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="bg-white shadow-lg rounded-2xl p-6">

    <!-- Encabezado -->
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Lista de Proveedores</h2>

        <a href="/proveedores/create"
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

                <tr class="hover:bg-gray-50 transition-all">
                    <td class="px-4 py-2 text-gray-800">1</td>
                    <td class="px-4 py-2 text-gray-800">Distribuidora Andes</td>
                    <td class="px-4 py-2 text-gray-800">+56 9 1234 5678</td>
                    <td class="px-4 py-2 text-gray-800">contacto@andes.cl</td>
                    <td class="px-4 py-2 text-gray-800">Av. Libertador 1234, Santiago</td>

                    <!-- Acciones -->
                    <td class="px-4 py-2 flex gap-2 justify-center">

                        <!-- Botón Editar -->
                        <a href="/proveedores/edit"
                           class="flex items-center gap-1 bg-yellow-500 text-white px-3 py-1.5 rounded-lg hover:bg-yellow-600 transition">
                            <!-- Icono lápiz -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="white" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.862 3.487a2.25 2.25 0 113.182 3.182l-10.5 10.5a4.5 4.5 0 01-1.897 1.13l-3.087.88a.75.75 0 01-.927-.928l.88-3.086a4.5 4.5 0 011.13-1.898l10.5-10.5z" />
                            </svg>
                            Editar
                        </a>

                        <!-- Botón Eliminar -->
                        <a href="/proveedores/1/eliminar"
                           class="flex items-center gap-1 bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition">
                            <!-- Icono basurero -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="white" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 7h12M9 7V4h6v3m-7 4v7m4-7v7m4-7v7M4 7h16l-1 12a2 2 0 01-2 2H7a2 2 0 01-2-2L4 7z" />
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

