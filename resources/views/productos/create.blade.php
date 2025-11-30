@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<div class="max-w-5xl mx-auto mt-10
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))]
            text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">

    <h2 class="text-2xl font-bold text-[rgb(var(--color-text))] mb-6 text-center">Crear Producto</h2>

    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 mb-4 rounded">
        <p class="font-semibold">Aviso importante</p>
        <p class="text-sm">
            Usa este formulario solo para crear productos nuevos en el sistema y 
            <strong>tu stock actual.</strong>  
            Los productos creados aquí estarán disponibles para ser seleccionados en las  
            <strong>Órdenes de Compra</strong>.  
            Si deseas añadir productos prefiere hacerlo por pedidos para evitar 
            <strong>errores en los datos.</strong>
        </p>
    </div>

    <form class="space-y-4" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label class="block text-[rgb(var(--color-text))] font-semibold">Nombre</label>
            <input type="text" name="nombre"
                class="w-full bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                       border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm" required>
        </div>

        <div>
            <label class="block text-[rgb(var(--color-text))] font-semibold">Descripción</label>
            <textarea name="descripcion"
                class="w-full bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                       border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm"></textarea>
        </div>

        <div>
            <label class="block text-[rgb(var(--color-text))] font-semibold">Cantidad</label>
            <input type="number" name="stock" min="0"
                class="w-full bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                       border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm" required>
        </div>

        <div>
            <label class="block text-[rgb(var(--color-text))] font-semibold">Stock Mínimo</label>
            <input type="number" name="stock_minimo" min="0"
                class="w-full bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                       border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm" required>
        </div>

        <div>
            <label class="block text-[rgb(var(--color-text))] font-semibold">Precio</label>
            <input type="number" name="precio" step="0.01"
                class="w-full bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                       border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm" required>
        </div>

        <div>
            <label class="block text-[rgb(var(--color-text))] font-semibold">Distribuidor</label>
            <select name="id_distribuidor"
                class="w-full bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                       border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm">
                <option value="">Seleccionar distribuidor</option>
                @foreach($distribuidores as $distribuidor)
                    <option value="{{ $distribuidor->id }}">{{ $distribuidor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-[rgb(var(--color-text))] font-semibold">Imágenes</label>
            <input type="file" name="imagenes[]" multiple
                class="w-full bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]
                       border-[rgb(var(--color-border))] rounded-lg p-2 shadow-sm">
        </div>

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
                Guardar
            </button>

        </div>

    </form>

</div>
@endsection
