$(document).ready(function () {
    const $btnToggleTheme = $("#toggleTheme");
    const $html = $("html");

    if (localStorage.getItem("theme") === "dark") {
        $html.addClass("dark");
    } else {
        $html.removeClass("dark");
    }

    $btnToggleTheme.on("click", function () {
        if ($html.hasClass("dark")) {
            $html.removeClass("dark");
            localStorage.setItem("theme", "light");
        } else {
            $html.addClass("dark");
            localStorage.setItem("theme", "dark");
        }
    });

    const $inputSearch = $("#inputSearch");

    $inputSearch.on("keyup", function () {
        let $form = $($(this).data("form"));
        let data = $form.serialize();
        let url = $form.attr("action");
        let $table = $($(this).data("table"));
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function (response) {
                $table.html(response);
            },
        });
    });

    $(document).on("click", ".buttonDelete", function () {
        $(".deleteModal").removeClass("hidden").addClass("flex");
        let formId = $(this).data("form");
        $(".deleteModal .confirmDelete").attr("data-form", formId);
        $("body").addClass("overflow-hidden");
    });

    $(document).on("click", ".closeModal", function () {
        $(".deleteModal").removeClass("flex").addClass("hidden");
        $("body").removeClass("overflow-hidden");
    });

    $(document).on("click", ".confirmDelete", function () {
        let formId = $(this).data("form");
        $("#" + formId).submit();
        $("body").removeClass("overflow-hidden");
    });

    $(".close-cookies").on("click", function () {
        $(".cookies").addClass("hidden");
    });
});
