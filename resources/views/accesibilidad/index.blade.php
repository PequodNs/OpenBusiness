@extends('layouts.app')

@section('title', 'Accesibilidad')

@section('content')
<div class="max-w-5xl mx-auto mt-10
            shadow-lg rounded-xl p-6
            bg-[rgb(var(--color-bg))]
            text-[rgb(var(--color-text))]
            border border-[rgb(var(--color-hover))]">
            
    <h1 class="text-3xl font-bold mb-6">Opciones de Accesibilidad</h1>

    {{-- ======== MODO DE COLOR ======== --}}
    <div class="mb-10">
        <h2 class="text-xl font-semibold mb-3">Modo de color</h2>

        <div class="flex flex-wrap gap-4">

            {{-- Claro --}}
            <button onclick="setTheme('light')"
                class="px-4 py-2 rounded font-semibold
                       bg-[rgb(var(--color-button-bg))]
                       text-[rgb(var(--color-button-text))]
                       hover:bg-[rgb(var(--color-hover))]">
                Modo Claro
            </button>

            {{-- Oscuro --}}
            <button onclick="setTheme('dark')"
                class="px-4 py-2 rounded font-semibold
                       bg-[rgb(var(--color-button-bg))]
                       text-[rgb(var(--color-button-text))]
                       hover:bg-[rgb(var(--color-hover))]">
                Modo Oscuro
            </button>

           

            {{-- Protanopia --}}
            <button onclick="setTheme('protanopia')"
                class="px-4 py-2 rounded font-semibold
                       bg-red-500 text-white hover:bg-red-600">
                Protanopia
            </button>

            {{-- Deuteranopia --}}
            <button onclick="setTheme('deuteranopia')"
                class="px-4 py-2 rounded font-semibold
                       bg-orange-500 text-black hover:bg-orange-600">
                Deuteranopia
            </button>

            {{-- Tritanopia --}}
            <button onclick="setTheme('tritanopia')"
                class="px-4 py-2 rounded font-semibold
                       bg-blue-600 text-white hover:bg-blue-700">
                Tritanopia
            </button>

        </div>
    </div>

    {{-- ======== TAMAÑO DE LETRA ======== --}}
    <div class="mb-6">
        <label class="block font-semibold mb-2">Tamaño de Fuente</label>

        <input type="range" id="fontSlider"
            min="1" max="3" step="1"
            class="w-full cursor-pointer">

        <div class="flex justify-between text-sm mt-1">
            <span>Pequeño</span>
            <span>Medio</span>
            <span>Grande</span>
        </div>
    </div>

</div>

{{-- ======== SCRIPTS ======== --}}
<script>

    // Usa la función global setTheme definida en app.blade.php

    // Cambiar tamaño fuente
    function setFont(size) {
        document.documentElement.setAttribute("data-font", size);
        localStorage.setItem("fontSize", size);
    }

    // Cargar preferencias guardadas al cargar la página
    document.addEventListener("DOMContentLoaded", () => {
        const savedFont  = localStorage.getItem("fontSize") || "medium";
        document.documentElement.setAttribute("data-font", savedFont);
    });

    // Manejo del slider
    const slider = document.getElementById("fontSlider");
    const html = document.documentElement;

    const savedFont = localStorage.getItem("fontSize") || "medium";

    if (savedFont === "small")  slider.value = 1;
    if (savedFont === "medium") slider.value = 2;
    if (savedFont === "large")  slider.value = 3;

    function applyFont(size) {
        let fontCategory = "medium";

        if (size == 1) fontCategory = "small";
        if (size == 2) fontCategory = "medium";
        if (size == 3) fontCategory = "large";

        html.setAttribute("data-font", fontCategory);
        localStorage.setItem("fontSize", fontCategory);
    }

     function setTheme(themeName) {
        document.documentElement.setAttribute("data-theme", themeName);
        localStorage.setItem("theme", themeName);
    }

    function setFont(size) {
        document.documentElement.setAttribute("data-font", size);
        localStorage.setItem("fontSize", size);
    }

    // Para sliders RGB dinámicos
    function setCustomColor(variable, r, g, b) {
        document.documentElement.style.setProperty(variable, `${r} ${g} ${b}`);
    }

    applyFont(slider.value);

    slider.addEventListener("input", (e) => {
        applyFont(e.target.value);
    });

</script>

@endsection