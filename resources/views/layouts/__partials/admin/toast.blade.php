@if (Session::has('success') || Session::has('error') || Session::has('info'))
    <div id="toast"
        class="fixed right-5 top-5 z-50 flex w-full max-w-xs animate-fade-left items-center justify-between gap-4 rounded-lg bg-white p-4 font-secondary text-zinc-500 shadow animate-duration-300 animate-once dark:bg-zinc-950 dark:text-zinc-400"
        role="alert">
        @if ($message = Session::get('success'))
            <div
                class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-500 dark:bg-green-800">
                <x-icon icon="check-circle" class="h-4 w-4 text-white" />
            </div>
        @elseif($message = Session::get('error'))
            <div
                class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-500 dark:bg-red-800">
                <x-icon icon="alert-circle" class="h-4 w-4 text-white" />
            </div>
        @elseif($message = Session::get('info'))
            <x-icon icon="information-circle" class="h-6 w-6 text-blue-600" />
        @endif
        <div class="ms-auto text-sm font-normal">{{ $message }}</div>
        <button type="button"
            class="min-w-8 -mx-1.5 -my-1.5 ms-auto inline-flex h-8 items-center justify-center rounded-lg bg-white text-zinc-400 hover:bg-zinc-100 hover:text-zinc-900 focus:ring-2 focus:ring-zinc-300 dark:bg-zinc-900 dark:text-zinc-500 dark:hover:bg-zinc-800 dark:hover:text-white"
            data-dismiss-target="#toast" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@endif
