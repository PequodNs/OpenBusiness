@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')

<div class="max-w-lg mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">
  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Editar Pedido
  </h2>

  <form class="space-y-4">

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Código del Pedido</label>
      <input type="text" value="PED-001" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Proveedor</label>
      <select class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option>Seleccionar proveedor</option>
        <option>Proveedor A</option>
        <option>Proveedor B</option>
        <option>Proveedor C</option>
      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">N° Orden de Compra</label>
      <select class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">

        <option value="">Seleccionar orden de compra</option>

        {{-- Opciones predefinidas sin backend --}}
        <option value="1">OC-001 — Compra de Insumos</option>
        <option value="2">OC-002 — Repuestos varios</option>
        <option value="3">OC-003 — Material de oficina</option>

      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Fecha</label>
      <input type="date" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Observaciones</label>
      <textarea class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400"
                placeholder="Notas adicionales…"></textarea>
    </div>

    <div class="flex justify-between mt-6">
      <a href="/pedidos"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Volver
      </a>

      <button
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Editar
      </button>
    </div>

  </form>
</div>

@endsection
