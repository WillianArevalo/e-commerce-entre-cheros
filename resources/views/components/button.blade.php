@props(['type', 'text', 'icon', 'typeButton', 'class', 'icon-align' => 'left', 'onlyIcon' => false])

@php
    if ($onlyIcon) {
        $padding = 'p-2';
    } else {
        $padding = 'px-3.5 py-2.5';
    }

    $classGeneral = 'font-medium rounded flex items-center gap-2 transition-colors text-sm ' . $padding;
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
                'border-2 text-zinc-600 hover:bg-zinc-100 border-zinc-300 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900  ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break

    @case('success')
        @php
            $classes =
                'border-2 border-green-500 text-green-500 hover:text-white hover:bg-green-500 dark:bg-green-800 dark:hover:bg-green-900 dark:text-white ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break

    @case('danger')
        @php
            $classes =
                'border-2 border-red-500 text-red-500 hover:text-white hover:bg-red-500 dark:bg-red-800 dark:hover:bg-red-900 dark:text-white  ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break

    @case('info')
        @php
            $classes = 'border-2 border-sky-500 text-white bg-sky-800 border-sky-500 ' . $classGeneral . ' ' . $class;
        @endphp
    @break

    @case('info')
        @php
            $classes =
                'border-2 border-sky-500 text-sky-500 hover:bg-sky-800 hover:text-white hover:border-sky-500 ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break

    @case('store-gradient')
        @php
            $classes =
                'rounded-full bg-primary px-5 py-3 w-max font-secondary text-white uppercase font-medium  hover:bg-secondary bg-gradient flex items-center justify-center gap-2 ' .
                $class;
        @endphp
    @break

    @case('store-secondary')
        @php
            $classes =
                'rounded-full bg-primary px-5 py-3 w-max font-secondary text-zinc-600 uppercase font-normal bg-white border border-zinc-300 flex items-center justify-center gap-2 hover:bg-zinc-100 ' .
                $class;
        @endphp
    @break

    @default
        @php
            $classes =
                'bg-black border border-white dark:text-white dark:hover:bg-white dark:hover:text-black  ' .
                $classGeneral .
                ' ' .
                $class;
        @endphp
    @break
@endswitch


@if ($type === 'a')
    @if ($iconAlign === 'left')
        <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="{{ $classes }}">
            <x-icon :icon="$icon" class="w-5 h-5 text-current" />
            {{ $text }}
        </a>
    @elseif ($iconAlign === 'right')
        <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="{{ $classes }}">
            {{ $text }}
            <x-icon :icon="$icon" class="w-5 h-5 text-current" />
        </a>
    @else
        <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="{{ $classes }}">
            {{ $text }}
        </a>
    @endif
@else
    <button type="{{ $type }}" {{ $attributes }} class="{{ $classes }}">
        <x-icon :icon="$icon" class="w-5 h-5 text-current" />
        {{ $text }}
    </button>
@endif
