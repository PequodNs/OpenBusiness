<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body id="app-body" class="font-sans antialiased">

        @include('layouts.header')
        
        <!-- Contenedor principal -->
        <div class="flex min-h-screen">

            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Contenido -->
            <div class="flex-1 p-6">
                @yield('content')
            </div>

        </div>

        <script>
            function toggleTheme() {
                const body = document.getElementById("app-body");
                body.classList.toggle("dark");
            }
        </script>

    </body>
</html>
