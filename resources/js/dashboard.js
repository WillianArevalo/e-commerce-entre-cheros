$(document).ready(function () {
    $(".show-options").on("click", function () {
        $(".options").addClass("hidden");
        $(this).next().toggleClass("hidden");
    });

    $(document).on("click", function (event) {
        if (!$(event.target).closest(".show-options").length) {
            $(".options").addClass("hidden");
        }
    });
});
