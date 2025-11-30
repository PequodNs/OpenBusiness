<!DOCTYPE html>
<html lang="es">
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
    <body id="app-body" 
      class="font-sans antialiased bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))] transition-all duration-300">


      @if(session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-4 max-w-3xl mx-auto">
    <strong>Error:</strong> {{ session('error') }}
</div>
@endif


            @include('layouts.header')

            <div class="flex min-h-screen">

                <div class="shrink-0">
                    @include('layouts.sidebar')
                </div>

                <div class="flex-1 flex justify-center">
                    <div class="p-6 w-full max-w-5xl">
                        @yield('content')
                    </div>
                </div>

            </div>

            <style>
                :root {
                    --font-size: 16px;

                    --color-bg: 243 244 246;
                    --color-sidebar: 255 255 255;
                    --color-header: 255 255 255;

                    --color-text: 17 24 39;

                    --color-button-bg: 182 195 214;
                    --color-button-text: 17 24 39;

                    --color-hover: 182 195 214;
                }

                /* ====== Tamaños de fuente ====== */
                [data-font="small"]  { --font-size: 14px; }
                [data-font="medium"] { --font-size: 16px; }
                [data-font="large"]  { --font-size: 20px; }

                body {
                    font-size: var(--font-size);
                }

                /* ====== TEMAS ====== */

                /* Claro */
                [data-theme="light"] {
                    --color-bg: 243 244 246;
                    --color-sidebar: 255 255 255;
                    --color-header: 255 255 255;

                    --color-text: 17 24 39;

                    --color-button-bg: 182 195 214;
                    --color-button-text: 17 24 39;

                    --color-hover: 182 195 214;
                }

                /* Oscuro */
                [data-theme="dark"] {
                    --color-bg: 17 24 39;
                    --color-sidebar: 31 41 55;
                    --color-header: 31 41 55;

                    --color-text: 255 255 255;

                    --color-button-bg: 120 130 150;
                    --color-button-text: 255 255 255;

                    --color-hover: 100 110 130;
                }

                /* Protanopia */
                [data-theme="protanopia"] {
                    --color-bg: 245 245 245;
                    --color-sidebar: 230 230 230;
                    --color-header: 230 230 230;

                    --color-text: 20 20 20;

                    --color-button-bg: 50 150 255;
                    --color-button-text: 255 255 255;

                    --color-hover: 30 130 230;
                }

                /* Deuteranopia */
                [data-theme="deuteranopia"] {
                    --color-bg: 245 245 245;
                    --color-sidebar: 230 230 230;
                    --color-header: 230 230 230;

                    --color-text: 20 20 20;

                    --color-button-bg: 255 180 50;
                    --color-button-text: 0 0 0;

                    --color-hover: 230 160 40;
                }

                /* Tritanopia */
                [data-theme="tritanopia"] {
                    --color-bg: 250 250 240;
                    --color-sidebar: 240 240 220;
                    --color-header: 240 240 220;

                    --color-text: 0 0 0;

                    --color-button-bg: 200 70 70;
                    --color-button-text: 255 255 255;

                    --color-hover: 170 50 50;
                }
            </style>

            <script>
                function toggleTheme() {
                    const html = document.documentElement;
                    const current = html.getAttribute("data-theme");

                    const next = current === "dark" ? "light" : "dark";

                    html.setAttribute("data-theme", next);
                    localStorage.setItem("theme", next);
                }

                // Cargar preferencias guardadas
                (() => {
                    const theme = localStorage.getItem("theme") || "light";
                    const font  = localStorage.getItem("fontSize") || "medium";

                    document.documentElement.setAttribute("data-theme", theme);
                    document.documentElement.setAttribute("data-font", font);
                })();
            </script>

    </body>
</html>
