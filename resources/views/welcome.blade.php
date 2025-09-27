<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroConecta - Del Campo a tu Mesa</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    <div class="relative min-h-screen flex flex-col">
        <header class="w-full bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="text-2xl font-bold text-green-600">
                        AgroConecta
                    </div>
                    <nav>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Iniciar Sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Registrarse</a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                </div>
            </div>
        </header>

        <main class="flex-grow">
            <section class="relative h-96 flex items-center justify-center text-white">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <img src="https://incp.org.co/wp-content/uploads/2020/12/Campo.jpg" alt="Campo de cultivo" class="w-full h-full object-cover">
                <div class="relative z-10 text-center px-4">
                    <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">Del Campo a tu Mesa</h1>
                    <p class="mt-4 text-lg md:text-xl max-w-2xl mx-auto">Productos frescos y de calidad, cultivados por campesinos de nuestra región y entregados en tu puerta.</p>
                    <a href="{{ route('tienda.index') }}" class="mt-8 inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg text-lg transition duration-300">
                        Ir a la Tienda
                    </a>
                </div>
            </section>

            <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Nuestros Pilares</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
                        <div>
                            <img src="https://www.invesa.com/wp-content/uploads/2024/05/DO4B3799-scaled.jpg" alt="Productos frescos" class="w-32 h-32 mx-auto rounded-full object-cover mb-4 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-900">Directo del Campo</h3>
                            <p class="mt-2 text-gray-600">Sin intermediarios. Recibes en tu casa productos cosechados horas antes, conservando todo su sabor y nutrientes.</p>
                        </div>
                        <div>
                            <img src="https://centrors.org/wp-content/uploads/2022/06/Imagen-apoyo-3.jpeg" alt="Apoyo a campesinos" class="w-32 h-32 mx-auto rounded-full object-cover mb-4 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-900">Apoya a los Nuestros</h3>
                            <p class="mt-2 text-gray-600">Con cada compra, apoyas directamente a las familias campesinas de la región, fomentando el comercio justo y el desarrollo local.</p>
                        </div>
                        <div>
                            <img src="https://as1.ftcdn.net/jpg/01/45/99/96/1000_F_145999655_G0Efj4MGGg4PV1J8sRjHWaVMSA2Yml2s.jpg" alt="Entrega a domicilio" class="w-32 h-32 mx-auto rounded-full object-cover mb-4 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-900">Comodidad y Confianza</h3>
                            <p class="mt-2 text-gray-600">Olvídate del supermercado. Elige tus productos online y recíbelos en la puerta de tu casa, con la confianza de saber de dónde vienen.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="relative py-16 bg-gray-800 text-white">
                 <div class="absolute inset-0 bg-black opacity-60"></div>
                <img src="https://giovannibermudez.com/wp-content/uploads/2021/02/colores-magicos-de-un-atardecer-en-el-desierto-de-la-tatacoa-giovanni-r.-bermudez-bohorquez-1400x788.jpg" alt="Campo al atardecer" class="w-full h-full object-cover absolute inset-0">
                <div class="relative max-w-4xl mx-auto text-center px-4">
                    <h2 class="text-3xl font-bold">¿Eres Campesino?</h2>
                    <p class="mt-4 text-lg">Únete a nuestra comunidad y vende tus productos directamente al consumidor. Aumenta tus ingresos y comparte la riqueza del campo.</p>
                    <a href="{{ route('register') }}" class="mt-8 inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-800 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">
                        Regístrate Aquí
                    </a>
                </div>
            </section>
        </main>

        <footer class="w-full bg-gray-900 text-white py-6">
            <div class="max-w-7xl mx-auto text-center">
                <p>&copy; 2025 AgroConecta. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
</body>
</html>