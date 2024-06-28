$(document).ready(function () {
    $("#typeCategorie").on("change", function () {
        var typeCategorie = $(this).val();

        if (typeCategorie === "secundaria") {
            $("#categorieParentSelect").removeClass("hidden");
        } else {
            $("#categorieParentSelect").addClass("hidden");
        }
    });

    $("#imageCategorie").on("change", function () {
        $(this).prev().addClass("hidden");
        $("#previewImage").removeClass("hidden");
        let archive = this.files[0];
        if (archive) {
            let reader = new FileReader();
            reader.onload = function (e) {
                let preview = document.getElementById("previewImage");
                preview.src = e.target.result;
            };
            reader.readAsDataURL(archive);
        }
    });

    $(document).on("click", ".buttonDelete", function () {
        $(".deleteModal").removeClass("hidden").addClass("flex");
        let formId = $(this).data("form");
        $(".deleteModal .confirmDelete").attr("data-form", formId);
    });

    $(document).on("click", ".closeModal", function () {
        $(".deleteModal").removeClass("flex").addClass("hidden");
    });

    $(document).on("click", ".confirmDelete", function () {
        let formId = $(this).data("form");
        $("#" + formId).submit();
    });

    $(document).on("click", ".btnDropDown", function () {
        $(".dropDownContent").addClass("hidden");
        $(this).next().toggleClass("hidden");
    });

    $(document).on("click", function (e) {
        if (!$(e.target).closest(".btnDropDown").length) {
            $(".dropDownContent").addClass("hidden");
        }
    });

    $("#inputSearchCategorie").on("keyup", function () {
        let data = $("#formSearchCategorie").serialize();
        let url = $("#formSearchCategorie").attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function (response) {
                $("#tableCategorie").html(response);
            },
        });
    });

    $("input[type='checkbox']").on("change", function () {
        let data = $("#formSearchCategorieCheck").serialize();
        let url = $("#formSearchCategorieCheck").attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function (response) {
                $("#tableCategorie").html(response);
            },
        });
    });
});
