import { showToast } from "./toast";

$(document).ready(function () {
    const $password = $("#password-register");
    const $confirmPassword = $("#confirm-password");
    const $requirements = $("#password-requirements");
    const $charLength = $("#char-length");
    const $upperCase = $("#upper-case");
    const $number = $("#number");
    const $specialChar = $("#special-char");
    const $passwordMatch = $("#password-match");

    function validatePassword() {
        const password = $password.val();
        let valid = true;

        if (password.length >= 8) {
            $charLength.removeClass("text-red-500").addClass("text-green-500");
        } else {
            $charLength.removeClass("text-green-500").addClass("text-red-500");
            valid = false;
        }

        if (/[A-Z]/.test(password)) {
            $upperCase.removeClass("text-red-500").addClass("text-green-500");
        } else {
            $upperCase.removeClass("text-green-500").addClass("text-red-500");
            valid = false;
        }

        if (/\d/.test(password)) {
            $number.removeClass("text-red-500").addClass("text-green-500");
        } else {
            $number.removeClass("text-green-500").addClass("text-red-500");
            valid = false;
        }

        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            $specialChar.removeClass("text-red-500").addClass("text-green-500");
        } else {
            $specialChar.removeClass("text-green-500").addClass("text-red-500");
            valid = false;
        }

        return valid;
    }

    function validatePasswordMatch() {
        const password = $password.val();
        const confirmPassword = $confirmPassword.val();

        if (password === confirmPassword && confirmPassword.length > 0) {
            $passwordMatch
                .removeClass("text-red-500")
                .addClass("text-green-500")
                .text("Las contraseñas coinciden");
        } else {
            $passwordMatch
                .removeClass("text-green-500")
                .addClass("text-red-500")
                .text("Las contraseñas no coinciden");
        }
    }

    $password.on("input", function () {
        validatePassword();
        validatePasswordMatch();
        $requirements.removeClass("hidden");
        $password.addClass("is-invalid");
    });

    $confirmPassword.on("input", function () {
        validatePasswordMatch();
        $passwordMatch.removeClass("hidden");
    });

    $("#form-register").on("submit", function (e) {
        if (!validatePassword()) {
            e.preventDefault();
            showToast("La contraseña no cumple con los requisitos", "error");
        }
    });
});
