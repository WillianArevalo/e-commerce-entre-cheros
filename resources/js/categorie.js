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

    $("#new-categorie").on("click", function () {
        $("#drawer-new-categorie").removeClass("translate-x-full");
        showOverlay();
    });

    $("#close-drawer-new-categorie").on("click", function () {
        $("#drawer-new-categorie").addClass("translate-x-full");
        hideOverlay();
    });

    $("#overlay").on("click", function () {
        $("#drawer-new-categorie").addClass("translate-x-full");
        $("#drawer-edit-categorie").addClass("translate-x-full");
        hideOverlay();
    });

    $(document).on("click", ".editCategorie", function () {
        const href = $(this).data("href");
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
                $("#drawer-edit-categorie").removeClass("translate-x-full");
                showOverlay();
                $("#edit_name_categorie").val(response.categorie.name);
                $("#previewImageEdit").attr("src", response.categorie.image);
                $("#formEditCategorie").attr("action", action);
            },
        });
    });

    $("#close-drawer-edit-categorie").on("click", function () {
        $("#drawer-edit-categorie").addClass("translate-x-full");
        hideOverlay();
    });

    function showOverlay() {
        $("#overlay").removeClass("hidden");
    }

    function hideOverlay() {
        $("#overlay").addClass("hidden");
    }

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
