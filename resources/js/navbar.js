$(document).ready(function () {
    const $options = $("#profile-options");
    const $optionsAdmin = $("#dropdown-user");

    $(".profile, #profile-admin").on("click", function () {
        $options.toggleClass("hidden");
        $optionsAdmin.toggleClass("hidden");
    });

    $(document).on("click", function (event) {
        if (
            !$(event.target).closest(".profile").length &&
            !$(event.target).closest("#profile-options").length
        ) {
            $options.addClass("hidden");
        }
    });

    $(document).on("click", function (event) {
        if (
            !$(event.target).closest("#profile-admin").length &&
            !$(event.target).closest("#dropdown-user").length
        ) {
            $optionsAdmin.addClass("hidden");
        }
    });

    $("#search-toggle").on("click", function () {
        $("#modal-search").toggleClass("hidden");
    });

    $(document).on("click", function (event) {
        if (
            !$(event.target).closest("#content-modal-search").length &&
            !$(event.target).closest("#search-toggle").length
        ) {
            $("#modal-search").addClass("hidden");
        }
    });

    $("#btn-sidebar-toggle").on("click", function () {
        $("#overlay").toggleClass("hidden");
        $("#sidebar").toggleClass("transform-none");
        $("#sidebar").toggleClass("-translate-x-full");
    });

    $("#overlay").on("click", function () {
        $("#overlay").addClass("hidden");
        $("#sidebar")
            .removeClass("transform-none")
            .addClass("-translate-x-full");
    });

    $("#btn-hamburger").on("click", function () {
        $("#mobile-menu").toggleClass("active");
    });
});
