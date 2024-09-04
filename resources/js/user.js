import { showToast } from "./toast-admin";

$(document).ready(function () {
    const src = $("#image-profile").attr("src");
    let archive = $("#profile").prop("files")[0];
    $("#profile").on("change", function () {
        archive = $(this).prop("files")[0];
        const img = $("#image-profile");
        if (archive) {
            const reader = new FileReader();
            reader.onload = function () {
                img.attr("src", reader.result);
            };
            reader.readAsDataURL(archive);
            $("#remove-image").removeClass("hidden");
        }
    });

    $("#remove-image").on("click", function () {
        if (archive) {
            $("#image-profile").attr("src", src);
            $("#profile").val("");
        }
    });

    $("#form-add-user").on("submit", function (e) {
        e.preventDefault();
        if ($("#password-user").val() != $("#password-confirmed").val()) {
            showToast("Las contraseñas no coinciden", "error");
            return;
        }
        $(this).unbind("submit").submit();
    });
});
