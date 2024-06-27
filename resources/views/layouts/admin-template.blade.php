<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

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

<body class="font-secondary dark:bg-gray-900">
    @include('layouts.__partials.navbar-admin')
    @include('layouts.__partials.toast')
    <main class="bg-gray-50 dark:bg-gray-900 h-full">
        <div class="p-4 sm:ml-72">
            @include('layouts.__partials.breadcrumb')
            @yield('content')
        </div>
    </main>
</body>
@vite('resources/js/app.js')

</html>
