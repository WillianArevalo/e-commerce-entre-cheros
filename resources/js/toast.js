export function showToast(message, type) {
    let toasCount = 0;
    const toastContainer = $("#toast-container");
    const currentToastId = `toast-success-${toasCount++}`;
    const div = $(`<div id="${currentToastId}" role="alert"></div>`);
    div.addClass(
        "flex items-center gap-4 justify-between w-auto sm:w-96 p-4 text-zinc-500 bg-white rounded-xl shadow-lg font-secondary z-50 animate-fade-left animate-once animate-duration-300",
    );

    let svg = "";
    if (type === "success") {
        svg = `
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
                <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M8 12.5L10.5 15L16 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>`;
    } else if (type === "error") {
        svg = `
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                <path d="M11.992 15H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 12L12 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>`;
    } else if (type === "info") {
        svg = `
            <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
                <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M12.2422 17V12C12.2422 11.5286 12.2422 11.2929 12.0957 11.1464C11.9493 11 11.7136 11 11.2422 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M11.992 8H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>`;
    }

    div.html(`
        <div class="inline-flex items-center justify-center flex-shrink-0">
           ${svg}
        </div>
        <div class="ms-auto text-xs sm:text-sm font-normal text-center" id="message-toast">
            ${message}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-zinc-400 hover:text-zinc-900 rounded-xl focus:ring-2 focus:ring-zinc-300  hover:bg-zinc-100 inline-flex items-center justify-center h-8 w-8"
            data-dismiss-target="#${currentToastId}" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>`);
    toastContainer.append(div);

    setTimeout(() => {
        $(`#${currentToastId}`).remove();
    }, 3000);

    $(`button[data-dismiss-target="#${currentToastId}"]`).click(function () {
        const targetId = $(this).attr("data-dismiss-target");
        $(targetId).remove();
    });
}
