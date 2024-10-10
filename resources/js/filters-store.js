$(document).ready(function () {
    var $filterCheckboxes = $(".filter-check");
    const $form = $("#form-filters");
    var selectedFilters = {};
    const $resetButton = $("#reset-filters");

    $filterCheckboxes.on("change", function () {
        $filterCheckboxes.filter(":checked").each(function () {
            var name = $(this).attr("name");
            var value = $(this).val();

            if (!selectedFilters[name]) {
                selectedFilters[name] = [];
            }
            selectedFilters[name].push(value);
        });
        addFiltersToForm(selectedFilters);
        toggleResetButton();
    });

    $("#order").on("Changed", function () {
        var selectedOrder = $(this).val();
        delete selectedFilters["order"];
        selectedFilters["order"] = selectedOrder;
        addFiltersToForm(selectedFilters);
        toggleResetButton();
    });

    function addFiltersToForm(filters) {
        $form.find('input[name="filters"]').remove();
        var filtersString = JSON.stringify(filters);
        console.log(filtersString);
        $form.append(
            '<input type="hidden" name="filters" value=\'' +
                filtersString +
                "' >",
        );
        sendFilters();
    }

    function sendFilters() {
        $.ajax({
            url: $form.attr("action"),
            type: "POST",
            data: $form.serialize(),
            beforeSend: function () {
                $("#loader").removeClass("hidden");
            },
            success: function (response) {
                $("#products-list").html(response.html);
                $("#loader").addClass("hidden");
            },
            error: function (xhr, status, error) {
                console.error(
                    "Error al obtener los productos filtrados:",
                    error,
                );
                $("#loader").addClass("hidden");
            },
            complete: function () {
                $("#loader").addClass("hidden");
            },
        });
    }

    function toggleResetButton() {
        if (Object.keys(selectedFilters).length > 0) {
            $resetButton.removeClass("hidden");
        } else {
            $resetButton.addClass("hidden");
        }
    }

    $resetButton.on("click", function () {
        $filterCheckboxes.prop("checked", false);
        $("#order").val("");
        $("#search").val("");
        selectedFilters = {};
        addFiltersToForm(selectedFilters);
        toggleResetButton();
    });

    $(".accordion-header-filter").click(function () {
        const target = $(this).data("target");
        if ($(target).hasClass("open")) {
            $(target).removeClass("open").css("max-height", "0px");
        } else {
            const panelHeight = $(target)[0].scrollHeight;
            $(target)
                .addClass("open")
                .css("max-height", panelHeight + "px");
        }
    });

    $("#search").on("input", function () {
        var $form = $("#form-search-product");

        if ($(this).val()) {
            $resetButton.removeClass("hidden");
        }

        $.ajax({
            url: $form.attr("action"),
            method: "POST",
            data: $form.serialize(),
            beforeSend: function () {
                $("#loading-overlay").removeClass("hidden").addClass("flex");
            },
            success: function (response) {
                $("#products-list").html(response.html);
                $("#loading-overlay").addClass("hidden").removeClass("flex");
            },
            complete: function () {
                $("#loading-overlay").addClass("hidden").removeClass("flex");
            },
        });
    });
});
