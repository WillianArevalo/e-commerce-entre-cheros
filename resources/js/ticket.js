$(document).ready(function () {
    $(".assign-ticket").on("click", function () {
        const form = $(this).closest("form");
        const asigne = $(this).data("user");
        form.append(
            `<input type="hidden" name="assigned_to" value="${asigne}">`,
        );
        form.submit();
    });

    //Store

    let imageIndex = 0;
    const $previewImages = $("#previewImages");

    $("#attachments").on("change", function (e) {
        const files = e.target.files;
        Array.from(files).forEach((file) => {
            if (file && file.type.startsWith("image/")) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    imageIndex++;
                    const imgSrc = e.target.result;

                    const imgPreview = ` 
                        <div class="relative border border-zinc-200 rounded-xl w-max animate-jump-in" id="image-${imageIndex}">
                            <img src="${imgSrc}" alt="Imagen seleccionada" class="w-32 h-32 object-cover rounded-xl">
                            <button type="button" data-id="image-${imageIndex}" class="absolute top-1 w-6 h-6 right-1 bg-red-500 text-white rounded-full p-1 deleteImage">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
                                    <path d="M19.0005 4.99988L5.00049 18.9999M5.00049 4.99988L19.0005 18.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>`;

                    $previewImages.append(imgPreview);
                };
                reader.readAsDataURL(file);
            }
        });
        $previewImages.find("p").remove();
        $previewImages.removeClass("h-32 justify-center").addClass("h-auto");
        //$(this).val("");
    });

    $(document).on("click", ".deleteImage", function () {
        const imageId = $(this).data("id");
        const $imageElement = $(`#${imageId}`);
        $imageElement.addClass("animate-jump-out");

        $imageElement.on("animationend", function () {
            $imageElement.remove();
            if ($previewImages.children().length === 0) {
                $previewImages
                    .removeClass("h-auto")
                    .addClass("h-32 justify-center");
                $previewImages.append(
                    "<p class='text-sm text-gray-500'>No se han seleccionado imágenes</p>",
                );
            }
        });
    });

    $("#add_comment").on("change", function () {
        let isCheck = $(this).is(":checked");
        if (isCheck) {
            $("#comment-container").removeClass("hidden");
        } else {
            $("#comment-container").addClass("hidden");
        }
    });
});
