@extends('layouts.app')

@section('title', 'Añadir Proveedor')

@section('content')

<div class="max-w-lg mx-auto mt-10 
            shadow-lg rounded-xl p-6
            border border-[rgb(var(--color-hover))]
            bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]">

  <h2 class="text-2xl font-bold mb-6 text-center">
    Añadir Proveedor
  </h2>

  <form action="{{ route('proveedores.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label class="block font-semibold mb-1 text-[rgb(var(--color-text))]">Nombre</label>
      <input type="text" name="nombre"
        class="w-full border border-[rgb(var(--color-hover))]
               rounded-lg p-2 focus:ring-2 focus:ring-[rgb(var(--color-hover))]
               bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]"
        required>
    </div>

    <div>
      <label class="block font-semibold mb-1 text-[rgb(var(--color-text))]">Contacto</label>
      <input type="text" name="contacto"
        class="w-full border border-[rgb(var(--color-hover))]
               rounded-lg p-2 focus:ring-2 focus:ring-[rgb(var(--color-hover))]
               bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]">
    </div>

    <div>
      <label class="block font-semibold mb-1 text-[rgb(var(--color-text))]">Email</label>
      <input type="email" name="email"
        class="w-full border border-[rgb(var(--color-hover))]
               rounded-lg p-2 focus:ring-2 focus:ring-[rgb(var(--color-hover))]
               bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]">
    </div>

    <div>
      <label class="block font-semibold mb-1 text-[rgb(var(--color-text))]">Dirección</label>
      <textarea name="direccion"
        class="w-full border border-[rgb(var(--color-hover))]
               rounded-lg p-2 focus:ring-2 focus:ring-[rgb(var(--color-hover))]
               bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]"></textarea>
    </div>

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
        Guardar
      </button>
    </div>

  </form>
</div>
@endsection
