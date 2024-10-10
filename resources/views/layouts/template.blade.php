<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/imagen6.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="store">
    @include('layouts.__partials.store.navbar')
    <main>
        @include('layouts.__partials.store.toast-store', ['top' => 'top-28'])
        @include('layouts.__partials.toast-container', [
            'class' => 'left-0 right-0 sm:right-5 sm:mx-auto top-20',
        ])
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
