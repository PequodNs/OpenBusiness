@if ($paginator->hasPages())
    <nav class="flex items-center gap-4 mt-4">

        {{-- Botón Anterior --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 rounded-lg bg-gray-400 cursor-not-allowed opacity-50">
                Anterior
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="
                px-3 py-2 rounded-lg 
                bg-[rgb(var(--color-bg))] 
                text-[rgb(var(--color-text))] 
                border border-[rgb(var(--color-border))] 
                hover:opacity-80 transition
            ">
                Anterior
            </a>
        @endif

        {{-- Número de página --}}
        <span class="
            px-4 py-2 rounded-lg 
            bg-[rgb(var(--color-bg))] 
            text-[rgb(var(--color-text))]
            shadow
        ">
            Página {{ $paginator->currentPage() }} de {{ $paginator->lastPage() }}
        </span>

        {{-- Botón Siguiente --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="
                px-3 py-2 rounded-lg 
                bg-[rgb(var(--color-bg))] 
                text-[rgb(var(--color-text))] 
                border border-[rgb(var(--color-border))] 
                hover:opacity-80 transition
            ">
                Siguiente
            </a>
        @else
            <span class="px-3 py-2 rounded-lg bg-gray-400 cursor-not-allowed opacity-50">
                Siguiente
            </span>
        @endif

    </nav>
@endif