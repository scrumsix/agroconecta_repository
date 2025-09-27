<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - AgroConecta</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <div class="hidden lg:flex w-1/2 bg-cover bg-center relative items-center justify-center">
             <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('https://giovannibermudez.com/wp-content/uploads/2021/02/atardecer-en-el-camping-el-cairo-en-el-municipio-de-nimaima-giovanni-r.-bermudez-bohorquez-1400x788.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-green-600 to-green-800 opacity-90"></div>
            <div class="relative text-center text-white px-12">
                <h1 class="text-4xl font-bold tracking-tight">Bienvenido de Nuevo</h1>
                <p class="mt-4 text-lg">Los sabores frescos del campo te esperan. Ingresa a tu cuenta para continuar.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white p-8 sm:p-12">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <a href="/" class="text-3xl font-bold text-green-600">
                        AgroConecta
                    </a>
                    <h2 class="mt-2 text-xl text-gray-600">Ingresa a tu cuenta</h2>
                </div>
                
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif

                        <x-button class="ms-4">
                            {{ __('Iniciar Sesión') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>