export { openDrawer, closeDrawer, showOverlay, hideOverlay };

function openDrawer(drawerId) {
    $(drawerId).removeClass("translate-x-full");
    $("body").addClass("overflow-hidden");
    showOverlay();
}

function closeDrawer(drawerId) {
    $(drawerId).addClass("translate-x-full");
    $("body").removeClass("overflow-hidden");
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
