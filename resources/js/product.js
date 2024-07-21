$(document).ready(function () {
    /* Select custom de etiquetas */
    $(document).on("click", ".selectOptionsLabels .itemOption", function () {
        let item = $(this).text();
        let value = $(this).data("value");
        let input = $(this).data("input");
        $(this)
            .closest(".selectOptionsLabels")
            .prev(".selected")
            .find(".itemSelected")
            .text(item);
        $(input).val(value).trigger("Changed");
        $(this).parent().addClass("hidden");
    });

    /** Select custom de las subcategorías  */
    $(document).on(
        "click",
        ".selectOptionsSubCategories .itemOption",
        function () {
            let item = $(this).text();
            let value = $(this).data("value");
            let input = $(this).data("input");
            $(this)
                .closest(".selectOptionsSubCategories")
                .prev(".selected")
                .find(".itemSelected")
                .text(item);
            $(input).val(value).trigger("Changed");
            $(this).parent().addClass("hidden");
        }
    );

    const $selectedSubCategory = $("#selectedSubCategorie");
    const $parentSubCategory = $selectedSubCategory.parent();

    document.ready =
        $("#categorie_od").val() != ""
            ? getSubcategories($("#categorie_id").val())
            : initalState();

    $("#categorie_id").on("Changed", function () {
        const id = $(this).val();
        getSubcategories(id);
    });

    function getSubcategories(id) {
        const categorieId = id;
        $("#categorieIdSearch").val(categorieId);
        const action = $("#formSearchSubcategorie").attr("action");
        const data = $("#formSearchSubcategorie").serialize();
        $.ajax({
            type: "POST",
            url: action,
            data: $("#formSearchSubcategorie").serialize(),
            success: function (response) {
                $("#listSubcategories").html(response.html);
                if (response.subcategoria.name === "No tiene subcategorías") {
                    $selectedSubCategory.text("No tiene subcategorías");
                    $parentSubCategory.addClass("pointer-events-none");
                    $parentSubCategory.find("svg").addClass("hidden");
                    $("#subcategorie_id").val("").trigger("Changed");
                } else {
                    $selectedSubCategory.text(response.subcategoria.name);
                    $parentSubCategory.removeClass("pointer-events-none");
                    $parentSubCategory.find("svg").removeClass("hidden");
                    $("#subcategorie_id")
                        .val(response.subcategoria.id)
                        .trigger("Changed");
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function initalState() {
        $selectedSubCategory.text("Selecciona una categoría");
        $parentSubCategory.addClass("pointer-events-none");
        $parentSubCategory.find("svg").addClass("hidden");
    }

    if ($("#offer_price").val() != 0) {
        $("#dateOffer").removeClass("hidden");
    }

    $("#offer_price").on("keyup", function () {
        if ($(this).val() != 0) {
            $("#dateOffer").removeClass("hidden");
        } else {
            $("#dateOffer").addClass("hidden");
        }
    });

    $("#main_image").on("change", function () {
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

    $("#gallery_image").on("change", imageUpload);
    const $previewImagesContainer = $("#previewImagesContainer");
    let images = [];
    function imageUpload(e) {
        $previewImagesContainer.html("");
        $previewImagesContainer.removeClass("h-auto").addClass("h-20");
        images = [];
        const files = e.target.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageUrl = e.target.result;
                images.push(imageUrl);
                updateImagePreview();
            };
            reader.readAsDataURL(file);
        }
    }

    function updateImagePreview() {
        $previewImagesContainer.removeClass("h-20").addClass("h-auto");
        $previewImagesContainer.html("");
        images.forEach((imageUrl, index) => {
            const previewDiv = $("<div></div>");
            previewDiv.addClass("inline-block m-2");
            const imageElement = $("<img />");
            imageElement.addClass("w-20 h-20 object-cover rounded-lg");
            imageElement.attr("src", imageUrl);
            previewDiv.append(imageElement);
            $previewImagesContainer.append(previewDiv);
        });
    }

    $("#reloadImages").on("click", function () {
        $("#gallery_image").val("");
        $previewImagesContainer.html(
            '<p class="m-auto text-sm dark:text-gray-400">Sin imágenes seleccionadas</p>'
        );
        $previewImagesContainer.removeClass("h-auto").addClass("h-20");
    });

    $("#addLabelSelected").on("click", addLabel);
    let labels = [];
    let inputLabelsIds = $("#labels_ids");

    if (inputLabelsIds.val() && inputLabelsIds.val() != "") {
        labels = inputLabelsIds.val().split(",");
    }

    function addLabel() {
        let labelValue = $("#label_id").val();
        if (labelValue === "") {
            console.log("Selecciona una etiqueta");
            return false;
        }
        if (!labels.includes(labelValue)) {
            labels.push(labelValue);
            inputLabelsIds.val(labels);
            updateHiddenLabels();
        } else {
            console.log("Ese valor ya existe");
        }
        updatePreviewLabels();
    }

    function updateHiddenLabels() {
        const hiddenLabelsContainer = $("#hiddenLabelsContainer");
        hiddenLabelsContainer.html("");

        labels.forEach((labelValue) => {
            const input = $("<input>")
                .attr("type", "hidden")
                .attr("name", "labels[]")
                .val(labelValue);
            hiddenLabelsContainer.append(input);
        });
    }

    function updatePreviewLabels() {
        const $previewLabelsContainer = $("#previewLabelsContainer");
        $previewLabelsContainer.html("");
        labels.forEach((labelValue, index) => {
            console.log(index, labelValue);
            const previewDiv = $("<div></div>");
            previewDiv.addClass(
                "bg-blue-100 text-blue-800 text-sm font-medium me-2 px-3 py-2 rounded dark:bg-blue-900 dark:text-blue-300 flex items-center justify-between gap-2"
            );
            const labelElement = $("<span></span>");
            labelElement.text(labelValue);

            const removeBtn = $("<button></button>");
            removeBtn.html(
                '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-current" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none"><path d="M15 9L9 14.9996M15 15L9 9.00039" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" stroke="currentColor" stroke-width="1.5" /></svg>'
            );
            removeBtn.attr("type", "button");
            removeBtn.addClass(
                "text-current dark:hover:text-blue-500 hover:text-blue-500"
            );
            removeBtn.on("click", () => {
                removeLabel(index);
            });

            previewDiv.append(labelElement);
            previewDiv.append(removeBtn);
            $previewLabelsContainer.append(previewDiv);
        });
    }

    function removeLabel(index) {
        labels.splice(index, 1);
        inputLabelsIds.val(labels);
        updateHiddenLabels();
        updatePreviewLabels();
        labelTextHide();
    }

    function labelTextHide() {
        if (labels.length === 0) {
            $("#previewLabelsContainer").html(
                '<p class="m-auto text-sm dark:text-gray-400">Sin etiquetas seleccionadas</p>'
            );
        }
    }

    labelTextHide();

    $("#showModalTax").on("click", function () {
        $("#formAddTax")[0].reset();
        $("#formAddTax").find("input").removeClass("is-invalid");
        $("#formAddTax").find(".invalid-feedback").addClass("hidden");
    });

    $("#addTaxButton").on("click", function () {
        const taxName = $("#name_tax");
        const rate = $("#rate");
        const messageName = taxName.data("message");
        const messageRate = rate.data("message");

        if (taxName.val() === "" && rate.val() === "") {
            taxName.addClass("is-invalid");
            $(messageName).removeClass("hidden").text("El nombre es requerido");
            rate.addClass("is-invalid");
            $(messageRate)
                .removeClass("hidden")
                .text("La tasa de impuesto es requerida");
        }

        if (taxName.val() === "") {
            taxName.addClass("is-invalid");
            $(messageName).removeClass("hidden").text("El nombre es requerido");
            taxName.focus();
            return false;
        } else {
            taxName.removeClass("is-invalid");
        }

        if (rate.val() === "") {
            rate.addClass("is-invalid");
            $(messageRate)
                .removeClass("hidden")
                .text("La tasa de impuesto es requerida");
            rate.focus();
            return false;
        } else {
            rate.removeClass("is-invalid");
        }

        $.ajax({
            url: $("#formAddTax").attr("action"),
            method: "POST",
            data: $("#formAddTax").serialize(),
            success: function (response) {
                console.log(response);
                $("#checkBoxTaxes").html(response.html);
                $("#addTax").addClass("hidden");
                $("body").removeClass("overflow-hidden");
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $("#showModalLabel").on("click", function () {
        $("#formAddLabel")[0].reset();
        $("#formAddLabel").find("input").removeClass("is-invalid");
        $("#formAddLabel").find(".invalid-feedback").addClass("hidden");
    });

    $("#addLabelButton").on("click", function () {
        const labelName = $("#name_label");
        const messageName = labelName.data("message");

        if (labelName.val() === "") {
            labelName.addClass("is-invalid");
            $(messageName).removeClass("hidden").text("El nombre es requerido");
            labelName.focus();
            return false;
        } else {
            labelName.removeClass("is-invalid");
        }

        $.ajax({
            url: $("#formAddLabel").attr("action"),
            method: "POST",
            data: $("#formAddLabel").serialize(),
            success: function (response) {
                console.log(response);
                $("#labelsList").html(response.html);
                $("#addLabel").addClass("hidden");
                $("body").removeClass("overflow-hidden");
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
