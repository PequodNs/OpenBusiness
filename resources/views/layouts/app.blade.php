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

            @include('layouts.header')

            <div class="flex min-h-screen">

                @include('layouts.sidebar')

                <div class="flex-1 p-6">
                    @yield('content')
                </div>

            </div>

            <style>
                :root {
                    --color-bg: 243 244 246;
                    --color-sidebar: 255 255 255;
                    --color-text: 17 24 39;

                    --color-hover: 182 195 214;
                }

                .dark {
                    --color-bg: 17 24 39;
                    --color-sidebar: 31 41 55;
                    --color-text: 255 255 255;

                    --color-hover: 182 195 214;
                }
            </style>

            <script>
                function toggleTheme() {
                    const html = document.documentElement;

                    if (html.classList.contains('dark')) {
                        html.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    } else {
                        html.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    }
                }

                // Mantener tema al recargar
                (() => {
                    const theme = localStorage.getItem('theme');
                    if (theme === 'dark') document.documentElement.classList.add('dark');
                })();
            </script>

    </body>
</html>
