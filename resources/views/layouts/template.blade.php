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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
    @include('layouts.__partials.store.toast-store', ['top' => 'top-28'])

    <div id="toast-container" class="fixed right-5 top-28 z-40 flex flex-col gap-2"></div>
    @include('layouts.__partials.store.navbar', [
        'classHead' => 'z-50 fixed top-0',
        'classNav' => ' w-9/12 mx-auto',
    ])
    @yield('content')
    @include('layouts.__partials.store.footer')
</body>


</html>
