@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')
<div class="max-w-lg mx-auto mt-10 
            bg-[rgb(var(--color-bg))] 
            text-[rgb(var(--color-text))] 
            shadow-lg border border-[rgb(var(--color-border))] 
            rounded-xl p-6">

    <h2 class="text-2xl font-bold mb-6 text-center text-[rgb(var(--color-text))]">
        Editar Proveedor
    </h2>

    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div>
            <label class="block font-semibold mb-1 text-[rgb(var(--color-text))]">Nombre</label>
            <input type="text" name="nombre"
                   value="{{ old('nombre', $proveedor->nombre) }}"
                   class="w-full border border-[rgb(var(--color-border))] bg-[rgb(var(--color-bg))] 
                          text-[rgb(var(--color-text))] rounded-lg p-2 
                          focus:ring-2 focus:ring-[rgb(var(--color-hover))]">
        </div>

        <!-- Contacto -->
        <div>
            <label class="block font-semibold mb-1 text-[rgb(var(--color-text))]">Contacto</label>
            <input type="text" name="contacto"
                   value="{{ old('contacto', $proveedor->contacto) }}"
                   class="w-full border border-[rgb(var(--color-border))] bg-[rgb(var(--color-bg))] 
                          text-[rgb(var(--color-text))] rounded-lg p-2 
                          focus:ring-2 focus:ring-[rgb(var(--color-hover))]">
        </div>

        <!-- Email -->
        <div>
            <label class="block font-semibold mb-1 text-[rgb(var(--color-text))]">Email</label>
            <input type="email" name="email"
                   value="{{ old('email', $proveedor->email) }}"
                   class="w-full border border-[rgb(var(--color-border))] bg-[rgb(var(--color-bg))] 
                          text-[rgb(var(--color-text))] rounded-lg p-2 
                          focus:ring-2 focus:ring-[rgb(var(--color-hover))]">
        </div>

        <!-- Dirección -->
        <div>
            <label class="block font-semibold mb-1 text-[rgb(var(--color-text))]">Dirección</label>
            <textarea name="direccion"
                      class="w-full border border-[rgb(var(--color-border))] bg-[rgb(var(--color-bg))] 
                             text-[rgb(var(--color-text))] rounded-lg p-2 
                             focus:ring-2 focus:ring-[rgb(var(--color-hover))]">{{ old('direccion', $proveedor->direccion) }}</textarea>
        </div>

        <!-- Botones -->
        <div class="flex justify-between mt-6">

            <a href="{{ route('proveedores.index') }}"
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
                Guardar Cambios
            </button>

        </div>
    </form>
</div>
@endsection
