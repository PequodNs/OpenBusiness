@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

<div class="max-w-5xl mx-auto mt-10 bg-white text-gray-900 shadow-lg border rounded-xl p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Listado de Ventas</h2>

        <a href="{{ route('ventas.create') }}"
           class="px-4 py-2 rounded-lg shadow bg-gray-800 text-white hover:bg-gray-600 transition">
            + Nueva Venta
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-600 text-white rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200 border-b">
                <th class="p-3 text-left font-semibold">ID</th>
                <th class="p-3 text-left font-semibold">Fecha</th>
                <th class="p-3 text-left font-semibold">Usuario</th>
                <th class="p-3 text-left font-semibold">Total</th>
                <th class="p-3 text-left font-semibold">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($ventas as $venta)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="p-3">{{ $venta->id }}</td>
                <td class="p-3">{{ $venta->fecha }}</td>
                <td class="p-3">{{ $venta->usuario->name ?? 'Usuario Eliminado' }}</td>
                <td class="p-3">${{ number_format($venta->total, 0, ',', '.') }}</td>

                <td class="p-3 flex gap-2">
                    <a href="{{ route('ventas.show', $venta->id) }}"
                        class="px-3 py-1.5 rounded-lg bg-gray-800 text-white hover:bg-gray-600 transition">
                        👁️ Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
