@if ($message = Session::get('success'))
    <div id="toast-success"
        class="fixed flex items-center gap-4 justify-between w-full max-w-xs p-4  text-gray-500 bg-white rounded-lg shadow top-5 right-5 dark:text-gray-400 dark:bg-gray-800 font-secondary z-50 animate-fade-left animate-once animate-duration-300"
        role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg bg-green-500 dark:bg-green-800">
            <x-icon icon="checkmark-circle" class="w-5 h-5 text-white" />
        </div>
        <div class="ms-auto text-sm font-normal">{{ $message }}</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300  hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@elseif($message = Session::get('error'))
    <div id="toast-danger"
        class="fixed flex items-center gap-4 justify-between w-full max-w-xs p-4  text-gray-500 bg-white rounded-lg shadow top-5 right-5 dark:text-gray-400 dark:bg-gray-800 font-secondary z-50"
        role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8  rounded-lg bg-red-500 dark:bg-red-800">
            <x-icon icon="alert-circle" class="w-5 h-5 text-white" />
        </div>
        <div class="ms-auto text-sm font-normal">{{ $message }}</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300  hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@endif
