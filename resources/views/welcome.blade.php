<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroConecta - 100% Orgullo Colombiano</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            color: #333;
        }
        .hero-section {
            background-image: url('https://th.bing.com/th/id/R.59fc702b64129a2a1d0c02dad89a3f82?rik=%2fP8FVMWe2vYeUw&pid=ImgRaw&r=0'); /* Un hermoso paisaje colombiano */
            background-size: cover;
            background-position: center;
            position: relative;
            min-height: 85vh; /* Más alto para mayor impacto */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 2rem;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.4) 50%, rgba(0, 0, 0, 0.2) 100%); /* Degradado más sutil */
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
        }
        .feature-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 6rem;
            width: 6rem;
            border-radius: 50%;
            background-color: #d1fae5; /* Verde muy claro */
            color: #10b981; /* Verde esmeralda */
            margin: 0 auto 1.5rem auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .testimonial-card {
            background-color: #f0fdf4; /* Verde muy claro para testimonios */
            border-left: 5px solid #10b981; /* Borde verde esmeralda */
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .call-to-action {
            background-image: url('https://images.unsplash.com/photo-1627964402660-f20300edc606?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); /* Imagen de café o cultivos */
            background-size: cover;
            background-position: center;
            position: relative;
            padding: 8rem 0;
            color: white;
            text-align: center;
        }
        .call-to-action::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 128, 0, 0.7); /* Capa verde más oscura */
            z-index: 1;
        }
        .call-to-action-content {
            position: relative;
            z-index: 2;
        }
        .proud-colombian {
            background-color: #10b981; /* Verde esmeralda */
            padding: 3rem 0;
            text-align: center;
            color: white;
            font-family: 'Merriweather', serif; /* Fuente más clásica */
        }
        .proud-colombian h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .proud-colombian p {
            font-size: 1.25rem;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="antialiased bg-white text-gray-800">
    <div class="flex flex-col min-h-screen">
        <header class="w-full bg-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="text-3xl font-extrabold text-green-700">
                        <a href="/">AgroConecta</a>
                    </div>
                    <nav class="hidden md:flex items-center space-x-6">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-700 hover:text-green-700 transition duration-200">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-gray-700 hover:text-green-700 transition duration-200">Iniciar Sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white bg-green-600 hover:bg-green-700 py-2 px-5 rounded-full transition duration-200 shadow-md">Registrarse</a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                </div>
            </div>
        </header>

        <main class="flex-grow">
            <section class="hero-section">
                <div class="hero-overlay"></div>
                <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="text-5xl md:text-7xl font-black leading-tight drop-shadow-xl animate-fade-in-up">
                        De la Tierra Colombiana a tu Mesa
                    </h1>
                    <p class="mt-6 text-lg md:text-xl max-w-4xl mx-auto font-light drop-shadow-lg animate-fade-in delay-500">
                        Conecta con la frescura, calidad y el sabor auténtico de los productos cultivados por manos de nuestros campesinos.
                    </p>
                    <a href="{{ route('tienda.index') }}" class="mt-10 inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-4 px-10 rounded-full text-xl transition duration-300 shadow-xl transform hover:scale-105 animate-pop-in delay-1000">
                        Explorar Productos Colombianos
                    </a>
                </div>
            </section>

            <section id="valores" class="py-20 bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16" data-aos="fade-up">
                        <h2 class="text-4xl font-extrabold text-gray-900">¿Por qué Elegir AgroConecta?</h2>
                        <p class="mt-4 text-xl text-gray-600">Nuestros valores nos conectan con la esencia de Colombia.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                        <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-icon text-5xl">🌱</div>
                            <h3 class="text-2xl font-bold text-gray-900 mt-4">Frescura Garantizada</h3>
                            <p class="mt-3 text-lg text-gray-700 text-center">Productos recolectados y entregados en su punto óptimo de frescura, directo de la huerta a tu cocina.</p>
                        </div>
                        <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-icon text-5xl">🇨🇴</div>
                            <h3 class="text-2xl font-bold text-gray-900 mt-4">Apoyo al Campesino</h3>
                            <p class="mt-3 text-lg text-gray-700 text-center">Con cada compra, impulsas la economía local y la dignidad del trabajo de nuestros agricultores.</p>
                        </div>
                        <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-icon text-5xl">🏡</div>
                            <h3 class="text-2xl font-bold text-gray-900 mt-4">Comodidad a tu Puerta</h3>
                            <p class="mt-3 text-lg text-gray-700 text-center">Olvídate de las filas. Tu pedido llega rápido y seguro, llevando el campo hasta la comodidad de tu hogar.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-20 bg-green-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                     <div class="text-center mb-16" data-aos="fade-up">
                        <h2 class="text-4xl font-extrabold text-gray-900">Nuestras Raíces, Su Confianza</h2>
                        <p class="mt-4 text-xl text-gray-600">La voz de quienes ya viven la experiencia AgroConecta.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                         <div class="testimonial-card" data-aos="fade-right" data-aos-delay="100">
                             <p class="italic text-gray-800 text-lg">"La calidad de los productos de AgroConecta es inigualable. ¡Se siente el sabor del campo en cada bocado! Además, el apoyo a nuestros campesinos es fundamental."</p>
                             <p class="mt-6 font-bold text-gray-900 text-lg">- Ana María P., Cliente Feliz</p>
                         </div>
                         <div class="testimonial-card" data-aos="fade-left" data-aos-delay="200">
                             <p class="italic text-gray-800 text-lg">"Como campesino, AgroConecta ha sido una bendición. Mi trabajo es valorado y mis productos llegan a más hogares. ¡Orgulloso de ser parte de esta comunidad!"</p>
                             <p class="mt-6 font-bold text-gray-900 text-lg">- Don José G., Campesino Aliado</p>
                         </div>
                    </div>
                </div>
            </section>

            <section class="call-to-action">
                <div class="call-to-action-content" data-aos="zoom-in" data-aos-duration="1000">
                    <h2 class="text-4xl md:text-5xl font-extrabold drop-shadow-lg">¡Únete a la Cosecha Digital!</h2>
                    <p class="mt-6 text-xl md:text-2xl max-w-3xl mx-auto font-light drop-shadow-md">
                        Descubre la riqueza de Colombia en cada producto. Haz tu pedido hoy mismo y vive la experiencia.
                    </p>
                    <a href="{{ route('tienda.index') }}" class="mt-10 inline-block bg-white hover:bg-gray-100 text-green-700 font-bold py-4 px-10 rounded-full text-xl transition duration-300 shadow-xl transform hover:scale-105">
                        Ir a la Tienda Ahora
                    </a>
                </div>
            </section>
        </main>

        <footer class="w-full bg-gray-900 text-white py-10">
            <div class="max-w-7xl mx-auto text-center px-4">
                <p class="text-lg">&copy; {{ date('Y') }} AgroConecta. Todos los derechos reservados.</p>
                <div class="mt-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg" alt="Bandera de Colombia" class="h-8 inline-block mr-2 shadow-lg rounded">
                    <span class="text-2xl font-bold text-yellow-400">100% </span><span class="text-2xl font-bold text-blue-500">Orgullosos </span><span class="text-2xl font-bold text-red-500">Colombianos</span>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, 
            once: true, 
            mirror: false, 
        });
    </script>
</body>
</html>