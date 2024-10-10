<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/imagen6.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script>
        (function() {
            let theme = localStorage.getItem('theme') || '{{ App\Enums\Theme::LIGHT }}';
            let color = localStorage.getItem('color') || 'blue';
            let color_rgba = localStorage.getItem('color_rgba') || 'rgba(59, 130, 246, 1)';
            let color_rgba_20 = localStorage.getItem('color_rgba_20') || 'rgba(59, 130, 246, 0.2)';

            if (theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                        '(prefers-color-scheme: dark)')
                    .matches)) {
                document.documentElement.classList.add('{{ App\Enums\Theme::DARK }}');

            } else {
                document.documentElement.classList.add('{{ App\Enums\Theme::LIGHT }}');
            }

            setProperty('--primary-color-rgba', color_rgba);
            setProperty('--primary-color-rgba-20', color_rgba_20);

            function setProperty(name, value) {
                document.documentElement.style.setProperty(name, value);
            }

            changeColor(color);

            function changeColor(color) {
                const colorMap = {
                    blue: {
                        DEFAULT: "#3b82f6",
                        50: "#eff6ff",
                        100: "#dbeafe",
                        200: "#bfdbfe",
                        300: "#93c5fd",
                        400: "#60a5fa",
                        500: "#3b82f6",
                        600: "#2563eb",
                        700: "#1d4ed8",
                        800: "#1e40af",
                        900: "#1e3a8a",
                        950: "#0d1e3e",
                    },
                    red: {
                        DEFAULT: "#ef4444",
                        50: "#fef2f2",
                        100: "#fee2e2",
                        200: "#fecaca",
                        300: "#fca5a5",
                        400: "#f87171",
                        500: "#ef4444",
                        600: "#dc2626",
                        700: "#b91c1c",
                        800: "#991b1b",
                        900: "#7f1d1d",
                        950: "#450a0a",
                    },
                    purple: {
                        DEFAULT: "#8b5cf6",
                        50: "#f5f3ff",
                        100: "#ede9fe",
                        200: "#ddd6fe",
                        300: "#c4b5fd",
                        400: "#a78bfa",
                        500: "#8b5cf6",
                        600: "#7c3aed",
                        700: "#6d28d9",
                        800: "#5b21b6",
                        900: "#4c1d95",
                        950: "#2d0a4e",
                    },
                    orange: {
                        DEFAULT: "#f97316",
                        50: "#fff7ed",
                        100: "#ffedd5",
                        200: "#fed7aa",
                        300: "#fdba74",
                        400: "#fb923c",
                        500: "#f97316",
                        600: "#ea580c",
                        700: "#c2410c",
                        800: "#9a3412",
                        900: "#7c2d12",
                        950: "#3d1308",
                    },
                    yellow: {
                        DEFAULT: "#eab308",
                        50: "#fefce8",
                        100: "#fef9c3",
                        200: "#fef08a",
                        300: "#fde047",
                        400: "#facc15",
                        500: "#eab308",
                        600: "#ca8a04",
                        700: "#a16207",
                        800: "#854d0e",
                        900: "#713f12",
                        950: "#45200a",
                    },
                    green: {
                        DEFAULT: "#10b981",
                        50: "#f0fdf4",
                        100: "#dcfce7",
                        200: "#bbf7d0",
                        300: "#86efac",
                        400: "#4ade80",
                        500: "#22c55e",
                        600: "#16a34a",
                        700: "#15803d",
                        800: "#166534",
                        900: "#14532d",
                        950: "#0d332f",
                    },
                    pink: {
                        DEFAULT: "#ec4899",
                        50: "#fdf2f8",
                        100: "#fce7f3",
                        200: "#fbcfe8",
                        300: "#f9a8d4",
                        400: "#f472b6",
                        500: "#ec4899",
                        600: "#db2777",
                        700: "#be185d",
                        800: "#9d174d",
                        900: "#831843",
                        950: "#4e0d3a",
                    },
                };
                const selectedColor = colorMap[color];
                localStorage.setItem("color", color);
                if (selectedColor) {
                    for (const [shade, value] of Object.entries(selectedColor)) {
                        document.documentElement.style.setProperty(
                            `--primary-color-${shade}`,
                            value,
                        );
                    }
                }
            }

        })();
    </script>
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
