<div class="flex flex-col items-start border-y bg-white px-4 py-4 dark:border-zinc-900 dark:bg-black">
    <a href="{{ $url }}"
        class="flex items-center justify-center gap-1 text-sm text-gray-500 hover:text-gray-600 hover:underline dark:text-gray-400">
        <x-icon icon="arrow-left-02" class="h-4 w-4 text-current" />
        {{ $text }}
    </a>
    <h1 class="font-secondary text-3xl font-bold text-secondary dark:text-blue-400">
        {{ $title }}
    </h1>
</div>
