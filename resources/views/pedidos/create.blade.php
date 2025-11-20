@extends('layouts.app')

@section('title', 'Crear Pedido')

@section('content')

<div class="max-w-4xl mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">
  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Crear Pedido
  </h2>

  {{-- Errores --}}
  @if ($errors->any())
      <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
          <ul class="list-disc pl-5">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('pedidos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    {{-- DISTRIBUIDOR --}}
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Proveedor</label>
      <select name="id_distribuidor"
              class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400">
        <option value="">Seleccionar proveedor</option>

        @foreach($proveedores as $prov)
            <option value="{{ $prov->id }}">{{ $prov->nombre }}</option>
        @endforeach
      </select>
    </div>

    {{-- FECHA DEL PEDIDO --}}
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Fecha del Pedido</label>
      <input type="date" name="fecha_pedido"
             class="w-full border border-gray-300 rounded-lg p-2">
    </div>


    {{-- PRODUCTOS DINÁMICOS --}}
    <div class="mt-6">
      <h3 class="text-xl font-bold text-gray-800 mb-3">Productos</h3>

      <div id="productos-container" class="space-y-4">
        <div class="flex gap-4 items-end">
          
          {{-- Producto --}}
          <div class="flex-1">
            <label class="block text-gray-700 font-semibold mb-1">Producto</label>
            <select name="productos[0][id_producto]" class="w-full border-gray-300 rounded-lg p-2">
              <option value="">Seleccionar producto</option>
              @foreach($productos as $prod)
                <option value="{{ $prod->id }}">{{ $prod->nombre }}</option>
              @endforeach
            </select>
          </div>

          {{-- Cantidad --}}
          <div class="w-32">
            <label class="block text-gray-700 font-semibold mb-1">Cantidad</label>
            <input type="number" name="productos[0][cantidad]" min="1"
                   class="w-full border-gray-300 rounded-lg p-2">
          </div>

          {{-- Precio unitario --}}
          <div class="w-40">
            <label class="block text-gray-700 font-semibold mb-1">Precio Unitario</label>
            <input type="number" name="productos[0][precio_unitario]" min="0" step="0.01"
                   class="w-full border-gray-300 rounded-lg p-2">
          </div>
        </div>
      </div>

      <button type="button" id="add-product-btn"
        class="mt-3 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
        + Agregar Producto
      </button>
    </div>

    {{-- DOCUMENTOS --}}
    <div class="mt-6">
      <h3 class="text-xl font-bold text-gray-800 mb-3">Documento (opcional)</h3>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">Tipo de Documento</label>
        <select name="tipo_documento"
                class="w-full border-gray-300 rounded-lg p-2">
          <option value="">Seleccionar tipo de documento</option>
          <option value="orden_compra">Orden de Compra</option>
          <option value="nota">Nota</option>
          <option value="otro">Otro</option>
        </select>
      </div>

      <div class="mt-3">
        <label class="block text-gray-700 font-semibold mb-1">Archivo</label>
        <input type="file" name="archivo"
               class="w-full border-gray-300 rounded-lg p-2">
      </div>
    </div>

    {{-- BOTONES --}}
    <div class="flex justify-between mt-8">
      <a href="{{ route('pedidos.index') }}"
         class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600">
        Volver
      </a>

      <button type="submit"
              class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600">
        Guardar Pedido
      </button>
    </div>

  </form>
</div>

<script>
let index = 1;

document.getElementById('add-product-btn').addEventListener('click', function () {
    const container = document.getElementById('productos-container');

    const html = `
    <div class="flex gap-4 items-end mt-4">

      <div class="flex-1">
        <select name="productos[${index}][id_producto]" class="w-full border-gray-300 rounded-lg p-2">
          <option value="">Seleccionar producto</option>
          @foreach($productos as $prod)
            <option value="{{ $prod->id }}">{{ $prod->nombre }}</option>
          @endforeach
        </select>
      </div>

      <div class="w-32">
        <input type="number" name="productos[${index}][cantidad]" min="1"
               class="w-full border-gray-300 rounded-lg p-2">
      </div>

      <div class="w-40">
        <input type="number" name="productos[${index}][precio_unitario]" min="0" step="0.01"
               class="w-full border-gray-300 rounded-lg p-2">
      </div>

    </div>`;
  
    container.insertAdjacentHTML('beforeend', html);
    index++;
});
</script>

@endsection
