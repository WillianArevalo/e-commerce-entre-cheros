$(document).ready(function () {
    $(".show-options").on("click", function (event) {
        event.stopPropagation();
        var options = $(this).next(".options");
        $(".options").not(options).addClass("hidden");
        options.toggleClass("hidden");
    });

    $(document).on("click", function () {
        $(".options").addClass("hidden");
    });
});
