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
                $("#edit_name_brand").val(response.brand.name);
                $("#edit_description_brand").val(response.brand.description);
                $("#formEditBrand").attr("action", action);
            },
        });
    });
});
