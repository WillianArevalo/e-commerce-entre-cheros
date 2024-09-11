import { openDrawer } from "./drawer";

$(document).ready(function () {
    $(document).on("click", ".editBrand", function () {
        const href = $(this).data("href");
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
                openDrawer("#drawer-edit-brand");
                let brand = response.brand;
                $("#name").val(brand.name);
                $("#description").val(brand.description);
                $("#website").val(brand.website);
                $("#preview-logo-edit").attr("src", brand.logo);
                $("#preview-banner-edit").attr("src", brand.banner);
                $("#formEditBrand").attr("action", action);
            },
        });
    });

    $("#logo").change(function () {
        $("#preview-logo").prev().remove();
        $("#preview-logo").show();
        previewImage(this, $("#preview-logo"));
    });

    $("#banner").change(function () {
        $("#preview-banner").prev().remove();
        $("#preview-banner").show();
        previewImage(this, $("#preview-banner"));
    });

    $("#logo-edit").change(function () {
        previewImage(this, $("#preview-logo-edit"));
    });

    $("#banner-edit").change(function () {
        previewImage(this, $("#preview-banner-edit"));
    });

    function previewImage(input, image) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                image.attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
});
