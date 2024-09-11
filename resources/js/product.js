import { showToast } from "./toast-admin";

$(document).ready(function () {
    function handleSelectOptions(containerClass, selectedClass, inputEvent) {
        $(document).on("click", `${containerClass} .itemOption`, function () {
            let item = $(this).text();
            let value = $(this).data("value");
            let input = $(this).data("input");
            $(this)
                .closest(containerClass)
                .prev(selectedClass)
                .find(".itemSelected")
                .text(item);
            $(input).val(value).trigger(inputEvent);
            $(this).parent().addClass("hidden");
        });
    }

    handleSelectOptions(".selectOptionsSubCategories", ".selected", "Changed");
    handleSelectOptions(".selectOptionsLabels", ".selected", "Changed");

    const $selectedSubCategory = $("#selectedSubCategorie");
    const $parentSubCategory = $selectedSubCategory.parent();

    if ($("#categorie_id").val() !== "") {
        getSubcategories($("#categorie_id").val());
    } else {
        initialState();
    }

    $("#categorie_id").on("Changed", function () {
        getSubcategories($(this).val());
    });

    function getSubcategories(id) {
        const categorieId = id;
        $("#categorieIdSearch").val(categorieId);
        const action = $("#formSearchSubcategorie").attr("action");
        const data = $("#formSearchSubcategorie").serialize();
        $.ajax({
            type: "POST",
            url: action,
            data: data,
            success: function (response) {
                $("#listSubcategories").html(response.html);
                updateSubCategoryUI(response.subcategoria);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function updateSubCategoryUI(subcategoria) {
        if (subcategoria.name === "No tiene subcategorías") {
            $selectedSubCategory.text("No tiene subcategorías");
            $parentSubCategory.addClass("pointer-events-none");
            $parentSubCategory.find("svg").addClass("hidden");
            $("#subcategorie_id").val("").trigger("Changed");
        } else {
            $selectedSubCategory.text(subcategoria.name);
            $parentSubCategory.removeClass("pointer-events-none");
            $parentSubCategory.find("svg").removeClass("hidden");
            $("#subcategorie_id").val(subcategoria.id).trigger("Changed");
        }
    }

    function initialState() {
        $selectedSubCategory.text("Selecciona una categoría");
        $parentSubCategory.addClass("pointer-events-none");
        $parentSubCategory.find("svg").addClass("hidden");
    }

    function toggleElementVisibility(element, condition) {
        if (condition) {
            element.removeClass("hidden");
        } else {
            element.addClass("hidden");
        }
    }

    const $dateOffer = $("#dateOffer");
    toggleElementVisibility($dateOffer, $("#offer_price").val() != 0);

    $("#offer_price").on("keyup", function () {
        toggleElementVisibility($dateOffer, $(this).val() != 0);
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
            const imageElement = $("<img />")
                .addClass("w-20 h-20 object-cover rounded-lg")
                .attr("src", imageUrl);
            previewDiv.append(imageElement);
            $previewImagesContainer.append(previewDiv);
        });
    }

    $("#reloadImages").on("click", function () {
        $("#gallery_image").val("");
        $previewImagesContainer
            .html(
                '<p class="text-sm text-zinc-500 dark:text-zinc-300 m-auto">Sin imágenes seleccionadas</p>',
            )
            .removeClass("h-auto")
            .addClass("h-20");
    });

    let inputLabelsIds = $("#labels_ids");
    let labels = inputLabelsIds.val() ? inputLabelsIds.val().split(",") : [];

    function addLabel() {
        let labelValue = $("#label_id").val();
        if (labelValue && !labels.includes(labelValue)) {
            labels.push(labelValue);
            inputLabelsIds.val(labels);
            updateHiddenLabels();
            updatePreviewLabels();
        } else {
            showToast("La etiqueta ya ha sido seleccionada", "info");
        }
    }

    function updateHiddenLabels() {
        const hiddenLabelsContainer = $("#hiddenLabelsContainer");
        hiddenLabelsContainer.html("");
        labels.forEach((labelValue) => {
            hiddenLabelsContainer.append(
                $("<input>")
                    .attr({ type: "hidden", name: "labels[]" })
                    .val(labelValue),
            );
        });
    }

    function updatePreviewLabels() {
        const $previewLabelsContainer = $("#previewLabelsContainer");
        $previewLabelsContainer.html("");
        labels.forEach((labelValue, index) => {
            const previewDiv = $("<div></div>").addClass(
                "bg-white text-zinc-600 border-zinc-400 text-sm font-medium me-2 px-4 py-2 border dark:text-white dark:bg-black dark:border-zinc-800 rounded-lg flex items-center justify-between gap-2",
            );
            const labelElement = $("<span></span>").text(labelValue);
            const removeBtn = $("<button></button>")
                .html(
                    '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-current" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none"> <path d="M19.0005 4.99988L5.00049 18.9999M5.00049 4.99988L19.0005 18.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>',
                )
                .attr("type", "button")
                .addClass("text-current hover:text-primary-600");
            removeBtn.on("click", () => removeLabel(index));
            previewDiv.append(labelElement).append(removeBtn);
            $previewLabelsContainer.append(previewDiv);
        });
        labelTextHide();
    }

    function removeLabel(index) {
        labels.splice(index, 1);
        inputLabelsIds.val(labels);
        updateHiddenLabels();
        updatePreviewLabels();
    }

    function labelTextHide() {
        if (labels.length === 0) {
            $("#previewLabelsContainer").html(
                '<p class="text-sm text-zinc-500 dark:text-zinc-300 p-4 m-auto">Sin etiquetas seleccionadas</p>',
            );
        }
    }

    $("#addLabelSelected").on("click", addLabel);
    $(".removeLabelEdit").on("click", function () {
        removeLabel($(this).data("index"));
    });

    labelTextHide();

    function resetFormAndHideInvalidFeedback(formId) {
        $(formId)[0].reset();
        $(formId).find("input").removeClass("is-invalid");
        $(formId).find(".invalid-feedback").addClass("hidden");
    }

    $("#showModalTax").on("click", function () {
        resetFormAndHideInvalidFeedback("#formAddTax");
    });

    $("#addTaxButton").on("click", function () {
        const taxName = $("#name_tax");
        const rate = $("#rate");
        const messageName = taxName.data("message");
        const messageRate = rate.data("message");

        let isValid = true;

        if (!taxName.val()) {
            taxName.addClass("is-invalid");
            $(messageName).removeClass("hidden").text("El nombre es requerido");
            isValid = false;
        } else {
            taxName.removeClass("is-invalid");
        }

        if (!rate.val()) {
            rate.addClass("is-invalid");
            $(messageRate)
                .removeClass("hidden")
                .text("La tasa de impuesto es requerida");
            isValid = false;
        } else {
            rate.removeClass("is-invalid");
        }

        if (isValid) {
            $.ajax({
                url: $("#formAddTax").attr("action"),
                method: "POST",
                data: $("#formAddTax").serialize(),
                success: function (response) {
                    $("#checkBoxTaxes").html(response.html);
                    $("#addTax").addClass("hidden");
                    $("body").removeClass("overflow-hidden");
                    showToast("Impuesto agregado correctamente", "success");
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });

    $("#showModalLabel").on("click", function () {
        resetFormAndHideInvalidFeedback("#formAddLabel");
    });

    $("#addLabelButton").on("click", function () {
        const labelName = $("#name_label");
        const messageName = labelName.data("message");

        if (labelName.val() === "") {
            labelName.addClass("is-invalid");
            $(messageName).removeClass("hidden").text("El nombre es requerido");
        } else {
            labelName.removeClass("is-invalid");
            $.ajax({
                url: $("#formAddLabel").attr("action"),
                method: "POST",
                data: $("#formAddLabel").serialize(),
                success: function (response) {
                    $("#labelsList").html(response.html);
                    $("#addLabel").addClass("hidden");
                    $("body").removeClass("overflow-hidden");
                    showToast("Etiqueta agregada correctamente", "success");
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });
});
