import { openDrawer, closeDrawer } from "./drawer";
import { showToast } from "./toast-admin";

$(document).ready(function () {
    $("#create-user").on("change", function () {
        if ($(this).is(":checked")) {
            $("#tab-user").show();
        } else {
            $("#tab-user").hide();
        }
    });

    $(document).on("click", ".editAddress", function () {
        const href = $(this).data("href");
        const action = $(this).data("action");
        $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
                if (response.success) {
                    openDrawer("#drawer-edit-address");
                    var data = response ? Object.values(response) : [];

                    data[1].default === 1
                        ? $("#default").prop("checked", true)
                        : $("#default").prop("checked", false);

                    data[1].active === 1
                        ? $("#active").prop("checked", true)
                        : $("#active").prop("checked", false);

                    $.each(data[1], function (key, value) {
                        $("[id='" + key + "']").val(value);
                    });
                    $("#form-edit-address").attr("action", action);
                }
            },
            error: function (response) {
                console.log(response);
            },
        });
    });
});
