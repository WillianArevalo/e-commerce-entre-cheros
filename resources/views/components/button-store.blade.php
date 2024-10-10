@props([
    'type' => 'button',
    'text' => '',
    'icon' => null,
    'typeButton' => 'default',
    'class' => '',
    'iconAlign' => 'left',
    'onlyIcon' => false,
    'size' => 'normal',
    'loading' => false, // Añadido para el estado de carga
])

@php
    // Definir las clases según el tamaño
    $sizes = [
        'small' => [
            'padding' => 'px-3 py-2',
            'text' => 'text-xs',
            'icon' => 'h-4 w-4',
        ],
        'normal' => [
            'padding' => 'px-4 py-3',
            'text' => 'text-sm sm:text-base',
            'icon' => 'h-5 w-5 sm:h-6 sm:w-6',
        ],
        'large' => [
            'padding' => 'px-5 py-4',
            'text' => 'text-lg',
            'icon' => 'h-6 w-6',
        ],
    ];

    // Establecer el padding dependiendo de si es solo ícono o no
    $padding = $onlyIcon ? 'p-2' : $sizes[$size]['padding'];

    // Clases base
    $baseClasses = 'rounded-xl flex items-center justify-center gap-2 transition-colors duration-300 ' . $padding;

    // Tipos de botones (estilos únicos para la tienda)
    $buttonTypes = [
        'primary' => 'bg-primary text-white hover:bg-secondary bg-gradient',
        'secondary' => 'bg-white text-zinc-600 border border-zinc-300 hover:bg-zinc-100',
        'danger' => 'bg-red-500 text-white hover:bg-red-600',
        'warning' => 'bg-yellow-500 text-white hover:bg-yellow-600',
        'success' => 'bg-green-100 text-green-500 hover:bg-green-600 hover:text-white',
        'default' => 'bg-white text-zinc-600 border border-zinc-400 hover:bg-zinc-100',
    ];

    // Clases finales para el botón
    $classes = $buttonTypes[$typeButton] . ' ' . $baseClasses . ' ' . $class;

    // Estado de carga: cuando está cargando, añadimos opacidad
    $loadingClasses = $loading ? 'opacity-75 cursor-not-allowed' : '';
    $classes .= ' ' . $loadingClasses;
@endphp

@if ($type === 'a')
    <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="{{ $classes }}">
        @if ($loading)
            <!-- Spinner para estado de carga -->
            <x-icon-store icon="spinner" class="{{ $sizes[$size]['icon'] }} animate-spin text-white" />
        @else
            @if ($iconAlign === 'left' && !$onlyIcon)
                <x-icon-store :icon="$icon" class="{{ $sizes[$size]['icon'] }} text-current" />
            @endif
            @if (!$onlyIcon)
                <span class="{{ $sizes[$size]['text'] }}">{{ $text }}</span>
            @endif
            @if ($iconAlign === 'right' && !$onlyIcon)
                <x-icon-store :icon="$icon" class="{{ $sizes[$size]['icon'] }} text-current" />
            @endif
            @if ($onlyIcon)
                <x-icon-store :icon="$icon" class="{{ $sizes[$size]['icon'] }} text-current" />
            @endif
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes }} class="{{ $classes }}"
        @if ($loading) disabled @endif>
        @if ($loading)
            <!-- Spinner para estado de carga -->
            <x-icon-store icon="spinner" class="{{ $sizes[$size]['icon'] }} animate-spin text-white" />
        @else
            @if ($iconAlign === 'left' && !$onlyIcon)
                <x-icon-store :icon="$icon" class="{{ $sizes[$size]['icon'] }} text-current" />
            @endif
            @if (!$onlyIcon)
                <span class="{{ $sizes[$size]['text'] }}">{{ $text }}</span>
            @endif
            @if ($iconAlign === 'right' && !$onlyIcon)
                <x-icon-store :icon="$icon" class="{{ $sizes[$size]['icon'] }} text-current" />
            @endif
            @if ($onlyIcon)
                <x-icon-store :icon="$icon" class="{{ $sizes[$size]['icon'] }} text-current" />
            @endif
        @endif
    </button>
@endif
