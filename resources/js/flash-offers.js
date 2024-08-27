import { openDrawer } from "./drawer";
import { showToast } from "./toast-admin";

$(document).ready(function () {
    $(document).on("click", ".editFlashOffer", function () {
        const href = $(this).data("href");
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
                openDrawer("#drawer-edit-flash-offer");

                $("#formEditFlashOffer").attr("action", action);
                $("#product_id").val(response.product.id);
                $("#product_name").val(response.product.name);
                $("#offer_price_edit").val(response.product.offer_price);
                $("#start_date_edit").val(response.offer.start_date);
                $("#end_date_edit").val(response.offer.end_date);
                $("#is_showing_edit").val(response.offer.is_showing);

                if (response.offer.is_showing === 1) {
                    $("#is_showing_edit").attr("checked", true);
                }

                if (response.offer.is_active === 1) {
                    $("#is_active_edit").attr("checked", true);
                }
            },
        });
    });

    $(".toggleShow, .toggleStatus").on("change", function () {
        const form = $($(this).data("form"));
        const isChecked = $(this).is(":checked");

        $(this).val(isChecked ? 1 : 0);
        const url = form.attr("action");
        const data = form.serialize();

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                if (response.success) showToast(response.success, "success");
                if (response.error) showToast(response.error, "error");
            },
            error: function (error) {
                console.error(error);
            },
        });
    });
});
