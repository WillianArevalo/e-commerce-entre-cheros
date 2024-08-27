<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/imagen6.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    @vite('resources/css/home.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</head>

<body class="store overflow-x-hidden">
    @include('layouts.__partials.store.navbar', [
        'classHead' => 'z-50 fixed top-0',
        'classNav' => ' w-9/12 mx-auto',
    ])
    <main>
        @include('layouts.__partials.store.toast-store', ['top' => 'top-28'])
        @include('layouts.__partials.toast-container', ['class' => 'right-5 top-20'])
        @include('layouts.__partials.store.loader')
        @yield('content')
    </main>
    @include('layouts.__partials.store.footer')
    @stack('scripts')
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>

</html>
