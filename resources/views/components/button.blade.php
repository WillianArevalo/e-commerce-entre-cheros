@props(['type', 'text', 'icon', 'typeButton', 'class', 'icon-align' => 'left', 'onlyIcon' => false])

@php
    if ($onlyIcon) {
        $padding = 'p-2';
    } else {
        $padding = 'px-3.5 py-2.5';
    }

    $classGeneral =
        'font-medium rounded-lg flex items-center gap-2 transition-colors text-sm transition duration-300 ' . $padding;
@endphp

@switch($typeButton)
    @case('primary')
        @php
            $classes =
                'bg-black text-white hover:bg-zinc-900 dark:bg-white dark:text-black dark:hover:bg-zinc-200 ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break

    @case('secondary')
        @php
            $classes =
                'border text-zinc-600 hover:bg-zinc-100 border-zinc-300 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900  ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break

    @case('success')
        @php
            $classes =
                'border border-green-500 border-opacity-30 text-green-500 hover:text-white hover:bg-green-500 ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break

    @case('danger')
        @php
            $classes =
                'border border-red-500 border-opacity-30 text-red-500 hover:text-white hover:bg-red-500 ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break

    @case('info')
        @php
            $classes =
                'border border-sky-500 border-opacity-30 text-sky-500 hover:text-white hover:bg-sky-500 ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break

    @default
        @php
            $classes =
                'border text-zinc-600 hover:bg-zinc-100 border-zinc-300 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900  ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break
@endswitch


@if ($type === 'a')
    @if ($iconAlign === 'left')
        <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="{{ $classes }}">
            <x-icon :icon="$icon" class="h-4 w-4 text-current" />
            {{ $text }}
        </a>
    @elseif ($iconAlign === 'right')
        <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="{{ $classes }}">
            {{ $text }}
            <x-icon :icon="$icon" class="h-4 w-4 text-current" />
        </a>
    @else
        <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="{{ $classes }}">
            {{ $text }}
        </a>
    @endif
@else
    <button type="{{ $type }}" {{ $attributes }} class="{{ $classes }}">
        <x-icon :icon="$icon" class="h-4 w-4 text-current" />
        {{ $text }}
    </button>
@endif
