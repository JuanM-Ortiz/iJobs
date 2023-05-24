<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>

            <x-input-label for="name" :value="__('Nombre Completo')" />

            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>

        <!-- Email Address -->
        <div class="mt-4">

            <x-input-label for="email" :value="__('Email')" />
            
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('¿Cual sera tu rol en iJobs?')" />
           
            <select name="rol" id="rol" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                
                <option value="">-- Selecciona un rol --</option>

                <option value="1">Desarrollador/a - Obtener Empleo</option>

                <option value="2">Reclutador/a - Publicar Empleos</option>

            </select>

            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        </div>

        <div class="flex justify-between my-5">

            <x-link :href="route('login')">
                Iniciar Sesion
            </x-link>

            <x-link :href="route('password.request')">
                Olvidaste tu Contraseña?
            </x-link>

        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Registrarse') }}
        </x-primary-button>

    </form>

</x-guest-layout>
