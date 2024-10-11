import { openDrawer } from "./drawer";

$(document).ready(function () {
    $("#btn-nav-sales").on("click", function () {
        $("#overlay").toggleClass("hidden");
        $("#drawer-sales").toggleClass("transform-none");
        $("#drawer-sales").toggleClass("-translate-x-full");
    });

    $("#overlay").on("click", function () {
        $("#overlay").addClass("hidden");
        $("#drawer-sales")
            .removeClass("transform-none")
            .addClass("-translate-x-full");
    });

    let ids = $("#parameters_ids");
    let names = $("#parameters_names");
    let parameters = names.val() ? names.val().split(",") : [];
    let parameters_ids = ids.val() ? ids.val().split(",") : [];

    $(document).on("click", ".showCoupon", function () {
        $("#show-coupon-content").html("");
        var href = $(this).data("href");
        console.log(href);
        $.ajax({
            url: href,
            type: "GET",
            success: function (response) {
                console.log(response.coupon);
                $("#show-coupon-content").html(response.html);
                openDrawer("#drawer-show-coupon");
            },
        });
    });

    /* Agregar cupón */
    $("#predefined_rule").on("Changed", function () {
        const rule = $(this).val();
        $(".rules").addClass("hidden");
        toggleElementVisibility($("." + rule), rule !== "");
        parameters = [];
        parameters_ids = [];
        $("#containerParameters").html("");
        $("#parametersPreview").html("");
    });

    $(".add-parameter").on("click", function () {
        const input = $(this).data("input");
        addParameter(input);
    });

    function addParameter(input) {
        let parameterValue = $(input).val();
        if (parameterValue && !parameters_ids.includes(parameterValue)) {
            parameters.push($(input + "_selected").text());
            parameters_ids.push(parameterValue);
            updateHiddenParameters();
            updatePreviewParameters();
        } else {
            alert("El parámetro ya fue agregado");
        }
    }

    function updateHiddenParameters() {
        const containerPrameters = $("#containerParameters");
        containerPrameters.html("");
        parameters_ids.forEach((parameterValue) => {
            containerPrameters.append(
                $("<input>")
                    .attr({ type: "hidden", name: "parameters[]" })
                    .val(parameterValue),
            );
        });
    }

    function updatePreviewParameters() {
        const $paramatersPreview = $("#parametersPreview");
        $paramatersPreview.removeClass("hidden").addClass("flex");
        $paramatersPreview.html("");
        parameters.forEach((parameterValue, index) => {
            const previewDiv = $("<div></div>").addClass(
                "bg-white text-zinc-600 border-zinc-400 text-sm font-medium me-2 px-4 py-2 border dark:text-white dark:bg-black dark:border-zinc-800 rounded-full flex items-center justify-between gap-2 w-max",
            );
            const parameterElement = $("<span></span>").text(parameterValue);
            const removeBtn = $("<button></button>")
                .html(
                    '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-current" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none"> <path d="M19.0005 4.99988L5.00049 18.9999M5.00049 4.99988L19.0005 18.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>',
                )
                .attr("type", "button")
                .addClass(
                    "text-current dark:hover:text-blue-500 hover:text-blue-500",
                );
            removeBtn.on("click", () => removeParameter(index));
            previewDiv.append(parameterElement).append(removeBtn);
            $paramatersPreview.append(previewDiv);
        });
    }

    function removeParameter(index) {
        parameters.splice(index, 1);
        parameters_ids.splice(index, 1);
        updateHiddenParameters();
        updatePreviewParameters();
    }

    function toggleElementVisibility(element, condition) {
        if (condition) {
            element.removeClass("hidden");
        } else {
            element.addClass("hidden");
        }
    }

    $(".remove-parameter").on("click", function () {
        let id = $(this).data("parameter");
        let parameters_ids = $("#parameters_ids").val().split(",");
        console.info(parameters_ids);
        if (parameters_ids.includes(id.toString())) {
            const index = parameters_ids.indexOf(id.toString());
            removeParameter(index);
        } else {
            alert("El parámetro no existe");
        }
    });

    toggleElementVisibility($("." + $("#predefined_rule").val()), true);

    function handleEditMethod(buttonClass, drawerId, formId, checkboxId) {
        $(buttonClass).on("click", function () {
            var action = $(this).data("action");
            var href = $(this).data("href");

            $.ajax({
                url: href,
                type: "GET",
                success: function (data) {
                    var dataObject = data ? Object.values(data)[0] : null;
                    if (dataObject) {
                        openDrawer(drawerId);

                        if (dataObject.active !== undefined) {
                            $("#active").prop(
                                "checked",
                                dataObject.active === 1,
                            );
                        }

                        if (dataObject.is_default !== undefined) {
                            $("#is_default").prop(
                                "checked",
                                dataObject.is_default === 1,
                            );
                        }

                        if (dataObject.auto_update !== undefined) {
                            $("#auto_update").prop(
                                "checked",
                                dataObject.auto_update === 1,
                            );
                        }

                        // Actualizar la imagen de previsualización si existe
                        if (dataObject.image !== undefined) {
                            $("#previewImageEdit").attr(
                                "src",
                                dataObject.image,
                            );
                        }

                        // Rellenar el formulario con los datos recibidos
                        $.each(dataObject, function (key, value) {
                            $("[id='" + key + "']").val(value);
                        });

                        // Establecer la acción del formulario
                        $(formId).attr("action", action);
                    } else {
                        console.error(
                            "No se encontró un objeto válido en la respuesta:",
                            data,
                        );
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", status, error);
                },
            });
        });
    }

    // Aplicar la función genérica a los diferentes métodos
    handleEditMethod(
        ".btnEditShippingMethod",
        "#drawer-edit-method",
        "#formEditMethod",
        "is_active",
    );

    handleEditMethod(
        ".btnEditPaymentMethod",
        "#drawer-edit-method",
        "#formEditPaymentMethod",
        "active",
    );

    handleEditMethod(
        ".btnEditCurrency",
        "#drawer-edit-currency",
        "#formEditCurrency",
        "active",
    );

    $("#imagePaymentMehod").on("change", function () {
        showPreviewImage(this, "#previewImage");
    });

    $("#imagePaymentMehodEdit").on("change", function () {
        showPreviewImage(this, "#previewImageEdit");
    });

    function showPreviewImage(image, preview) {
        $(image).prev().addClass("hidden");
        const $preview = $(preview);
        $preview.removeClass("hidden");
        let archive = image.files[0];
        if (archive) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $preview.attr("src", e.target.result);
            };
            reader.readAsDataURL(archive);
        }
    }

    $(document).on("click", ".showMethod", function () {
        $("#show-method-content").html("");
        var href = $(this).data("href");
        $.ajax({
            url: href,
            type: "GET",
            success: function (response) {
                console.log(response.coupon);
                $("#show-method-content").html(response.html);
                openDrawer("#drawer-details-method");
            },
        });
    });
});
