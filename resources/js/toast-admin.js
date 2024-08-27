export function showToast(message, type) {
    let toasCount = 0;
    const toastContainer = $("#toast-container");
    const currentToastId = `toast-admin-${toasCount++}`;
    const div = $(`<div id="${currentToastId}"></div>`);
    div.addClass(
        "z-50 flex w-full max-w-xs animate-fade-left items-center justify-between gap-4 rounded-lg bg-white p-4 font-secondary text-zinc-500 shadow animate-duration-300 animate-once dark:bg-zinc-950 dark:text-zinc-400",
    );

    let svg = "";
    if (type === "success") {
        svg = `
             <div
                class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-500 dark:bg-green-800">
                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            </div>`;
    } else if (type === "error") {
        svg = `
             <div
                class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-500 dark:bg-red-800">
                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
            </div>`;
    } else if (type === "info") {
        svg = `
            <div
                class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-blue-500 dark:bg-blue-800">
               <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            </div>`;
    }

    div.html(`
        ${svg}
        <div class="ms-auto text-sm font-normal">
        ${message}
        </div>
        <button type="button"
            class="min-w-8 -mx-1.5 -my-1.5 ms-auto inline-flex h-8 items-center justify-center rounded-lg bg-white text-zinc-400 hover:bg-zinc-100 hover:text-zinc-900 focus:ring-2 focus:ring-zinc-300 dark:bg-zinc-900 dark:text-zinc-500 dark:hover:bg-zinc-800 dark:hover:text-white"
            data-dismiss-target="#${currentToastId}" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
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
