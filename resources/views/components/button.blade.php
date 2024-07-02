@props(['type', 'text', 'icon', 'typeButton', 'class'])

@switch($typeButton)
    @case('primary')
        @php
            $classes =
                'text-white font-medium bg-blue-600 p-2.5 rounded-lg flex items-center gap-2 hover:bg-blue-800 transition-colors text-sm ' .
                $class;
        @endphp
    @break

    @case('secondary')
        @php
            $classes =
                'text-gray-900 font-medium bg-gray-200 p-2.5 rounded-lg flex items-center gap-2 hover:bg-gray-300 transition-colors text-sm ' .
                $class;
        @endphp
    @break

    @case('success')
        @php
            $classes =
                'text-white font-medium bg-green-600 p-2.5 rounded-lg flex items-center gap-2 hover:bg-green-800
        transition-colors text-sm ' . $class;
        @endphp
    @break

    @case('danger')
        @php
            $classes =
                'text-white font-medium bg-red-600 p-2.5 rounded-lg flex items-center gap-2 hover:bg-red-800 transition-colors text-sm ' .
                $class;
        @endphp
    @break

    @default
        @php
            $classes =
                'text-white font-medium bg-blue-600 p-2.5 rounded-lg flex items-center gap-2 hover:bg-blue-800 transition-colors text-sm' .
                $class;
        @endphp
    @break
@endswitch


@if ($type === 'a')
    <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="{{ $classes }}">
        <x-icon :icon="$icon" class="w-5 h-5 text-current" />
        {{ $text }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes }} class="{{ $classes }}">
        <x-icon :icon="$icon" class="w-5 h-5 text-current" />
        {{ $text }}
    </button>
@endif
