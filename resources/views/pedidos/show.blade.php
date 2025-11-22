@extends('layouts.app')

@section('title', 'Detalle del Pedido')

@section('content')

<div class="max-w-4xl mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">

  <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
    Detalle del Pedido
  </h2>

  <!-- Información general del pedido -->
  <div class="grid grid-cols-2 gap-6 mb-8">
    <div>
      <p class="text-gray-600 font-semibold">Código del Pedido:</p>
      <p class="text-gray-800">{{ 'PED-' . str_pad($pedido->id, 3, '0', STR_PAD_LEFT) }}</p>
    </div>

    <div>
      <p class="text-gray-600 font-semibold">Fecha del Pedido:</p>
      <p class="text-gray-800">{{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('Y-m-d') }}</p>
    </div>

    <div>
      <p class="text-gray-600 font-semibold">Proveedor:</p>
      <p class="text-gray-800">{{ $pedido->distribuidor->nombre ?? 'Sin proveedor' }}</p>
    </div>

    <div>
      <p class="text-gray-600 font-semibold">N° Orden de Compra:</p>
      <p class="text-gray-800">{{ $pedido->ordenDespacho->numero ?? 'No asignado' }}</p>
    </div>

    <div>
      <p class="text-gray-600 font-semibold">Estado:</p>
      <p class="text-gray-800">{{ ucfirst($pedido->estado) }}</p>
    </div>
  </div>

  <!-- Tabla de productos del pedido -->
  <h3 class="text-xl font-bold text-gray-800 mb-3">
    Productos del Pedido
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
      @foreach($pedido->detallePedidos as $detalle)
        <tr class="border-b hover:bg-gray-50 transition">
          <td class="p-3">{{ $detalle->producto->nombre ?? 'Producto no disponible' }}</td>
          <td class="p-3">{{ $detalle->cantidad }}</td>
          <td class="p-3">${{ number_format($detalle->producto->precio, 0, ',', '.') }}</td>
          <td class="p-3">${{ number_format($detalle->cantidad * $detalle->producto->precio, 0, ',', '.') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Total del pedido -->
  <div class="flex justify-end mb-8">
    <div class="text-right">
      <p class="text-gray-700 font-semibold text-lg">Total:</p>
      <p class="text-2xl font-bold text-gray-800">
        ${{ number_format($pedido->detallePedidos->sum(function($detalle) { return $detalle->cantidad * $detalle->producto->precio; }), 0, ',', '.') }}
      </p>
    </div>
  </div>

  <!-- Observaciones -->
  <div class="mb-8">
    <p class="text-gray-600 font-semibold">Observaciones:</p>
    <p class="text-gray-800">{{ $pedido->observaciones ?? 'Sin observaciones' }}</p>
  </div>

  <!-- Acciones -->
  <div class="flex justify-between">
    <a href="{{ route('pedidos.index') }}"
       class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
      Volver
    </a>
  </div>

</div>

@endsection
