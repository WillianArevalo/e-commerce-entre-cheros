$(document).ready(function () {
    const $btnToggleTheme = $(".theme-toggle");
    const $html = $("html");
    const systemPrefersDark = window.matchMedia(
        "(prefers-color-scheme: dark)",
    ).matches;
    let theme = localStorage.getItem("theme") || "system";

    $(".theme-toggle").removeClass("theme-selected");

    function applyTheme(theme) {
        $(".theme-toggle").removeClass("theme-selected");
        if (theme === "dark") {
            $html.addClass("dark");
            $(".theme-dark").addClass("theme-selected");
        } else if (theme === "light") {
            $html.removeClass("dark");
            $(".theme-light").addClass("theme-selected");
        } else if (theme === "system") {
            systemPrefersDark
                ? $html.addClass("dark")
                : $html.removeClass("dark");
            $(".theme-system").addClass("theme-selected");
        }
    }

    applyTheme(theme);

    $btnToggleTheme.on("click", function () {
        theme = $(this).data("theme");
        const form = $(this).closest("form");
        form.append("<input type='hidden' name='theme' value='" + theme + "'>");
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            success: function (response) {
                if (response.success) {
                    localStorage.setItem("theme", theme);
                    applyTheme(theme);
                }
            },
        });
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

    $(document).on(
        "change",
        "input[name='is_active'], input[name='active'], input[name='is_default'], input[name='auto_update'], input[name='default'], input[name='status'], input[name='offer_active']",
        function () {
            if ($(this).is(":checked")) {
                $(this).val(1);
            } else {
                $(this).val(0);
            }
        },
    );
});
