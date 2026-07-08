<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Cabeçalho do formulário -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-[#1F3D55]">
                Bem-vindo!
            </h2>

            <p class="mt-2 text-gray-500">

                Informe seu e-mail e senha para continuar
            </p>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-6">

            <x-primary-button class="w-full justify-center">
                Entrar
            </x-primary-button>

        </div>

        <div class="mt-8 text-center text-sm">
            <span class="text-gray-500">
                Primeiro acesso?
            </span>

            <a href="{{ route('escolher-perfil') }}"
                class="ml-1 font-semibold text-[#1F3D55] hover:text-[#A90000] transition duration-200">
                Cadastre-se
            </a>
        </div>
    </form>
</x-guest-layout>
