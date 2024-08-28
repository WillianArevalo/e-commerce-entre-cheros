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
    $baseClasses = 'rounded-xl flex items-center justify-center gap-2 transition-colors  ' . $padding;
    $buttonTypes = [
        'primary' => 'bg-primary text-white uppercase hover:bg-secondary bg-gradient',
        'secondary' => 'bg-white text-zinc-600 border border-zinc-300 uppercase hover:bg-zinc-100',
        'default' => 'bg-black border border-white text-white dark:hover:bg-white dark:hover:text-black',
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
