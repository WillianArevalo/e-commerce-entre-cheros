$(document).ready(function () {
    $("#btn-plus").on("click", function () {
        var qty = parseInt($("#quantity").val());
        qty++;
        const max = parseInt($("#quantity").attr("max"));
        if (qty <= max) {
            $("#quantity").val(qty);
        }
    });

    $("#btn-minus").on("click", function () {
        var qty = parseInt($("#quantity").val());
        if (qty > 1) {
            qty--;
            $("#quantity").val(qty);
        }
    });

    $(".accordion-inventario").on("click", function () {
        const accordion = $(this).data("show");
        const $accordionElement = $(accordion);

        if ($accordionElement.hasClass("accordion-active")) {
            $accordionElement.removeClass("accordion-active");
            $accordionElement.addClass("accordion-desactive");
        } else {
            $accordionElement.removeClass("accordion-desactive");
            $accordionElement.addClass("accordion-active");
        }
    });
});
