$(document).ready(function () {
    const $options = $("#profile-options");

    $(".profile").on("click", function () {
        $options.toggleClass("hidden");
    });

    $(document).on("click", function (event) {
        if (
            !$(event.target).closest(".profile").length &&
            !$(event.target).closest("#profile-options").length
        ) {
            $options.addClass("hidden");
        }
    });
});
