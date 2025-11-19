@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="bg-white shadow-lg text-gray-900 rounded-2xl p-6 max-w-3xl mx-auto mt-10">

    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Crear Usuario</h2>

    <form class="space-y-4">

        <div>
            <label class="block text-gray-700 font-semibold">Nombre de Usuario</label>
            <input type="text" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Correo</label>
            <input type="email" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Contraseña</label>
            <input type="password" class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Rol</label>
            <select class="w-full border-gray-300 rounded-lg p-2 shadow-sm">
                <option value="1">Usuario</option>
            </select>
        </div>

        <div class="flex justify-between pt-6">

            <a href="/usuario"
               class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
                Volver
            </a>

            <button type="button"
                class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
                Guardar
            </button>

        </div>

    </form>

</div>
@endsection