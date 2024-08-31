$(document).ready(function () {
    $("#header").on("keyup", function () {
        $("#textHeader").text($(this).val());
    });

    $("#header").on("focus", function () {
        addStyleFocus($("#textHeader"));
    });

    $("#header").on("blur", function () {
        removeStyleFocus($("#textHeader"));
    });

    $("#descriptionPopup").on("keyup", function () {
        $("#descriptionPoupText").text($(this).val());
    });

    $("#descriptionPopup").on("focus", function () {
        addStyleFocus($("#descriptionPoupText"));
    });

    $("#descriptionPopup").on("blur", function () {
        removeStyleFocus($("#descriptionPoupText"));
    });

    function addStyleFocus(element) {
        element.addClass(
            "border border-dashed border-blue-600 ring-4 ring-blue-200 rounded-lg p-2",
        );
    }

    function removeStyleFocus(element) {
        element.removeClass(
            "border border-dashed border-blue-600 ring-4 ring-blue-200 rounded-lg p-2",
        );
    }

    $("#removeImagePoup").on("click", function () {
        $("#imagePoup").addClass("hidden");
    });

    $("#addImagePopup").on("change", function () {
        const file = $(this).prop("files")[0];
        const reader = new FileReader();

        reader.onload = function (e) {
            $("#imagePoup").attr("src", e.target.result);
            $("#imagePoup").removeClass("hidden");
        };

        reader.readAsDataURL(file);
    });

    const $inputPopup = $("#inputPopup");

    $("#addInputPopup").on("click", function () {
        $inputPopup.removeClass("hidden").addClass("flex");
        $("#optionsInput").removeClass("hidden");
    });

    $("#placeholderInput").on("keyup", function () {
        $inputPopup.attr("placeholder", $(this).val());
    });

    $("#removeInputPoup").on("click", function () {
        $inputPopup.addClass("hidden").removeClass("flex");
        $("#optionsInput").addClass("hidden");
    });

    $("#textButtonPrimary").on("keyup", function () {
        $("#buttonPopupPrimary").text($(this).val());
    });

    $("#textButtonSecondary").on("keyup", function () {
        $("#buttonPopupSecondary").text($(this).val());
    });

    $("#ff").on("Changed", function () {
        $(".headingPopup")
            .removeClass("font-league-spartan font-secondary font-mystical")
            .addClass("font-" + $(this).val());
    });

    $("#ffText").on("Changed", function () {
        $("#descriptionPoupText")
            .removeClass("font-league-spartan font-secondary font-mystical")
            .addClass("font-" + $(this).val());
    });

    $("#fw").on("Changed", function () {
        $(".headingPopup")
            .removeClass("font-bold font-semibold font-medium font-normal")
            .addClass("font-" + $(this).val());
    });

    $("#fwText").on("Changed", function () {
        $("#descriptionPoupText")
            .removeClass("font-bold font-semibold font-medium font-normal")
            .addClass("font-" + $(this).val());
    });

    $("#fsText").on("Changed", function () {
        $("#descriptionPoupText")
            .removeClass("text-xs text-sm text-base text-lg text-xl")
            .addClass("text-" + $(this).val());
    });

    $("#colorText").on("input", function () {
        $("#descriptionPoupText").css("color", $(this).val());
    });

    $("#fs").on("Changed", function () {
        $(".headingPopup")
            .removeClass("text-xl text-2xl text-3xl text-4xl text-5xl text-6xl")
            .addClass("text-" + $(this).val());
    });

    $("#color").on("input", function () {
        $(".headingPopup").css("color", $(this).val());
    });

    $("#width").on("input", function () {
        $("#popup").css("width", $(this).val() + "px");
    });

    $("#addPopup").on("click", function () {
        const contentPopup = $(".popupContainer").html();
        $("#content").val(contentPopup);
        $("#formPopup").submit();
    });

    $(".showPopup").on("click", function () {
        const action = $(this).data("action");
        $.ajax({
            url: action,
            type: "GET",
            success: function (response) {
                $("#previewPopup")
                    .removeClass("hidden")
                    .addClass("flex")
                    .html(response.popup.content);
            },
            error: function (response) {},
        });
    });

    $(document).on("click", ".closePopup", function () {
        $(this).parent().addClass("hidden");
        $("#previewPopup").removeClass("flex").addClass("hidden");
    });

    $("#type").on("Changed", function () {
        if ($(this).val() === "redirect") {
            $("#redirect-link").removeClass("hidden");
        } else {
            $("#redirect-link").addClass("hidden");
        }
    });
});
