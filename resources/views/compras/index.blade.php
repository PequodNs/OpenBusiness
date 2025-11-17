@extends('layouts.app')

@section('title', 'Listado de Compras')

@section('content')

<div class="w-full max-w-6xl mx-auto mt-10 bg-white shadow-lg border border-gray-300 rounded-xl p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Listado de Compras</h2>

        <a href="/compras/crear"
           class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition font-semibold">
            + Nueva Compra
        </a>
    </div>

    <table class="w-full table-auto border-collapse">
        <thead>
        <tr class="bg-gray-200 border-b border-gray-300 text-gray-700 font-semibold text-sm">
            <th class="p-3 text-left">N° Compra</th>
            <th class="p-3 text-left">Proveedor</th>
            <th class="p-3 text-left">Fecha</th>
            <th class="p-3 text-left">Productos</th>
            <th class="p-3 text-left">Cantidad Total</th>
            <th class="p-3 text-left">Total</th>
            <th class="p-3 text-left">Estado</th>
            <th class="p-3 text-left">Acciones</th>
        </tr>
        </thead>

        <tbody>

        <!-- Ejemplo -->
        <tr class="border-b hover:bg-gray-50 transition">
            <td class="p-3">OC-001</td>
            <td class="p-3">Proveedor Ejemplo</td>
            <td class="p-3">2025-01-10</td>

            <!-- Resumen -->
            <td class="p-3 text-gray-800">Laptop Asus TUF15, Monitor LG</td> <!-- Fijate en este texto no desaparece despues -->

            <!-- Cantidad total -->
            <td class="p-3 font-semibold">3</td>

            <!-- Total -->
            <td class="p-3 font-semibold">$1.800.000</td>

            <td class="p-3 font-semibold"> Pendiente</td>

            <td class="p-3 flex gap-2">

                <!-- BOTÓN VER (AZUL) -->
                <a href="/compras/1"
                class="flex items-center gap-1 bg-blue-600 text-white px-3 py-1.5 rounded-lg hover:bg-blue-700 transition">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="2" stroke="white"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>

                Ver
                </a>

                <!-- Editar -->
                <a href="/compras/1/editar"
                   class="flex items-center gap-1 bg-yellow-500 text-white px-3 py-1.5 rounded-lg hover:bg-yellow-600 transition">
                    Editar
                </a>

                <!-- Eliminar -->
                <a href="/compras/1/eliminar"
                   class="flex items-center gap-1 bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition">
                    Eliminar
                </a>

            </td>
        </tr>

        </tbody>

    </table>

</div>

@endsection