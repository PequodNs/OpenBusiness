<header class="w-full 
               bg-[rgb(var(--color-header))] 
               text-[rgb(var(--color-text))]
               border-b-4 border-gray-300 dark:border-gray-700
               shadow-md p-4 flex items-center justify-between
               transition-all duration-300">

  <h1 class="text-3xl font-extrabold tracking-wide">
    OpenBusiness
  </h1>

  <div class="flex items-center gap-4">

  
          <!-- Botón accesibilidad -->
      <a href="{{ route('accesibilidad') }}"
    class="w-12 h-12 flex items-center justify-center
            rounded-full bg-[rgb(var(--color-hover))]
            text-[rgb(var(--color-text))]
            shadow-md hover:scale-150 
            transition-all duration-200
            focus:outline-none"> 
    
    <img src="/images/accesibility-icon.png" 
        alt="Accesibilidad" 
        class="w-7 h-7 
               hover:scale-125 hover:rotate-6 
               transition-all duration-200" /> 
</a>

    <!-- Botón salir compacto (header) -->
    <form method="POST" action="{{ route('logout') }}">
      @csrf

      <button type="submit"
              class="w-12 h-12 flex items-center justify-center
                     rounded-full bg-red-500 
                     text-white shadow-md 
                     hover:bg-red-600 hover:scale-105
                     transition-all duration-200">

        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none" viewBox="0 0 24 24"
             stroke-width="2" stroke="currentColor"
             class="w-7 h-7">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M9 12h12m0 0l-3-3m3 3l-3 3" />
        </svg>

      </button>
    </form>

  </div>

</header>