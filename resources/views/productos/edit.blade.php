@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="max-w-5xl mx-auto mt-10
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))]
            text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">
    
    <h2 class="text-2xl font-bold text-[rgb(var(--color-text))] mb-6 text-center">Editar Producto</h2>

    {{-- Alerta amarilla informativa --}}
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 mb-4 rounded">
        <p class="font-semibold">Aviso importante</p>
        <p class="text-sm">
            Usa este formulario solo para editar productos en el sistema (nombre, imágenes, etc.) y <strong>tu stock actual</strong>. 
            Si deseas añadir productos, hazlo por pedidos para evitar <strong>errores en los datos.</strong>
        </p>
    </div>

    <form class="space-y-4" 
          method="POST" 
          action="{{ route('productos.update', $producto->id) }}" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div>
            <label class="block font-semibold text-[rgb(var(--color-text))]">Nombre</label>
            <input type="text" name="nombre"
                value="{{ old('nombre', $producto->nombre) }}"
                class="w-full bg-[rgb(var(--color-bg-secondary))] text-[rgb(var(--color-text))] border border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm"
                required>
        </div>

        <!-- Descripción -->
        <div>
            <label class="block font-semibold text-[rgb(var(--color-text))]">Descripción</label>
            <textarea name="descripcion"
                class="w-full bg-[rgb(var(--color-bg-secondary))] text-[rgb(var(--color-text))] border border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm"
            >{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <!-- Stock y stock mínimo -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold text-[rgb(var(--color-text))]">Stock</label>
                <input type="number" name="stock"
                    value="{{ old('stock', $producto->stock) }}"
                    class="w-full bg-[rgb(var(--color-bg-secondary))] text-[rgb(var(--color-text))] border border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm"
                    required>
            </div>

            <div>
                <label class="block font-semibold text-[rgb(var(--color-text))]">Stock Mínimo</label>
                <input type="number" name="stock_minimo"
                    value="{{ old('stock_minimo', $producto->stock_minimo) }}"
                    class="w-full bg-[rgb(var(--color-bg-secondary))] text-[rgb(var(--color-text))] border border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm"
                    required>
            </div>
        </div>

        <!-- Precio -->
        <div>
            <label class="block font-semibold text-[rgb(var(--color-text))]">Precio</label>
            <input type="number" name="precio" step="0.01"
                value="{{ old('precio', $producto->precio) }}"
                class="w-full bg-[rgb(var(--color-bg-secondary))] text-[rgb(var(--color-text))] border border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm"
                required>
        </div>

        <!-- Distribuidor -->
        <div>
            <label class="block font-semibold text-[rgb(var(--color-text))]">Distribuidor</label>
            <select name="id_distribuidor"
                class="w-full bg-[rgb(var(--color-bg-secondary))] text-[rgb(var(--color-text))] border border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm">
                
                <option value="">Seleccionar distribuidor</option>

                @foreach($distribuidores as $distribuidor)
                    <option value="{{ $distribuidor->id }}"
                        {{ $producto->id_distribuidor == $distribuidor->id ? 'selected' : '' }}>
                        {{ $distribuidor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Agregar imágenes -->
        <div>
            <label class="block font-semibold text-[rgb(var(--color-text))]">Agregar nuevas imágenes</label>
            <input type="file" name="imagenes[]" multiple
                class="w-full bg-[rgb(var(--color-bg-secondary))] text-[rgb(var(--color-text))] border border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm">
        </div>

        <!-- Imágenes actuales -->
        @if($producto->imagenes->count() > 0)
        <div>
            <label class="block font-semibold text-[rgb(var(--color-text))] mb-1">Imágenes actuales</label>
            <div class="grid grid-cols-3 gap-3">
                @foreach($producto->imagenes as $img)
                    <div class="border border-[rgb(var(--color-border))] rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/'.$img->ruta_imagen) }}" class="w-full h-24 object-cover">
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Botones -->
        <div class="flex justify-between pt-6">

            <a href="{{ route('productos.index') }}"
               class="flex items-center gap-1 
                                px-3 py-1.5 rounded-lg 
                                bg-[rgb(var(--color-hover))] 
                                text-[rgb(var(--color-text))] 
                                hover:opacity-80 transition">
                Volver
            </a>

            <button type="submit"
                class="flex items-center gap-1 
                                px-3 py-1.5 rounded-lg 
                                bg-[rgb(var(--color-hover))] 
                                text-[rgb(var(--color-text))] 
                                hover:opacity-80 transition">
                Actualizar
            </button>

        </div>

    </form>

</div>
@endsection
