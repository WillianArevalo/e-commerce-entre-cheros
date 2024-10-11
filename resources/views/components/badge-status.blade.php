@props(['status', 'color' => 'gray', 'size' => 'small'])

@php
    $colorMap = [
        1 => 'green',
        2 => 'yellow',
        0 => 'red',
    ];

    $textMap = [
        1 => 'Active',
        2 => 'Pending',
        0 => 'Inactive',
    ];

    $color = $colorMap[$status] ?? 'zinc';

    $sizeClasses = [
        'small' => 'px-2 py-0.5 text-xs',
        'medium' => 'px-3 py-1 text-sm',
        'large' => 'px-4 py-1.5 text-base',
    ];

    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['small'];
@endphp

<span
    class="bg-{{ $color }}-100 text-{{ $color }}-800 dark:bg-{{ $color }}-900 dark:text-{{ $color }}-300 {{ $sizeClass }} text-nowrap w-max rounded-full font-medium dark:bg-opacity-20">
    {{ $textMap[$status] }}
</span>
