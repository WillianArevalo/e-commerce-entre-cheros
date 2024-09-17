import { openDrawer } from "./drawer";

$(document).ready(function () {
    $(".change-status-review").on("click", function () {
        let status = $(this).data("status");
        const form = $(this).closest("form");
        form.find("input[name=status]").val(status);
        form.submit();
    });

    $(document).on("click", ".showReview", function () {
        $("#show-review-content").html("");
        var href = $(this).data("href");
        $.ajax({
            url: href,
            type: "GET",
            success: function (response) {
                $("#show-review-content").html(response.html);
                openDrawer("#drawer-show-review");
            },
        });
    });

    $(".editReview").on("click", function () {
        var href = $(this).data("href");
        var action = $(this).data("action");
        $.ajax({
            url: href,
            type: "GET",
            success: function (response) {
                $("#formReasonReject").attr("action", action);
                $("#reason").val(response.review.reason);
            },
        });
    });

    $("#btn-add-reason-reject").on("click", function (e) {
        if ($("#reason").val() === "") {
            $("#reason").addClass("is-invalid");
            $("#message-reason")
                .removeClass("hidden")
                .html("The reason field is required.");
        } else {
            $("#formReasonReject").submit();
        }
    });
});
