export { openDrawer };

function openDrawer(drawerId) {
    $(drawerId).removeClass("translate-x-full");
    showOverlay();
}

function closeDrawer(drawerId) {
    $(drawerId).addClass("translate-x-full");
    hideOverlay();
}

function showOverlay() {
    $("#overlay").removeClass("hidden");
}

function hideOverlay() {
    $("#overlay").addClass("hidden");
}

$("#overlay").on("click", function () {
    closeDrawer(".drawer");
    hideOverlay();
});

$(".open-drawer").on("click", function () {
    const drawer = $(this).data("drawer");
    openDrawer(drawer);
});

$(document).on("click", ".close-drawer", function () {
    const drawer = $(this).data("drawer");
    closeDrawer(drawer);
});
