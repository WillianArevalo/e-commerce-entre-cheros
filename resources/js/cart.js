import { info } from "autoprefixer";
import { showToast } from "./toast";

$(document).ready(function () {
    $(document).on(
        "click",
        ".btnMinusCart, .btnPlusCart, .btnRemoveCart, .add-to-cart",
        function () {
            var dataForm = $(this).data("form");
            const form = $(dataForm);
            const data = $(form).serialize();
            const url = $(form).attr("action");
            handleAjaxRequest(url, data);
        },
    );

    $(document).on("click", ".btn-add-favorite", function () {
        const form = $(this).closest("form");
        $(this).toggleClass("favorite").toggleClass("not-favorite");

        $("#favorite-text").text(
            $(this).hasClass("favorite") ? "Favorito" : "Agregar a favoritos",
        );

        $.ajax({
            url: form.attr("action"),
            method: "POST",
            data: form.serialize(),
            success: function (data) {
                if (data.status === "auth") window.location.href = "/login";
                if (data.status === "success" || data.status === "info") {
                    if (data.message) {
                        showToast(data.message, data.status);
                    }
                    $("#favorite-count").text(data.count);
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    function handleAjaxRequest(url, data) {
        $.ajax({
            url: url,
            method: "POST",
            data: data,
            success: function (response) {
                console.log(response);
                if (response.status === "success") {
                    $("#tableCart").html(response.html); // Update table
                    $("#cart-mobile").html(response.html_mobile);
                    $("#cart-count").text(response.total); // Update cart count
                    $("#totalPriceCart").text(response.totalPrice); // Update total price
                    $("#totalTaxes").text(response.totalTaxes);
                    $("#totalWithTaxes").text(response.totalWithTaxes);
                    $("#discount").text(response.totalDiscount);
                    $("#subtotal").text(response.subtotal);
                    $("#totalWithShippingMethod").text(
                        response.totalWithShippingMethod,
                    );
                }
                if (response.message) {
                    showToast(response.message, response.status);
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    $("#code").on("input", function () {
        if ($(this).val() !== "") {
            $(this).removeClass("is-invalid");
        }
    });

    $(document).on("submit", "#formApplyCoupon", function (e) {
        e.preventDefault();
        if ($("#code").val() == "") {
            $("#code").addClass("is-invalid");
            showToast("Please enter a coupon code", "error");
            return;
        }
        var $form = $(this).closest("form");
        $.ajax({
            url: $form.attr("action"),
            data: $form.serialize(),
            method: "POST",
            success: function (response) {
                console.log(response);
                if (response.success !== undefined) {
                    showToast(response.success, "success");
                    $("#discount").text("-" + response.discount);
                    $("#subtotal").text(response.total);
                    $("#form-coupon").html(response.html);
                    $("#totalWithShippingMethod").text(
                        response.totalWithShippingMethod,
                    );
                } else {
                    showToast(response.error, "error");
                }
            },
            error: function (error) {
                console.error(error);
            },
        });
    });

    $("input[name='shipping_method']").on("change", function () {
        $(".shipping-method")
            .removeClass("method-shipping-selected")
            .addClass("border-zinc-400");

        const id = $(this).val();
        $(".shipping-method-" + id)
            .removeClass("border-zinc-400")
            .addClass("method-shipping-selected");
        const form = $(this).closest("form");
        $.ajax({
            url: form.attr("action"),
            method: "POST",
            data: form.serialize(),
            success: function (response) {
                console.log(response);
                if (response.status === "success") {
                    $("#totalWithShippingMethod").text(response.total);
                }
            },
        });
    });

    $("#remove-coupon").on("click", function () {
        window.location.reload();
    });
});
