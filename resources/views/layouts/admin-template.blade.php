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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    @include('layouts.__partials.toast-container', ['class' => 'right-5 top-5'])
    <main class="h-full bg-zinc-50 dark:bg-black">
        @include('layouts.__partials.admin.toast')
        <div id="overlay" class="fixed inset-0 z-30 hidden bg-zinc-900/80 dark:bg-zinc-900/90"></div>
        <div class="mt-16 xl:ml-72">
            <div class="px-4 pt-4 xl:hidden">
                @include('layouts.__partials.admin.breadcrumb')
            </div>
            @yield('content')
            <x-cookie />
        </div>
    </main>
</body>

<div class="dark:bg-opacity-65 fixed inset-0 z-30 hidden bg-zinc-900 dark:bg-zinc-900" id="modal-search">
    <!-- Modal search -->
    <div class="mt-20 flex h-screen justify-center">
        <div class="h-max w-full max-w-lg animate-jump-in overflow-hidden rounded-lg bg-white animate-duration-300 animate-once dark:bg-black"
            id="content-modal-search">
            <div class="flex items-center border-b border-zinc-400 dark:border-zinc-800">
                <div class="flex w-full items-center px-4 py-1">
                    <x-icon icon="search" class="h-5 w-5 text-zinc-500 dark:text-zinc-400" />
                    <input type="text"
                        class="ml-2 w-full border-none bg-transparent text-sm text-zinc-900 focus:border-none focus:outline-none focus:ring-0 dark:text-white dark:placeholder-zinc-400"
                        placeholder="Buscar..." />
                </div>
            </div>
            <div>
                <div class="bg-black text-zinc-900 dark:text-white">
                    <div class="p-4">
                        <!-- Recent Searches -->
                        <h3 class="text-xs uppercase text-zinc-400 dark:text-zinc-500">Recent Searches</h3>
                        <ul class="mt-2 space-y-2 text-sm text-zinc-500 dark:text-zinc-300">
                            <li class="flex items-center">
                                <x-icon icon="search-list" class="mr-2 h-4 w-4 text-gray-500" />
                                <span>Form Builder - 23 hours on-demand video</span>
                            </li>
                            <li class="flex items-center">
                                <x-icon icon="search-list" class="mr-2 h-4 w-4 text-gray-500" />
                                <span>Access Mosaic on mobile and TV</span>
                            </li>
                            <!-- Add more items as needed -->
                        </ul>
                    </div>
                    <div class="border-t border-zinc-400 p-4 dark:border-zinc-800">
                        <h3 class="text-xs uppercase text-zinc-400 dark:text-zinc-500">Recent Pages</h3>
                        <ul class="mt-2 space-y-2 text-sm text-zinc-500 dark:text-zinc-300">
                            <li class="flex items-center">
                                <x-icon icon="app-window" class="mr-2 h-4 w-4 text-gray-500" />
                                <span>Messages - Conversation / Mike Mills</span>
                            </li>
                            <li class="flex items-center">
                                <x-icon icon="app-window" class="mr-2 h-4 w-4 text-gray-500" />
                                <span>Messages - Conversation / Eva Patrick</span>
                            </li>
                            <!-- Add more items as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
