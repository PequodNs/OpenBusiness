@extends('layouts.app')

@section('title', 'Historial')

@section('content')
<div class="bg-white text-gray-900 shadow-lg rounded-2xl p-6">

    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Historial de acciones</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 border-b-2 border-gray-300">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Usuario</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Acción</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Detalles</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-semibold">Fecha</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

                @forelse ($historial as $item)
                    <tr class="hover:bg-gray-50 transition-all">

                        <!-- Usuario -->
                        <td class="px-4 py-2 text-gray-800">
                            {{ $item->usuario->name ?? 'Usuario eliminado' }}
                        </td>

                        <!-- Acción -->
                        <td class="px-4 py-2 text-gray-800">
                            {{ $item->accion }}
                        </td>

                        <!-- Detalles -->
                        <td class="px-4 py-2 text-gray-800">
                            {{ $item->detalles }}
                        </td>

                        <!-- Fecha -->
                        <td class="px-4 py-2 text-gray-800">
                            {{ $item->created_at->format('d-m-Y H:i') }}
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                            No hay acciones registradas.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</div>
@endsection