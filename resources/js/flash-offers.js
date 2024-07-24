import { showOverlay, hideOverlay, closeDrawer } from "./drawer";

$(document).ready(function () {
    $("#new-flash-offer").on("click", function () {
        $("#drawer-new-flash-offer").removeClass("translate-x-full");
        showOverlay();
    });

    function closeDrawers() {
        closeDrawer("#drawer-new-flash-offer");
        closeDrawer("#drawer-edit-flash-offer");
    }

    $(".close-drawer-offer").on("click", function () {
        closeDrawers();
    });

    $("#overlay").on("click", function () {
        closeDrawers();
    });

    $(document).on("click", ".editFlashOffer", function () {
        const href = $(this).data("href");
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
                showOverlay();
                $("#drawer-edit-flash-offer").removeClass("translate-x-full");
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

    $(".toggleShow").on("change", function () {
        const form = $($(this).data("form"));
        const isChecked = $(this).is(":checked");
        const changeType = $(this).data("change");
        $(this).val(isChecked ? 1 : 0);
        // Si el checkbox no está marcado y quieres enviar explícitamente un valor cuando no está marcado

        if (!isChecked) {
            if (changeType === "show") {
                form.append(
                    '<input type="hidden" name="is_showing" value="0">'
                );
            } else {
                form.append('<input type="hidden" name="is_active" value="0">');
            }
        }

        const url = form.attr("action");
        const data = form.serialize();

        console.log(data);
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
