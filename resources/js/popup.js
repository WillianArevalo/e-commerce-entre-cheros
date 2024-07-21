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
            "border border-dashed border-blue-600 ring-4 ring-blue-200"
        );
    }

    function removeStyleFocus(element) {
        element.removeClass(
            "border border-dashed border-blue-600 ring-4 ring-blue-200"
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

    $("#nameInput").on("keyup", function () {
        $inputPopup.attr("name", $(this).val());
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

    $("#fw").on("Changed", function () {
        $(".headingPopup")
            .removeClass("font-bold font-semibold font-medium font-normal")
            .addClass("font-" + $(this).val());
    });

    $("#fs").on("Changed", function () {
        $(".headingPopup")
            .removeClass("text-xl text-2xl text-3xl text-4xl text-5xl text-6xl")
            .addClass("text-" + $(this).val());
    });

    $("#color").on("input", function () {
        $(".headingPopup").css("color", $(this).val());
    });

    $("#colorButton").on("input", function () {
        $("#buttonPopupPrimary").css("background", $(this).val());
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

    $("#previewPopup").on("click", function () {
        $("#previewPopup").removeClass("flex").addClass("hidden");
    });
});
