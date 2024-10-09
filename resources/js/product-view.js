$(document).ready(function () {
    $(".accordion-header").click(function () {
        const target = $(this).data("target");
        const iconId = `#icon-${$(this).data("target").substring(1)}`;
        if ($(target).hasClass("open")) {
            $(target).removeClass("open").css("max-height", "0px");
            $(iconId).removeClass("rotate-180");
        } else {
            $(".accordion-content")
                .removeClass("open")
                .css("max-height", "0px");
            $(".accordion-header .w-5").removeClass("rotate-180");
            const panelHeight = $(target)[0].scrollHeight;
            $(target)
                .addClass("open")
                .css("max-height", panelHeight + "px");
            $(iconId).addClass("rotate-180");
        }
    });

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

    $("#btn-cancel-review").on("click", function () {
        $("#review-container").addClass("hidden");
    });

    $("#btn-edit-review").on("click", function () {
        $(".review-user-current").hide();
        $("#edit-review-container").toggleClass("hidden");
    });

    $("#btn-cancel-edit-review").on("click", function () {
        $(".review-user-current").show();
        $("#edit-review-container").toggleClass("hidden");
    });

    function updateStars(stars, ratingValue, starClass) {
        stars.each(function (index) {
            if (index < ratingValue) {
                $(this)
                    .removeClass("start-unselected")
                    .addClass("star-selected");
            } else {
                $(this)
                    .removeClass("star-selected")
                    .addClass("start-unselected");
            }
        });
    }

    updateStars(
        $("#star-rating-edit .star-edit"),
        $("#rating-value-edit").val(),
    );

    $("#star-rating .star").on("click", function () {
        var value = $(this).data("value");
        $("#rating-value").val(value);
        updateStars($("#star-rating .star"), value);
    });

    $("#star-rating .star").on("mouseover", function () {
        var value = $(this).data("value");
        updateStars($("#star-rating .star"), value);
    });

    $("#star-rating .star").on("mouseout", function () {
        var value = $("#rating-value").val() || 0;
        updateStars($("#star-rating .star"), value);
    });

    $("#star-rating-edit .star-edit").on("click", function () {
        var value = $(this).data("value");
        $("#rating-value-edit").val(value);
        updateStars($("#star-rating-edit .star-edit"), value);
    });

    $("#star-rating-edit .star-edit").on("mouseover", function () {
        var value = $(this).data("value");
        updateStars($("#star-rating-edit .star-edit"), value);
    });

    $("#star-rating-edit .star-edit").on("mouseout", function () {
        var value = $("#rating-value-edit").val() || 0;
        updateStars($("#star-rating-edit .star-edit"), value);
    });
});
