import { openDrawer } from "./drawer";

$(document).ready(function () {
    $(document).on("click", ".editFaq", function () {
        const href = $(this).data("href");
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
                openDrawer("#drawer-edit-faq");
                $("#question_edit").val(response.faq.question);
                $("#answer_edit").val(response.faq.answer);
                $("#formEditFaq").attr("action", action);
            },
        });
    });

    $(".show-question").on("click", function () {
        const $next = $(this).next();
        $next.toggleClass("hidden");
    });
});
