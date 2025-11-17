@extends('layouts.app')

@section('title', 'Listado de Pedidos')

@section('content')

<div class="max-w-6xl mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">

  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">
      Listado de Pedidos
    </h2>

    <a href="/pedidos/crear" 
       class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition font-semibold">
      + Nuevo Pedido
    </a>
  </div>

  <table class="w-full border-collapse">
    <thead>
      <tr class="bg-gray-200 border-b border-gray-300">
        <th class="p-3 text-left text-gray-700 font-semibold">Código</th>
        <th class="p-3 text-left text-gray-700 font-semibold">Proveedor</th>
        <th class="p-3 text-left text-gray-700 font-semibold">N° OrdenCompra </th>
        <th class="p-3 text-left text-gray-700 font-semibold">Fecha</th>
        <th class="p-3 text-left text-gray-700 font-semibold">Acciones</th>
      </tr>
    </thead>

    <tbody>

      <!-- FILA EJEMPLO -->
      <tr class="border-b hover:bg-gray-50 transition">
        <td class="p-3">PED-001</td>
        <td class="p-3">Proveedor Ejemplo</td>
        <td class="p-3">2143451</td>
        <td class="p-3">21-05-23</td>

        <td class="p-3 flex gap-2">

          <a href="/productos/create"
            class="flex items-center gap-1 bg-blue-600 text-white px-3 py-1.5 rounded-lg hover:bg-blue-700 transition">
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="white"
                class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 4v16m8-8H4" />
            </svg>

            Agregar Productos
          </a>

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

          <!-- BOTÓN EDITAR (AMARILLO) -->
          <a href="/pedidos/1/editar"
             class="flex items-center gap-1 bg-yellow-500 text-white px-3 py-1.5 rounded-lg hover:bg-yellow-600 transition">

              <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                   viewBox="0 0 24 24" stroke-width="2" stroke="white"
                   class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 3.487a2.25 2.25 0 113.182 3.182l-10.5 10.5a4.5 4.5 0 01-1.897 1.13l-3.087.88a.75.75 0 01-.927-.928l.88-3.086a4.5 4.5 0 011.13-1.898l10.5-10.5z" />
              </svg>

              Editar
          </a>

          <!-- BOTÓN ELIMINAR (ROJO) -->
          <a href="/pedidos/1/eliminar"
             class="flex items-center gap-1 bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition">

              <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                   viewBox="0 0 24 24" stroke-width="2" stroke="white"
                   class="w-5 h-5">
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

@endsection

