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
</head>

<body class="store">
    <main>
        @include('layouts.__partials.store.toast-store', ['top' => 'top-5'])
        @include('layouts.__partials.store.toast-container')
        @yield('content')
    </main>
</body>
@vite('resources/js/app.js')

</html>
