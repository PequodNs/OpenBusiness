@extends('layouts.app')

@section('title', 'Editar Guía de Despacho')

@section('content')

<div class="max-w-4xl mx-auto mt-10 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Editar Despacho Nº {{ $despacho->id }}
    </h2>

    <form method="POST" action="{{ route('despachos.update', $despacho->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="font-semibold">Fecha de recepción</label>
            <input type="date" name="fecha_recepcion" value="{{ $despacho->fecha_recepcion }}"
                class="w-full border-gray-300 rounded-lg p-2">
        </div>

        <div class="mb-4">
            <label class="font-semibold">Estado</label>
            <select name="estado" class="w-full border-gray-300 rounded-lg p-2">
                <option value="Recibido" {{ $despacho->estado === 'Recibido' ? 'selected' : '' }}>Recibido</option>
                <option value="Completado" {{ $despacho->estado === 'Completado' ? 'selected' : '' }}>Completado</option>
                <option value="Observado" {{ $despacho->estado === 'Observado' ? 'selected' : '' }}>Observado</option>
            </select>
        </div>

        <h3 class="text-xl font-semibold mb-3">Productos recibidos</h3>

        <table class="w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border">Producto</th>
                    <th class="p-2 border">Cantidad recibida</th>
                </tr>
            </thead>

            <tbody>
            @foreach($despacho->detalleDespachos as $index => $detalle)
                <tr>
                    <td class="p-2 border">{{ $detalle->producto->nombre }}</td>
                    <td class="p-2 border">
                        <input type="number" min="0"
                               name="productos[{{ $index }}][cantidad_recibida]"
                               value="{{ $detalle->cantidad_recibida }}"
                               class="border-gray-300 rounded-lg p-2 w-28">

                        <input type="hidden" 
                               name="productos[{{ $index }}][id_detalle]"
                               value="{{ $detalle->id }}">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="flex justify-between mt-6">
            <a href="{{ route('despachos.index') }}"
                class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600">Volver</a>

            <button class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600">
                Actualizar Despacho
            </button>
        </div>
        <div class="flex justify-between mt-6">
  

</div>


    </form>

</div>

@endsection
