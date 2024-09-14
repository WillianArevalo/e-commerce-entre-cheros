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

    $("#btn-review").on("click", function () {
        $("#review-container").toggleClass("hidden");
    });

    var stars = $(".star");
    var ratingValue = $("#rating-value");

    // Al hacer clic en una estrella
    stars.on("click", function () {
        var value = $(this).data("value");
        ratingValue.val(value);
        // Actualizar las estrellas visualmente
        stars.each(function (index) {
            if (index < value) {
                $(this)
                    .removeClass("start-unselected")
                    .addClass("star-selected");
            } else {
                $(this)
                    .removeClass("star-selected")
                    .addClass("start-unselected");
            }
        });
    });

    // Efecto de hover
    stars.on("mouseover", function () {
        var value = $(this).data("value");

        // Actualizar las estrellas hasta la que está siendo 'hovered'
        stars.each(function (index) {
            if (index < value) {
                $(this)
                    .addClass("star-selected")
                    .removeClass("start-unselected");
            } else {
                $(this)
                    .addClass("start-unselected")
                    .removeClass("star-selected");
            }
        });
    });

    // Volver al estado actual después del hover
    stars.on("mouseout", function () {
        var value = ratingValue.val() || 0;

        // Restaurar las estrellas al estado de la puntuación seleccionada
        stars.each(function (index) {
            if (index < value) {
                $(this)
                    .addClass("star-selected")
                    .removeClass("start-unselected");
            } else {
                $(this)
                    .addClass("start-unselected")
                    .removeClass("star-selected");
            }
        });
    });
});
