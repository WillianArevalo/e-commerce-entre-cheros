@props([
    'type' => 'button',
    'text' => '',
    'icon' => null,
    'typeButton' => 'default',
    'class' => '',
    'iconAlign' => 'left',
    'onlyIcon' => false,
])

@php
    $padding = $onlyIcon ? 'p-2' : 'px-4 py-3';
    $baseClasses = 'rounded-full flex items-center justify-center gap-2 transition-colors duration-300  ' . $padding;
    $buttonTypes = [
        'primary' => 'bg-primary text-white hover:bg-secondary bg-gradient',
        'secondary' => 'bg-white text-zinc-600 border border-zinc-400 hover:bg-zinc-100',
        'danger' => 'bg-red-500 text-white hover:bg-red-600',
        'warning' => 'bg-yellow-500 text-white hover:bg-yellow-600',
        'success' => 'bg-green-500 text-white hover:bg-green-600',
        'default' => 'bg-white text-zinc-600 border border-zinc-400 hover:bg-zinc-100',
    ];
    $classes = $buttonTypes[$typeButton] . ' ' . $baseClasses . ' ' . $class;
@endphp

@if ($type === 'a')
    <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="{{ $classes }}">
        @if ($icon && $iconAlign === 'left')
            <x-icon-store :icon="$icon" class="h-5 w-5 text-current" />
        @endif
        {{ $text }}
        @if ($icon && $iconAlign === 'right')
            <x-icon-store :icon="$icon" class="h-5 w-5 text-current" />
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes }} class="{{ $classes }}">
        @if ($icon && $iconAlign === 'left')
            <x-icon-store :icon="$icon" class="h-5 w-5 text-current" />
        @endif
        {{ $text }}
        @if ($icon && $iconAlign === 'right')
            <x-icon-store :icon="$icon" class="h-5 w-5 text-current" />
        @endif
    </button>
@endif
