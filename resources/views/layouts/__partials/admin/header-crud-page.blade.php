<div
    class="flex w-full flex-col items-start border-y border-zinc-400 bg-white px-4 py-4 dark:border-zinc-800 dark:bg-black">
    <a href="{{ $url }}"
        class="flex items-center justify-center gap-1 text-xs text-zinc-500 hover:text-zinc-600 hover:underline dark:text-zinc-400 md:text-sm">
        <x-icon icon="return" class="h-4 w-4 text-current" />
        {{ $text }}
    </a>
    <h1 class="font-secondary text-2xl font-bold text-primary-600 lg:text-3xl">
        {{ $title }}
    </h1>
</div>
