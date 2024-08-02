import { openDrawer } from "./drawer.js";
$(document).ready(function () {
    $("#typeCategorie").on("Changed", function () {
        var typeCategorie = $(this).val();
        if (typeCategorie === "secundaria") {
            $("#categorieParentSelect").removeClass("hidden");
        } else {
            $("#categorieParentSelect").addClass("hidden");
        }
    });

    $("#imageCategorie").on("change", function () {
        showPreviewImage(this, "#previewImage");
    });

    $("#edit-image-categorie").on("change", function () {
        showPreviewImage(this, "#previewImageEdit");
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

    $(document).on("click", ".editCategorie", function () {
        const href = $(this).data("href");
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
                openDrawer("#drawer-edit-categorie");
                $("#edit_name_categorie").val(response.categorie.name);
                $("#previewImageEdit").attr("src", response.categorie.image);
                $("#formEditCategorie").attr("action", action);
            },
        });
    });

    $(document).on("click", ".btnDropDown", function (e) {
        e.stopPropagation();
        $(".dropDownContent").addClass("hidden");
        $(this).next(".dropDownContent").toggleClass("hidden");
    });

    $(document).on("click", function () {
        $(".dropDownContent").addClass("hidden");
    });

    $(document).on("click", ".dropDownContent", function (e) {
        e.stopPropagation();
    });

    $(document).on("click", ".editCategorie", function () {
        $(".dropDownContent").addClass("hidden");
    });

    $("input[type='checkbox']").on("change", function () {
        let data = $("#formSearchCategorieCheck").serialize();
        let url = $("#formSearchCategorieCheck").attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function (response) {
                $("#tableCategorie").html(response);
            },
        });
    });
});
