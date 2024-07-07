$(document).ready(function () {
    $(".toggleShow").on("change", function () {
        const form = $($(this).data("form"));
        const isChecked = $(this).is(":checked");
        const changeType = $(this).data("change");
        $(this).val(isChecked ? 1 : 0);
        // Si el checkbox no está marcado y quieres enviar explícitamente un valor cuando no está marcado

        if (!isChecked) {
            if (changeType === "show") {
                form.append(
                    '<input type="hidden" name="is_showing" value="0">'
                );
            } else {
                form.append('<input type="hidden" name="is_active" value="0">');
            }
        }

        const url = form.attr("action");
        const data = form.serialize();

        console.log(data);
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
