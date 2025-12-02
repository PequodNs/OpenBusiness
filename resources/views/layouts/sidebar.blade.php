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

        <a href="/home"
          class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Inicio
        </a>

        <a href="{{ route('productos.index') }}"
         class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Productos
        </a>

        <a href="{{ route('proveedores.index') }}" 
          class="block px-4 py-2 rounded-lg transition-all duration-200
          bg-[rgb(var(--color-sidebar))]
          text-[rgb(var(--color-text))]
          hover:bg-[rgb(var(--color-hover))]">
          Proveedores
        </a>
        <a href="{{ route('pedidos.index') }}" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Pedidos
        </a>

        <a href="{{ route('despacho.index') }}" class="block px-4 py-2 rounded-lg transition-all duration-200
          bg-[rgb(var(--color-sidebar))] text-[rgb(var(--color-text))] hover:bg-[rgb(var(--color-hover))]">
          Despacho
        </a>

        <a href="{{ route('historial.index') }}" class="block px-4 py-2 rounded-lg transition-all duration-200
                  bg-[rgb(var(--color-sidebar))]
                  text-[rgb(var(--color-text))]
                  hover:bg-[rgb(var(--color-hover))]">
          Historial
        </a>




      </nav>

      <div class="text-center text-sm border-t border-gray-400 dark:border-gray-600 pt-3 mt-auto">
        © 2025 OpenBusiness
      </div>
  </div>

</body>
</html>