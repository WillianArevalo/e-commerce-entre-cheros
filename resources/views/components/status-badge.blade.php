@props(['status', 'color' => 'gray', 'size' => 'small'])

@php
    $colorMap = [
        'pending' => 'yellow',
        'high' => 'yellow',
        'open' => 'blue',
        'sent' => 'blue',
        'refunded' => 'blue',
        'completed' => 'green',
        'resolved' => 'green',
        'paid' => 'green',
        'closed' => 'red',
        'canceled' => 'red',
        'urgent' => 'red',
        'reopened' => 'orange',
        'low' => 'zinc',
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
    class="bg-{{ $color }}-100 text-{{ $color }}-800 dark:bg-{{ $color }}-900 dark:text-{{ $color }}-300 {{ $sizeClass }} w-max rounded-full font-medium dark:bg-opacity-20">
    {{ ucfirst($status) }}
</span>
