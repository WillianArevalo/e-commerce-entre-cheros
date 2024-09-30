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

    $("#logo").on("change", function () {
        showPreviewImage(this, "#logo-preview");
    });

    $("#favicon").on("change", function () {
        showPreviewImage(this, "#favicon-preview");
    });

    function showPreviewImage(image, preview) {
        $(image).prev().addClass("hidden");
        const $preview = $(preview);
        $preview.removeClass("hidden");
        let archive = image.files[0];
        if (archive) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $preview.attr("src", e.target.result);
            };
            reader.readAsDataURL(archive);
        }
    }
});
