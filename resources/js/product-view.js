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
        $accordionElement.toggleClass("hidden");
    });

    $(".secondary-image").on("click", function () {
        $(".container-secondary-image").removeClass("selected");
        $(this).parent().addClass("selected");
        const newSrc = $(this).attr("src");
        $("#main-image").attr("src", newSrc);
    });

    var $review = $("#review");
    var $messageReview = $("#message-review");
    $("#add-review").on("click", function () {
        if ($review.val() === "") {
            $review.addClass("is-invalid");
            $messageReview
                .removeClass("hidden")
                .text("El campo no puede estar vacío");
        }
    });

    $review.on("input", function () {
        if ($review.val() !== "") {
            $review.removeClass("is-invalid");
            $messageReview.addClass("hidden");
        }
    });
});
