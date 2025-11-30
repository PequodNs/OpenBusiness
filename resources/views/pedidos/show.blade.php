@extends('layouts.app')

@section('title', 'Detalle del Pedido')

@section('content')

<div class="max-w-4xl mx-auto mt-10 bg-card text-primary shadow-lg border border-border rounded-xl p-6">

  <h2 class="text-3xl font-bold text-primary mb-6 text-center">
    Detalle del Pedido
  </h2>

  <!-- Información general -->
  <div class="grid grid-cols-2 gap-6 mb-8">
    
    <div>
      <p class="text-secondary font-semibold">Código del Pedido:</p>
      <p class="text-primary">{{ 'PED-' . str_pad($pedido->id, 3, '0', STR_PAD_LEFT) }}</p>
    </div>

    <div>
      <p class="text-secondary font-semibold">Fecha del Pedido:</p>
      <p class="text-primary">{{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('Y-m-d') }}</p>
    </div>

    <div>
      <p class="text-secondary font-semibold">Proveedor:</p>
      <p class="text-primary">{{ $pedido->distribuidor->nombre ?? 'Sin proveedor' }}</p>
    </div>

    <div>
      <p class="text-secondary font-semibold">N° Orden de Compra:</p>
      <p class="text-primary">{{ $pedido->ordenDespacho->numero ?? 'No asignado' }}</p>
    </div>

    <div>
      <p class="text-secondary font-semibold">Estado:</p>
      <p class="text-primary">{{ ucfirst($pedido->estado) }}</p>
    </div>

  </div>

  <!-- Productos -->
  <h3 class="text-xl font-bold text-primary mb-3">
    Productos del Pedido
  </h3>

  <table class="w-full border-collapse mb-6">
    <thead>
      <tr class="bg-table-header border-b border-border">
        <th class="p-3 text-left text-secondary font-semibold">Producto</th>
        <th class="p-3 text-left text-secondary font-semibold">Cantidad</th>
        <th class="p-3 text-left text-secondary font-semibold">Precio Unitario</th>
        <th class="p-3 text-left text-secondary font-semibold">Subtotal</th>
      </tr>
    </thead>

    <tbody>
      @foreach($pedido->detallePedidos as $detalle)
        <tr class="border-b border-border hover:bg-hover transition">
          <td class="p-3 text-primary">{{ $detalle->producto->nombre ?? 'Producto no disponible' }}</td>
          <td class="p-3 text-primary">{{ $detalle->cantidad }}</td>
          <td class="p-3 text-primary">${{ number_format($detalle->producto->precio, 0, ',', '.') }}</td>
          <td class="p-3 text-primary">
            ${{ number_format($detalle->cantidad * $detalle->producto->precio, 0, ',', '.') }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Total -->
  <div class="flex justify-end mb-8">
    <div class="text-right">
      <p class="text-secondary font-semibold text-lg">Total:</p>
      <p class="text-2xl font-bold text-primary">
        ${{ number_format($pedido->detallePedidos->sum(fn($d) => $d->cantidad * $d->producto->precio), 0, ',', '.') }}
      </p>
    </div>
  </div>

  <!-- Observaciones -->
  <div class="mb-8">
    <p class="text-secondary font-semibold">Observaciones:</p>
    <p class="text-primary">{{ $pedido->observaciones ?? 'Sin observaciones' }}</p>
  </div>

  <!-- Botón volver -->
  <div class="flex justify-between">
    <a href="{{ route('pedidos.index') }}"
       class="px-4 py-2 rounded-lg shadow 
                    bg-[rgb(var(--color-hover))] 
                    text-[rgb(var(--color-text))] 
                    hover:opacity-80 transition">
      Volver
    </a>
  </div>

</div>

@endsection
