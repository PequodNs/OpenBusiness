@extends('layouts.app')

@section('title', 'Registrar Venta')

@section('content')

<div class="max-w-lg mx-auto mt-10 
            shadow-lg rounded-xl p-6
            border border-[rgb(var(--color-hover))]
            bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))]">

    <h2 class="text-2xl font-bold text-center mb-6">Registrar Venta</h2>

    <form method="POST" action="{{ route('ventas.store') }}">
        @csrf

        <div id="productos-container" class="space-y-4 ">

            <div class="producto-item border border-[rgb(var(--color-border))] p-4 rounded-lg 
                        bg-[rgb(var(--color-hover))]/10">
                <label class="font-semibold">Producto</label>
                <select name="productos[0][id_producto]" 
                        class="w-full border-[rgb(var(--color-border))] rounded p-2 bg-[rgb(var(--color-bg))]">
                    <option value="">Seleccione</option>
                    @foreach($productos as $p)
                        <option value="{{ $p->id }}">{{ $p->nombre }} (Stock: {{ $p->stock }})</option>
                    @endforeach
                </select>

                <label class="font-semibold mt-2 block">Cantidad</label>
                <input type="number" name="productos[0][cantidad]" min="1"
                       class="w-full border-[rgb(var(--color-border))] rounded p-2 bg-[rgb(var(--color-bg))]">
            </div>

        </div>

        <!-- Botón separado visualmente -->
        <button type="button" id="add-product"
                class="px-4 py-2 rounded-lg shadow mt-4
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
        <div class="producto-item border border-[rgb(var(--color-border))] p-4 rounded-lg 
                    bg-[rgb(var(--color-hover))]/10 mt-3">
            <label class="font-semibold">Producto</label>
            <select name="productos[${index}][id_producto]" 
                    class="w-full border-[rgb(var(--color-border))] rounded p-2 bg-[rgb(var(--color-bg))]">
                <option value="">Seleccione</option>
                @foreach($productos as $p)
                    <option value="{{ $p->id }}">{{ $p->nombre }} (Stock: {{ $p->stock }})</option>
                @endforeach
            </select>

            <label class="font-semibold mt-2 block">Cantidad</label>
            <input type="number" name="productos[${index}][cantidad]" min="1"
                   class="w-full border-[rgb(var(--color-border))] rounded p-2 bg-[rgb(var(--color-bg))]">
        </div>
    `;

    container.insertAdjacentHTML("beforeend", html);
    index++;
});
</script>

@endsection
