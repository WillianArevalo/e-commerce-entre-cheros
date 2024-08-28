import { showToast } from "./toast-admin";

$(document).ready(function () {
    $("#site_in_maintenance").on("change", function () {
        if ($(this).is(":checked")) {
            $("#site_in_maintenance").val(1);
        }
        const form = $(this).closest("form");

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                console.log(response);
                if (response.success) {
                    showToast(response.success, "success");
                } else {
                    showToast(response.error, "error");
                }
            },
        });
    });

    $("#view-cookies").on("click", function () {
        $(".cookies").toggleClass("hidden");
    });
});
