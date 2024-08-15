$(document).ready(function () {
    const $loader = $("#loader");

    window.addEventListener("beforeunload", function () {
        $loader.removeClass("hidden");
    });

    window.addEventListener("load", function () {
        $loader.addClass("hidden");
    });
});
