@props(['section' => 'head'])
<tr {{ $attributes->merge(['class' => $section === 'body' ? 'hover:bg-zinc-100 dark:hover:bg-zinc-950' : '']) }}>
    {{ $slot }}
</tr>
