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

    $(".change-status-order").on("click", function () {
        let status = $(this).data("status");
        const form = $(this).closest("form");
        form.find("input[name=status]").val(status);
        form.submit();
    });
});
