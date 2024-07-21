@if ($message = Session::get('success'))
    <div id="toast-success"
        class="fixed flex items-center gap-4 justify-between w-96 p-4 text-gray-500 bg-white rounded-full shadow {{ $top }} right-5 font-secondary z-50 animate-fade-left animate-once animate-duration-300"
        role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0">
            <x-icon icon="checkmark-circle" class="w-6 h-6 text-green-600" />
        </div>
        <div class="ms-auto text-sm font-normal">
            {{ $message }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-full focus:ring-2 focus:ring-gray-300  hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
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
    <div id="toast-error"
        class="fixed flex items-center gap-4 justify-between w-96 p-4 text-gray-500 bg-white rounded-full shadow {{ $top }} right-5 font-secondary z-50 animate-fade-left animate-once animate-duration-300"
        role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0">
            <x-icon icon="alert-circle" class="w-6 h-6 text-red-600" />
        </div>
        <div class="ms-auto text-sm font-normal">
            {{ $message }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-full focus:ring-2 focus:ring-gray-300  hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
            data-dismiss-target="#toast-error" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@endif
