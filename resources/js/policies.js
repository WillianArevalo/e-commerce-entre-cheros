import { showToast } from "./toast-admin";

$(document).ready(function () {
    $("#file-policie").on("change", function () {
        var file = $(this)[0].files[0];

        if (file && file.type === "application/pdf") {
            var fileURL = URL.createObjectURL(file);
            var previewContainer = $("#pdf-preview");
            var pdfFrame = $("#pdf-frame");

            previewContainer.show();
            pdfFrame.attr("src", fileURL);
        } else {
            showToast("El archivo seleccionado no es un PDF", "error");
            $(this).val("");
        }
    });
});
