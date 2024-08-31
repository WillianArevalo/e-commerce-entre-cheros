  <div class="flex flex-col items-start border-y border-zinc-400 px-4 py-4 shadow-sm dark:border-zinc-800 dark:bg-black">
      <x-heading>
          {{ $title }}
      </x-heading>
      <x-paragraph>
          {{ $description ?? '' }}
      </x-paragraph>
  </div>
