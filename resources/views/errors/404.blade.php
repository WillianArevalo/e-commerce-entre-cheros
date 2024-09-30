@extends('layouts.login-template')
@section('title', 'Página no encontrada')
@section('content')
    <div class="relative">
        <!-- Contenedor con la imagen de fondo limitado a la curva del SVG -->
        <div class="absolute -top-10 left-0 z-0 h-[320px] w-full"
            style="background-image:url('{{ asset('images/fondo4.jpg') }}'); background-position:center; background-repeat:no-repeat; background-size:cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,224L24,202.7C48,181,96,139,144,128C192,117,240,139,288,128C336,117,384,75,432,74.7C480,75,528,117,576,133.3C624,149,672,139,720,144C768,149,816,171,864,170.7C912,171,960,149,1008,128C1056,107,1104,85,1152,106.7C1200,128,1248,192,1296,202.7C1344,213,1392,171,1416,149.3L1440,128L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z">
                </path>
            </svg>
        </div>

        <!-- Contenedor del contenido del 404 -->
        <section class="absolute left-0 top-0 z-10 flex h-screen w-full items-center justify-center">
            <div class="flex flex-col items-center gap-2 text-center">
                <h1 class="text-9xl font-bold text-secondary">404</h1>
                <h2 class="text-2xl font-semibold text-gray-700">Oops!</h2>
                <p class="text-gray-500">La página que buscas no existe o ha sido movida.</p>
                <x-button-store type="a" typeButton="secondary" icon="home" text="Volver al inicio"
                    href="{{ route('home') }}" class="mt-4 w-max" />
            </div>
        </section>
    </div>
@endsection
