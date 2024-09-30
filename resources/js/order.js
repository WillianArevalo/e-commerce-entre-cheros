import { showToast } from "./toast-admin";

$(document).ready(function () {
    $(".change-status-order").on("click", function () {
        let status = $(this).data("status");
        const form = $(this).closest("form");
        form.find("input[name=status]").val(status);
        form.submit();
    });

    $(".change-status-payment").on("click", function () {
        let status = $(this).data("status");
        const form = $("#form-change-payment-status");
        form.find("input[name=status]").val(status);
        form.submit();
    });

    //Store
    $(".btn-add-comment").on("click", function () {
        $(".addComment").removeClass("hidden").addClass("flex");
        $("body").addClass("overflow-hidden");
    });

    $(".closeModalAddComment").on("click", function () {
        $(".addComment").removeClass("flex").addClass("hidden");
        $("body").removeClass("overflow-hidden");
    });
});
