@props(['type', 'text', 'icon', 'typeButton', 'class', 'icon-align' => 'left'])

@switch($typeButton)
    @case('primary')
        @php
            $classes =
                'text-blue-800 font-medium bg-blue-100 p-2.5 rounded flex items-center gap-2 transition-colors text-sm hover:bg-blue-200 dark:text-blue-300 dark:bg-blue-900 dark:hover:bg-blue-950 dark:bg-opacity-30 focus:ring-blue-300 focus:ring-4 dark:focus:ring-blue-800 ' .
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

    @case('secondary')
        @php
            $classes =
                'text-teal-800 font-medium bg-teal-100 p-2.5 rounded flex items-center gap-2 transition-colors text-sm hover:bg-teal-200 dark:text-teal-300 dark:bg-teal-900 dark:hover:bg-teal-950 dark:bg-opacity-30 focus:ring-teal-300 focus:ring-4 dark:focus:ring-teal-800 ' .
                $class;
        @endphp
    @break

    @case('success')
        @php
            $classes =
                'text-emerald-800 font-medium bg-emerald-100 p-2.5 rounded flex items-center gap-2 transition-colors text-sm hover:bg-emerald-200 dark:text-emerald-300 dark:bg-emerald-900 dark:bg-opacity-30 dark:hover:bg-emerald-950  focus:ring-emerald-300 focus:ring-4 dark:focus:ring-emerald-800 ' .
                $class;
        @endphp
    @break

    @case('danger')
        @php
            $classes =
                'text-red-800 font-medium bg-red-100 p-2.5 rounded flex items-center gap-2 transition-colors text-sm hover:bg-red-200 dark:text-red-300 dark:bg-red-900 dark:hover:bg-red-950 dark:bg-opacity-30 focus:ring-red-300 focus:ring-4 dark:focus:ring-red-800 ' .
                $class;
        @endphp
    @break

    @case('tertiary')
        @php
            $classes =
                'text-purple-800 font-medium bg-purple-100 p-2.5 rounded flex items-center gap-2 transition-colors text-sm hover:bg-purple-200 dark:text-purple-300 dark:bg-purple-900 dark:hover:bg-purple-950 dark:bg-opacity-30 focus:ring-purple-300 focus:ring-4 dark:focus:ring-purple-800 ' .
                $class;
        @endphp
    @break

    @default
        @php
            $classes =
                'text-blue-800 font-medium bg-blue-100 p-2.5 rounded flex items-center gap-2 transition-colors text-sm hover:bg-blue-200 dark:text-blue-300 dark:bg-blue-900 dark:hover:bg-blue-950 dark:bg-opacity-30 focus:ring-blue-300 focus:ring-4 dark:focus:ring-blue-800 ' .
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
    @endif
@else
    <button type="{{ $type }}" {{ $attributes }} class="{{ $classes }}">
        <x-icon :icon="$icon" class="w-5 h-5 text-current" />
        {{ $text }}
    </button>
@endif
