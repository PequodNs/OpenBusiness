@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-300 py-12 px-4 sm:px-6 lg:px-8">

  <div class="max-w-md w-full bg-white rounded-xl shadow-xl p-8 border border-gray-200">

    <!-- Icono decorativo -->
    <div class="flex justify-center mb-6">
      <img src="/images/login-icon.svg" alt="Login Icon" class="w-16 h-16 animate-bounce" />
    </div>

    <h2 class="text-center text-3xl font-extrabold text-gray-800 mb-6">
      Bienvenido a OpenBusiness
    </h2>

    <form class="space-y-5" method="POST" action="/login">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
        <input id="email" name="email" type="email" autocomplete="email" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
               placeholder="usuario@empresa.com">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input id="password" name="password" type="password" autocomplete="current-password" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
               placeholder="********">
      </div>

      <div class="flex items-center justify-between">
        <a href="/" class="text-sm text-indigo-600 hover:underline font-medium">← Volver</a>
        <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
          Ingresar
        </button>
      </div>

    </form>

  </div>

</div>

@endsection
