@extends('layouts.app')

@section('title', 'Registrar Venta')

@section('content')

<div class="bg-white shadow-lg rounded-2xl p-6 max-w-3xl mx-auto mt-10 text-gray-900">

    <h2 class="text-2xl font-bold text-center mb-6">Registrar Venta</h2>

    <form method="POST" action="{{ route('ventas.store') }}">
        @csrf

        <div id="productos-container" class="space-y-4">

            <div class="producto-item border p-4 rounded-lg bg-gray-50">
                <label class="font-semibold">Producto</label>
                <select name="productos[0][id_producto]" class="w-full border-gray-300 rounded p-2">
                    <option value="">Seleccione</option>
                    @foreach($productos as $p)
                        <option value="{{ $p->id }}">{{ $p->nombre }} (Stock: {{ $p->stock }})</option>
                    @endforeach
                </select>

                <label class="font-semibold mt-2 block">Cantidad</label>
                <input type="number" name="productos[0][cantidad]" min="1"
                       class="w-full border-gray-300 rounded p-2">
            </div>

        </div>

        <button type="button" id="add-product"
                class="px-4 py-2 rounded-lg shadow 
                    bg-[rgb(var(--color-hover))] 
                    text-[rgb(var(--color-text))] 
                    hover:opacity-80 transition">
            + Agregar otro producto
        </button>

        <div class="flex justify-between mt-6">
            <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg shadow 
                    bg-[rgb(var(--color-hover))] 
                    text-[rgb(var(--color-text))] 
                    hover:opacity-80 transition">
                Cancelar
            </a>

            <button class="px-4 py-2 rounded-lg shadow 
                    bg-[rgb(var(--color-hover))] 
                    text-[rgb(var(--color-text))] 
                    hover:opacity-80 transition">
                Registrar Venta
            </button>
        </div>

    </form>
</div>

<script>
let index = 1;

document.getElementById("add-product").addEventListener("click", () => {
    const container = document.getElementById("productos-container");

    const html = `
        <div class="producto-item border p-4 rounded-lg bg-gray-50 mt-3">
            <label class="font-semibold">Producto</label>
            <select name="productos[${index}][id_producto]" class="w-full border-gray-300 rounded p-2">
                <option value="">Seleccione</option>
                @foreach($productos as $p)
                    <option value="{{ $p->id }}">{{ $p->nombre }} (Stock: {{ $p->stock }})</option>
                @endforeach
            </select>

            <label class="font-semibold mt-2 block">Cantidad</label>
            <input type="number" name="productos[${index}][cantidad]" min="1"
                   class="w-full border-gray-300 rounded p-2">
        </div>
    `;

    container.insertAdjacentHTML("beforeend", html);
    index++;
});
</script>

@endsection
