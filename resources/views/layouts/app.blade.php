<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @if (isset($styles))
            {{ $styles }}
        @endif
    </head>
    <body class="font-sans antialiased bg-stone-100"> {{-- <-- ¡AQUÍ ESTÁ EL CAMBIO PRINCIPAL! --}}
        <x-banner />

        <div class="min-h-screen">
            @livewire('navigation-menu')

            @if (isset($header))
                <header class="bg-white shadow"> {{-- <-- También hemos estilizado la cabecera --}}
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        @if (isset($scripts))
            {{ $scripts }}
        @endif
    </body>
</html>