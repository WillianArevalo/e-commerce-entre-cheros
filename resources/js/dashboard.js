$(document).ready(function () {
    $(".show-options").on("click", function (event) {
        event.stopPropagation();
        var target = $(this).data("target");
        var options = $(target);
        $(".options").not(options).addClass("hidden");
        options.toggleClass("hidden");
    });

    $(".show-submenu").on("click", function (event) {
        event.stopPropagation();
        var target = $(this).data("target");
        var submenu = $(target);
        $(".submenu").not(submenu).addClass("hidden");
        submenu.toggleClass("hidden");
    });

    $(document).on("click", function () {
        $(".options, .submenu").addClass("hidden");
    });

    $(".options, .submenu").on("click", function (event) {
        event.stopPropagation();
    });
});
