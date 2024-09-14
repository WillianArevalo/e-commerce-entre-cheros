@props(['last' => false, 'first' => false])
<th
    {{ $attributes->merge(['class' => $last ? 'px-4 py-3' : 'border-e border-zinc-400 px-4 py-3 dark:border-zinc-800']) }}>
    {{ $slot }}
</th>
