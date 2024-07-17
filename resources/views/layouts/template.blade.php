<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/home.css')
</head>

<body>
    @include('layouts.__partials.navbar', [
        'classHead' => 'z-10 absolute top-0',
        'classNav' => ' w-9/12',
    ])
    @yield('content')
    @include('layouts.__partials.footer')
</body>
@vite('resources/js/app.js')

</html>
