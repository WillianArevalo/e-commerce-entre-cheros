$(document).ready(function () {
    var $filterCheckboxes = $(".filter-check");
    const $form = $("#form-filters");
    $filterCheckboxes.on("change", function () {
        var selectedFilters = {};
        $filterCheckboxes.filter(":checked").each(function () {
            var name = $(this).attr("name");
            var value = $(this).val();

            if (!selectedFilters[name]) {
                selectedFilters[name] = [];
            }
            selectedFilters[name].push(value);
        });
        addFiltersToForm(selectedFilters);
    });

    function addFiltersToForm(filters) {
        $form.find('input[name="filters"]').remove();
        var filtersString = JSON.stringify(filters);
        $form.append(
            '<input type="hidden" name="filters" value=\'' +
                filtersString +
                "' >",
        );

        sendFilters();
    }

    function sendFilters() {
        console.log($form.serialize());

        $.ajax({
            url: $form.attr("action"),
            type: "POST",
            data: $form.serialize(),
            beforeSend: function () {
                $("#loader").removeClass("hidden");
            },
            success: function (response) {
                console.log(response);
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
});
