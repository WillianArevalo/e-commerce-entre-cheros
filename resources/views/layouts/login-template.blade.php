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
        @if (Route::is('admin.login'))
            @include('layouts.__partials.admin.toast')
        @else
            @include('layouts.__partials.store.toast-store', ['top' => 'top-5'])
        @endif
        @include('layouts.__partials.toast-container', ['class' => 'right-5 top-10'])
        @yield('content')
    </main>
</body>
@vite('resources/js/app.js')

</html>
