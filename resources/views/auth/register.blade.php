<x-guest-layout>
    <x-authentication-card class="bg-white border border-gray-200 rounded-xl shadow-xl p-8 max-w-md mx-auto mt-20">

        <x-validation-errors class="mb-4" />

        <!-- Título -->
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">
            Registrar usuario
        </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Nombre -->
            <div>
                <x-label for="name" value="{{ __('Nombre') }}" class="text-gray-700 font-semibold" />
                <x-input id="name"
                         type="text"
                         name="name"
                         :value="old('name')"
                         required autofocus autocomplete="name"
                         class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Correo -->
            <div>
                <x-label for="email" value="{{ __('Correo') }}" class="text-gray-700 font-semibold" />
                <x-input id="email"
                         type="email"
                         name="email"
                         :value="old('email')"
                         required autocomplete="username"
                         class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Contraseña -->
            <div>
                <x-label for="password" value="{{ __('Contraseña') }}" class="text-gray-700 font-semibold" />
                <x-input id="password"
                         type="password"
                         name="password"
                         required autocomplete="new-password"
                         class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Confirmar contraseña -->
            <div>
                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" class="text-gray-700 font-semibold" />
                <x-input id="password_confirmation"
                         type="password"
                         name="password_confirmation"
                         required autocomplete="new-password"
                         class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Botón registrar -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline font-medium">
                    Ya está registrado?
                </a>

                <x-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
