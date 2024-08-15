import { showToast } from "./toast";

$(document).ready(function () {
    $(document).on("click", ".add-to-cart", function () {
        var dataForm = $(this).data("form");
        const form = $(dataForm);
        const data = $(form).serialize();
        const url = $(form).attr("action");
        $.ajax({
            url: url,
            method: "POST",
            data: data,
            success: function (data) {
                $("#cart-count").text(data.total);
                showToast(data.message, data.status);
            },
            error: function (error) {
                showToast(error, "error");
            },
        });
    });

    $(document).on(
        "click",
        ".btnMinusCart, .btnPlusCart, .btnRemoveCart",
        function () {
            var dataForm = $(this).data("form");
            const form = $(dataForm);
            const data = $(form).serialize();
            const url = $(form).attr("action");
            handleAjaxRequest(url, data);
        },
    );

    $(document).on("change", ".btn-add-favorite", function () {
        var dataForm = $(this).data("form");
        const form = $(dataForm);
        const data = $(form).serialize();
        const url = $(form).attr("action");
        const card = $(this).data("card");
        const input = $(this);
        input.addClass("checked");

        $.ajax({
            url: url,
            method: "POST",
            data: data,
            success: function (response) {
                if (response.message) {
                    showToast(response.message, response.status);
                }
                input.removeClass("checked");
                $(card).html(response.html);
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
                if (response.status === "success") {
                    $("#tableCart").html(response.html);
                    $("#cart-count").text(response.total);
                    $("#totalPriceCart").text(
                        "$" + response.totalPrice.toFixed(2),
                    );
                    $("#totalTaxes").text("$" + response.totalTaxes.toFixed(2));
                    $("#totalWithTaxes").text(
                        "$" + response.totalWithTaxes.toFixed(2),
                    );
                    $("#discount").text(
                        "- $" + response.totalDiscount.toFixed(2),
                    );
                    $("#subtotal").text("$" + response.subtotal.toFixed(2));
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
});
