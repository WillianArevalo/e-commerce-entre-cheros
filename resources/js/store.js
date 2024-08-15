import { showToast } from "./toast";
$(document).ready(function () {
    $("#btn-change-password").on("click", function () {
        const $newPassword = $("#new-password");
        const $confirmPassword = $("#confirm-password");

        if ($newPassword.val() !== $confirmPassword.val()) {
            showToast("Las contraseñas no coinciden", "error");
            $newPassword.addClass("is-invalid");
            $confirmPassword.addClass("is-invalid");
            return;
        }
        $("#formChangePassword").submit();
    });
});
