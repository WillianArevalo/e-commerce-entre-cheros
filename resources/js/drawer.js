export function showOverlay() {
    $("#overlay").removeClass("hidden");
}

export function hideOverlay() {
    $("#overlay").addClass("hidden");
}

export function closeDrawer(drawerId) {
    $(drawerId).addClass("translate-x-full");
    hideOverlay();
}
