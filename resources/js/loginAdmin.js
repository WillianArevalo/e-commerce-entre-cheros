$(document).ready(function () {
    $("#email, #password").on("keyup", function () {
        let inputContainer = $(this).closest(".relative");
        let message = inputContainer.next();
        let iconSuccess = inputContainer.find(".icon-success");
        let iconError = inputContainer.find(".icon-error");

        if ($(this).val() != "") {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
            message.addClass("hidden");
            iconSuccess.removeClass("hidden").addClass("flex");
            iconError.addClass("hidden");
        } else {
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
            message.removeClass("hidden");
            iconError.removeClass("hidden");
            iconSuccess.addClass("hidden").removeClass("flex");
        }
    });
});
