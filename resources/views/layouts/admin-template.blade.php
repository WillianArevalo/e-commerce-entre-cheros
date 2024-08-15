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

<body class="admin font-secondary dark:bg-black">
    @include('layouts.__partials.admin.navbar')
    <main class="h-full bg-zinc-50 dark:bg-black">
        @include('layouts.__partials.admin.toast')
        <div id="overlay" class="fixed inset-0 z-30 hidden bg-zinc-900/80 dark:bg-zinc-900/90"></div>
        <div class="mt-16 xl:ml-72">
            <div class="px-4 pt-4 xl:hidden">
                @include('layouts.__partials.admin.breadcrumb')
            </div>
            @yield('content')
        </div>
    </main>
</body>

</html>
