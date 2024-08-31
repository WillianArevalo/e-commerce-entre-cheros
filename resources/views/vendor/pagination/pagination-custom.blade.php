@if ($paginator->hasPages())
    <nav class="flex flex-col items-start justify-between space-y-3 p-4 md:flex-row md:items-center md:space-y-0"
        aria-label="Table navigation">
        <span class="text-sm font-normal text-zinc-500 dark:text-zinc-400">
            Mostrando
            <span class="font-semibold text-zinc-900 dark:text-white">{{ $paginator->firstItem() }}</span>
            a
            <span class="font-semibold text-zinc-900 dark:text-white">{{ $paginator->lastItem() }}</span>
            de
            <span class="font-semibold text-zinc-900 dark:text-white">{{ $paginator->total() }}</span>
        </span>
        <ul class="inline-flex items-stretch -space-x-px">
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span
                        class="ml-0 flex h-full items-center justify-center rounded-l-lg border border-zinc-400 bg-white px-3 py-1.5 text-zinc-500 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="ml-0 flex h-full items-center justify-center rounded-l-lg border border-zinc-400 bg-white px-3 py-1.5 text-zinc-500 hover:bg-zinc-100 hover:text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-400 dark:hover:bg-zinc-950 dark:hover:text-white"
                        aria-label="@lang('pagination.previous')">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li aria-disabled="true"><span
                            class="flex items-center justify-center border border-zinc-400 bg-white px-3 py-2 text-sm leading-tight text-zinc-500 dark:border-zinc-800 dark:bg-black dark:text-zinc-400 dark:hover:bg-zinc-950 dark:hover:text-white">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page"><span
                                    class="text-primary-600 bg-primary-50 border-primary-300 z-10 flex items-center justify-center border px-3 py-2 text-sm leading-tight dark:border-zinc-800 dark:bg-zinc-950 dark:text-white">{{ $page }}</span>
                            </li>
                        @else
                            <li><a href="{{ $url }}"
                                    class="flex items-center justify-center border border-zinc-400 bg-white px-3 py-2 text-sm leading-tight text-zinc-500 hover:bg-zinc-100 hover:text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-400 dark:hover:bg-zinc-950 dark:hover:text-white">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="flex h-full items-center justify-center rounded-r-lg border border-zinc-400 bg-white px-3 py-1.5 leading-tight text-zinc-500 hover:bg-zinc-100 hover:text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-400 dark:hover:bg-zinc-950 dark:hover:text-white"
                        aria-label="@lang('pagination.next')">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span
                        class="flex h-full items-center justify-center rounded-r-lg border border-zinc-400 bg-white px-3 py-1.5 leading-tight text-zinc-500 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
