$(document).ready(function () {
    $("#addBrandButton").click(function () {
        const name = $("#name");
        if (name.val() == "") {
            name.focus().addClass("is-invalid");
            $("#name")
                .next()
                .removeClass("hidden")
                .addClass("block")
                .text("El nombre de la marca es requerido.");
            return;
        }
        $("#formAddBrand").submit();
    });

    $("#name").on("input", function () {
        $(this)
            .removeClass("is-invalid")
            .next("span")
            .removeClass("block")
            .addClass("hidden");
    });

    $(document).on("click", ".btnEditBrand", function () {
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: action,
            success: function (response) {
                $("#brand_id").val(response.id);
                $("#name_edit").val(response.name);
                $("#description_edit").val(response.description);
                const baseAction = $("#formUpdateBrand").data("base-action");
                $("#formUpdateBrand").attr(
                    "action",
                    baseAction + "/" + response.id
                );
                $("#editBrandModal").removeClass("hidden").addClass("flex");
            },
        });
    });

    $(document).on("click", ".closeModalEdit", function () {
        $("#editBrandModal").removeClass("flex").addClass("hidden");
    });

    $(document).on("click", ".closeModalEdit", function () {
        $("#editBrandModal").removeClass("flex").addClass("hidden");
    });

    $("#editBrandButton").click(function () {
        const name = $("#name_edit");
        if (name.val() == "") {
            name.focus().addClass("is-invalid");
            $("#name_edit")
                .next()
                .removeClass("hidden")
                .addClass("block")
                .text("El nombre de la marca es requerido.");
            return;
        }
        $("#formUpdateBrand").submit();
    });

    $(document).on("click", function (e) {
        if (!$(e.target).closest(".btn").length) {
            $(".dropDownContent").addClass("hidden");
        }
    });
});
