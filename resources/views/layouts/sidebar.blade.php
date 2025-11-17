<!DOCTYPE html>
<html lang="es" class="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modo Claro</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  

</head>

<body class="bg-[rgb(var(--color-bg))] text-[rgb(var(--color-text))] transition-all duration-300">

  <div class="sidebar w-64 h-screen border-r-4 shadow-xl flex flex-col p-5 transition-all duration-300
              bg-[rgb(var(--color-sidebar))] 
              border-gray-300 dark:border-gray-700">


      <h2 class="text-2xl font-extrabold mb-6 text-center tracking-wide 
                 border-b border-gray-400 dark:border-gray-600 pb-3">
        Menú
      </h2>

      <nav class="flex flex-col gap-3">

        <a href="/"
          class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Inicio
        </a>

        <a href="/" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Productos
        </a>

        <a href="/" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Proveedores
        </a>

        <a href="/" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Categorías
        </a>

        <a href="/" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Pedidos
        </a>

        <a href="/" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Despacho
        </a>

        <a href="/" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Historial
        </a>

        <a href="/" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Compras
        </a>

        <a href="/" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Usuarios
        </a>

      </nav>

      <button class="mt-auto bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg font-semibold">
        Salir
      </button>

      <div class="text-center text-sm border-t border-gray-400 dark:border-gray-600 pt-3 mt-3">
        © 2025 OpenBusiness
      </div>
  </div>

  <!-- Script Modo Oscuro -->
  <script>
    function toggleTheme() {
        const html = document.documentElement;

        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            html.classList.add('light');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.remove('light');
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    }

    // Mantener tema al recargar
    (function () {
        const theme = localStorage.getItem('theme');
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    })();
  </script>

</body>
</html>