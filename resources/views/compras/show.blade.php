@extends('layouts.app')

@section('title', 'Detalle de Compra')

@section('content')

<div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg border border-gray-300 rounded-xl p-6">

  <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
    Detalle de Compra
  </h2>

  <!-- Información general -->
  <div class="grid grid-cols-2 gap-6 mb-8">

    <div>
      <p class="text-gray-600 font-semibold">N° Orden de Compra:</p>
      <p class="text-gray-800">OC-001</p>
    </div>

    <div>
      <p class="text-gray-600 font-semibold">Fecha:</p>
      <p class="text-gray-800">2025-01-10</p>
    </div>

    <div>
      <p class="text-gray-600 font-semibold">Proveedor:</p>
      <p class="text-gray-800">Proveedor Ejemplo</p>
    </div>

    <div>
      <p class="text-gray-600 font-semibold">Estado:</p>
      <span class="px-3 py-1 bg-yellow-200 text-yellow-800 rounded-lg">
        Pendiente
      </span>
    </div>

  </div>

  <!-- Tabla de productos -->
  <h3 class="text-xl font-bold text-gray-800 mb-3">
    Productos Comprados
  </h3>

  <table class="w-full border-collapse mb-6">
    <thead>
      <tr class="bg-gray-200 border-b border-gray-300">
        <th class="p-3 text-left text-gray-700 font-semibold">Producto</th>
        <th class="p-3 text-left text-gray-700 font-semibold">Cantidad</th>
        <th class="p-3 text-left text-gray-700 font-semibold">Precio Unitario</th>
        <th class="p-3 text-left text-gray-700 font-semibold">Subtotal</th>
      </tr>
    </thead>

    <tbody>
      <tr class="border-b hover:bg-gray-50 transition">
        <td class="p-3">Laptop Asus TUF15</td>
        <td class="p-3">2</td>
        <td class="p-3">$900.000</td>
        <td class="p-3">$1.800.000</td>
      </tr>
    </tbody>
  </table>

  <!-- Total de la compra -->
  <div class="flex justify-end mb-8">
    <div class="text-right">
      <p class="text-gray-700 font-semibold text-lg">Total:</p>
      <p class="text-2xl font-bold text-gray-800">$1.800.000</p>
    </div>
  </div>

  <!-- Observaciones -->
  <div class="mb-8">
    <p class="text-gray-600 font-semibold">Observaciones:</p>
    <p class="text-gray-800">Compra destinada a equipamiento de oficina.</p>
  </div>

  <!-- Acciones -->
  <div class="flex justify-between">

    <a href="/compras"
       class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
      Volver
    </a>

    <div class="flex gap-2">

      <a href="/compras/1/editar"
         class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600 font-semibold transition">
        Editar
      </a>

      <a href="/compras/1/eliminar"
         class="bg-red-600 text-white px-5 py-2 rounded-lg hover:bg-red-700 font-semibold transition">
        Eliminar
      </a>

    </div>

  </div>

</div>

@endsection