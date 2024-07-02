$(document).ready(function () {
    var select = $(".selected");
    var items = $(".selectOptions .itemOption");

    $(select).each(function () {
        $(this).on("click", function () {
            closeSelects(this);
            var selectedItems = $(this).next();
            if (selectedItems) {
                selectedItems.toggleClass("hidden");
            }
        });
    });

    $(items).each(function () {
        $(this).on("click", function () {
            let item = $(this).text();
            let value = $(this).data("value");
            let input = $(this).data("input");
            $(this)
                .closest(".selectOptions")
                .prev(".selected")
                .find(".itemSelected")
                .text(item);
            $(input).val(value).trigger("Changed");
            $(this).parent().addClass("hidden");
        });
    });

    function closeSelects(thisSelect) {
        $(".selectOptions").not($(thisSelect).next()).addClass("hidden");
    }

    $(document).on("click", function (e) {
        if (!$(e.target).closest(".selected").length) {
            $(".selectOptions").addClass("hidden");
            $(".selectOptionsLabels").addClass("hidden");
            $(".selectOptionsSubCategories").addClass("hidden");
        }
    });
});
