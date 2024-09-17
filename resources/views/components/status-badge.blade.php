@switch($status)
    @case('pending')
        @php
            $color = 'yellow';
        @endphp
    @break

    @case('completed')
        @php
            $color = 'green';
        @endphp
    @break

    @case('canceled')
        @php
            $color = 'red';
        @endphp
    @break

    @default
@endswitch

<span
    class="bg-{{ $color }}-100 text-{{ $color }}-800 dark:bg-{{ $color }}-900 dark:text-{{ $color }}-300 w-max rounded-full px-2.5 py-0.5 text-xs font-medium dark:bg-opacity-20">
    {{ ucfirst($status) }}
</span>
