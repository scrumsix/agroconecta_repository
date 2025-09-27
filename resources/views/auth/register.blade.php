<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - AgroConecta</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <div class="hidden lg:flex w-1/2 bg-cover bg-center relative items-center justify-center">
             <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('https://giovannibermudez.com/wp-content/uploads/2021/02/atardecer-llanero-en-la-serrania-de-la-macarena-giovanni-r.-bermudez-bohorquez-1400x788.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-green-600 to-green-800 opacity-90"></div>
            <div class="relative text-center text-white px-12">
                <h1 class="text-4xl font-bold tracking-tight">Bienvenido a AgroConecta</h1>
                <p class="mt-4 text-lg">Sembrando un futuro sostenible, una cosecha a la vez. Conectamos el campo con tu ciudad.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white p-8 sm:p-12">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <a href="/" class="text-3xl font-bold text-green-600">
                        AgroConecta
                    </a>
                    <h2 class="mt-2 text-xl text-gray-600">Crea tu cuenta</h2>
                </div>
                
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-label for="name" value="{{ __('Nombre') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="role" value="{{ __('Quiero registrarme como:') }}" />
                        <select name="role" id="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="cliente">Cliente (Comprador)</option>
                            <option value="campesino">Campesino (Vendedor)</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('login') }}">
                            {{ __('¿Ya estás registrado?') }}
                        </a>
                        <x-button class="ms-4">
                            {{ __('Registrar') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>