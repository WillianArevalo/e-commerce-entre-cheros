$(document).ready(function () {
    $("#new-brand").on("click", function () {
        resetErrors();
        $("#drawer-new-brand").removeClass("translate-x-full");
        showOverlay();
    });

    $(".close-drawer-brand").on("click", function () {
        $("#drawer-new-brand").addClass("translate-x-full");
        $("#drawer-edit-brand").addClass("translate-x-full");
        hideOverlay();
    });

    $("#overlay").on("click", function () {
        $("#drawer-new-brand").addClass("translate-x-full");
        $("#drawer-edit-brand").addClass("translate-x-full");
        hideOverlay();
    });

    $(document).on("click", ".editBrand", function () {
        resetErrors();
        const href = $(this).data("href");
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
                $("#drawer-edit-brand").removeClass("translate-x-full");
                showOverlay();
                $("#edit_name_brand").val(response.brand.name);
                $("#edit_description_brand").val(response.brand.description);
                $("#formEditBrand").attr("action", action);
            },
        });
    });

    function showOverlay() {
        $("#overlay").removeClass("hidden");
    }

    function hideOverlay() {
        $("#overlay").addClass("hidden");
    }

    function resetErrors() {
        $(".is-invalid").removeClass("is-invalid");
        $("form .error-msg").remove();
    }

    $(document).on("click", ".btnEditBrand", function () {
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: action,
            success: function (response) {
                $("#brand_id").val(response.id);
                $("#name_edit").val(response.name);
                $("#description_edit").val(response.description);
                const baseAction = $("#formUpdateBrand").data("base-action");
                $("#formUpdateBrand").attr(
                    "action",
                    baseAction + "/" + response.id
                );
                $("#editBrandModal").removeClass("hidden").addClass("flex");
            },
        });
    });
});
