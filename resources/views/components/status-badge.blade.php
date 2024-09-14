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
    class="bg-{{ $color }}-100 text-{{ $color }}-500 dark:bg-{{ $color }}-900 dark:text-{{ $color }}-300 inline-block rounded-full px-2 py-1 text-xs font-semibold uppercase">
    {{ $status }}
</span>
