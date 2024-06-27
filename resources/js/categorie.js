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

    $(".buttonDelete").on("click", function () {
        let id = $(this).data("id");
        let modalId = $(this).data("modal-target");
        $(".deleteModal").attr("data-id", id);
        let form = $("#" + modalId).find("form");
        let baseAction = form.data("base-action");
        form.attr("action", baseAction + "/" + id);
    });
});
