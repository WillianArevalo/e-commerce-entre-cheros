$(document).ready(function () {
    $("#new-faq").on("click", function () {
        $("#drawer-new-faq").removeClass("translate-x-full");
        showOverlay();
    });

    $(".close-drawer-faq").on("click", function () {
        $("#drawer-new-faq").addClass("translate-x-full");
        $("#drawer-edit-faq").addClass("translate-x-full");
        hideOverlay();
    });

    $("#overlay").on("click", function () {
        $("#drawer-new-faq").addClass("translate-x-full");
        $("#drawer-edit-faq").addClass("translate-x-full");
        hideOverlay();
    });

    function showOverlay() {
        $("#overlay").removeClass("hidden");
    }

    function hideOverlay() {
        $("#overlay").addClass("hidden");
    }

    $(document).on("click", ".editFaq", function () {
        const href = $(this).data("href");
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
                console.log(response);
                $("#drawer-edit-faq").removeClass("translate-x-full");
                showOverlay();
                $("#question_edit").val(response.faq.question);
                $("#answer_edit").val(response.faq.answer);
                $("#formEditFaq").attr("action", action);
            },
        });
    });
});
