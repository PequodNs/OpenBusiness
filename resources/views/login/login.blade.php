@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')

<div class="max-w-lg mx-auto mt-20 bg-white text-gray-900 shadow-lg border border-gray-300 rounded-xl p-6">

  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Iniciar Sesión
  </h2>

  <form class="space-y-4" method="POST" action="/login">
    @csrf

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
      <input type="email"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400"
             placeholder="Usuario"
             required>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-1">Contraseña</label>
      <input type="password"
             class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-gray-400"
             placeholder="********"
             required>
    </div>

    <div class="flex justify-between items-center mt-6">

      <a href="/productos"
         class="text-sm font-semibold text-gray-700 hover:underline">
        ← Volver
      </a>

      <a href="/productos"
              class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-600 font-semibold transition">
        Ingresar
      </a>

    </div>

  </form>

</div>

@endsection