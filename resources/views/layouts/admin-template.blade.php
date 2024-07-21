<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/imagen6.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    @vite('resources/css/timeline.css')
    @vite('resources/js/app.js')
    <!-- Theme switcher -->
    <script>
        (function() {
            let theme = localStorage.getItem('theme') || 'light';
            if (theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)')
                    .matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.add('light');
            }
        })();
    </script>
</head>

<body class="font-secondary dark:bg-black">
    @include('layouts.__partials.navbar-admin')
    @include('layouts.__partials.toast')
    <div id="overlay" class="bg-gray-900/80 dark:bg-zinc-900/90 fixed inset-0 z-30 hidden"></div>
    <main class="bg-gray-50 dark:bg-gray-900 h-full">
        <div class="xl:ml-72 mt-16">
            <div class="pt-4 px-4 xl:hidden">
                @include('layouts.__partials.breadcrumb')
            </div>
            @yield('content')
        </div>
    </main>
</body>

</html>
