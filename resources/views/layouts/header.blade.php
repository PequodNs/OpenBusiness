<header class="w-full 
               bg-[rgb(var(--color-sidebar))] 
               text-[rgb(var(--color-text))]
               border-b-4 border-gray-300 dark:border-gray-700
               shadow-md p-4 flex items-center justify-between
               transition-all duration-300">

  <h1 class="text-3xl font-extrabold tracking-wide">
    OpenBusiness
  </h1>

  <!-- Botón accesibilidad -->
  <button onclick="toggleTheme()"
          class="w-12 h-12 flex items-center justify-center
                 rounded-full bg-[rgb(var(--color-hover))]
                 text-[rgb(var(--color-text))]
                 shadow-md hover:scale-105
                 transition-all duration-200">

    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none" viewBox="0 0 24 24" stroke-width="2"
         stroke="currentColor" class="w-7 h-7">
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 3.5a2.5 2.5 0 110 5 2.5 2.5 0 010-5zM6 9h12m-9 3v7m6-7v7m-9-4h3m6 0h3" />
    </svg>
  </button>

</header>