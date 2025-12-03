@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="max-w-6xl mx-auto mt-10
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">

    <!-- Encabezado -->
    <div class="mb-4 flex items-center justify-between">
    <h2 class="text-2xl font-bold text-[rgb(var(--color-text))]">Lista de Productos</h2>

    <div class="flex gap-2">
        <a href="{{ route('productos.create') }}"
           class="px-4 py-2 rounded-lg shadow 
                  bg-[rgb(var(--color-hover))] 
                  text-[rgb(var(--color-text))] 
                  hover:opacity-80 transition">
            Agregar Producto
        </a>

        <a href="{{ route('ventas.create') }}"
           class="px-4 py-2 rounded-lg shadow 
                  bg-[rgb(var(--color-hover))] 
                  text-[rgb(var(--color-text))] 
                  hover:opacity-80 transition">
            🛒 Vender
        </a>
    </div>
</div>


    @if(session('success'))
        <div class="p-4 rounded-lg mb-4
                    bg-green-600 text-white">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla tipo pedidos -->
    <table class="w-full border-collapse">
        <thead>
            <tr class="border-b border-[rgb(var(--color-hover))]
                       bg-[rgb(var(--color-hover))]/20">
                <th class="p-3 text-left font-semibold">Imagen</th>
                <th class="p-3 text-left font-semibold">Nombre</th>
                <th class="p-3 text-left font-semibold">Descripción</th>
                <th class="p-3 text-left font-semibold">Precio</th>
                <th class="p-3 text-left font-semibold">Stock</th>
                <th class="p-3 text-left font-semibold">Stock mínimo</th>
                <th class="p-3 text-left font-semibold">Proveedor</th>
                <th class="p-3 text-left font-semibold">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($productos as $producto)
            <tr class="border-b border-[rgb(var(--color-hover))]
                       hover:bg-[rgb(var(--color-hover))]/10 transition">

                <td class="p-3">
                    @php
                        $imagen = $producto->imagenes->first();
                        $ruta = $imagen ? 'storage/' . $imagen->ruta_imagen : null;
                        $existe = $ruta && file_exists(public_path($ruta));
                    @endphp

                    <img src="{{ $existe ? asset($ruta) : 'https://via.placeholder.com/60' }}"
                         alt="Imagen del producto"
                         class="w-12 h-12 rounded-lg object-cover border border-[rgb(var(--color-hover))]">
                </td>

                <td class="p-3">{{ $producto->nombre }}</td>
                <td class="p-3">{{ $producto->descripcion }}</td>
                <td class="p-3">{{ number_format($producto->precio, 2) }}</td>
                <td class="p-3">{{ $producto->stock }}</td>
                <td class="p-3">{{ $producto->stock_minimo }}</td>
                <td class="p-3">{{ $producto->distribuidor->nombre ?? 'Sin proveedor' }}</td>

                <td class="p-3 flex gap-2">
                    <a href="{{ route('productos.edit', $producto->id) }}"
                       class="flex items-center gap-1 
                              px-3 py-1.5 rounded-lg 
                              bg-[rgb(var(--color-hover))] 
                              text-[rgb(var(--color-text))] 
                              hover:opacity-80 transition">
                        ✏️ Editar
                    </a>

                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="flex items-center gap-1 px-3 py-1.5 rounded-lg transition
                                       bg-red-600 text-white hover:bg-red-700">
                            🗑️ Eliminar
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
<!-- Paginación -->
    <div class="mt-6 ">
        {{ $productos->links('components.pagination') }}
    </div>
    
</div>
@endsection
