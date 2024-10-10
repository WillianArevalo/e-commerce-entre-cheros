@props(['thead', 'tbody'])

<div class="w-full overflow-x-auto rounded-xl border border-zinc-400 dark:border-zinc-800">
    <table {{ $attributes->merge(['class' => 'w-full text-left text-sm text-zinc-500 dark:text-zinc-400']) }}>
        <thead class="border-b border-zinc-400 text-xs uppercase text-zinc-700 dark:border-zinc-800 dark:text-zinc-300">
            {{ $thead ?? '' }}
        </thead>
        <tbody {{ $tbody->attributes->merge([]) }}>
            {{ $tbody ?? '' }}
        </tbody>
    </table>
</div>
