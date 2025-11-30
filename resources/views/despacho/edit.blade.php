@extends('layouts.app')

@section('title', 'Editar Guía de Despacho')

@section('content')

<div class="max-w-4xl mx-auto mt-10 
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))] 
            text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">

    <h2 class="text-2xl font-bold text-[rgb(var(--color-text))] mb-6">
        Editar Despacho Nº {{ $despacho->id }}
    </h2>

    <form method="POST" action="{{ route('despachos.update', $despacho->id) }}">
        @csrf
        @method('PUT')

        <!-- FECHA -->
        <div class="mb-4">
            <label class="font-semibold text-[rgb(var(--color-text))]">Fecha de recepción</label>
            <input type="date" name="fecha_recepcion" 
                value="{{ $despacho->fecha_recepcion }}"
                class="w-full rounded-lg p-2
                       bg-[rgba(var(--color-hover),0.1)]
                       border border-[rgb(var(--color-hover))]
                       text-[rgb(var(--color-text))]">
        </div>

        <!-- ESTADO -->
        <div class="mb-4">
            <label class="font-semibold text-[rgb(var(--color-text))]">Estado</label>

            <select name="estado"
                class="w-full rounded-lg p-2
                       bg-[rgba(var(--color-hover),0.1)]
                       border border-[rgb(var(--color-hover))]
                       text-[rgb(var(--color-text))]">

                <option value="Recibido" {{ $despacho->estado === 'Recibido' ? 'selected' : '' }}>Recibido</option>
                <option value="Completado" {{ $despacho->estado === 'Completado' ? 'selected' : '' }}>Completado</option>
                <option value="Observado" {{ $despacho->estado === 'Observado' ? 'selected' : '' }}>Observado</option>
            </select>
        </div>

        <h3 class="text-xl font-semibold text-[rgb(var(--color-text))] mb-3">
            Productos recibidos
        </h3>

        <!-- TABLA PRODUCTOS -->
        <table class="w-full border border-[rgb(var(--color-hover))] rounded-lg overflow-hidden">
            <thead class="bg-[rgba(var(--color-hover),0.15)] border-b border-[rgb(var(--color-hover))]">
                <tr>
                    <th class="p-2 text-left font-semibold text-[rgb(var(--color-text))]">Producto</th>
                    <th class="p-2 text-left font-semibold text-[rgb(var(--color-text))]">Cantidad recibida</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-[rgba(var(--color-hover),0.3)]">
                @foreach($despacho->detalleDespachos as $index => $detalle)
                    <tr class="hover:bg-[rgba(var(--color-hover),0.1)] transition">
                        <td class="p-2 text-[rgb(var(--color-text))]">{{ $detalle->producto->nombre }}</td>

                        <td class="p-2">
                            <input type="number" min="0"
                                name="productos[{{ $index }}][cantidad_recibida]"
                                value="{{ $detalle->cantidad_recibida }}"
                                class="rounded-lg p-2 w-28
                                       bg-[rgba(var(--color-hover),0.1)]
                                       border border-[rgb(var(--color-hover))]
                                       text-[rgb(var(--color-text))]">

                            <input type="hidden"
                                name="productos[{{ $index }}][id_detalle]"
                                value="{{ $detalle->id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- BOTONES -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('despachos.index') }}"
                class="px-5 py-2 rounded-lg shadow 
                       bg-[rgb(var(--color-hover))]
                       text-[rgb(var(--color-text))]
                       hover:opacity-80 transition">
                Volver
            </a>

            <button
                class="px-5 py-2 rounded-lg shadow 
                       bg-[rgb(var(--color-hover))]
                       text-[rgb(var(--color-text))]
                       hover:opacity-80 transition">
                Actualizar Despacho
            </button>
        </div>

    </form>

</div>

@endsection
