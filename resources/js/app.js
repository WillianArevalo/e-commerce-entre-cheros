import "./bootstrap";
import "./jquery";
import "flowbite";
import "./loginAdmin";

$(document).ready(function () {
    const $btnToggleTheme = $("#toggleTheme");
    const $html = $("html");

    if (localStorage.getItem("theme") === "dark") {
        $html.addClass("dark");
    } else {
        $html.removeClass("dark");
    }

    $btnToggleTheme.on("click", function () {
        if ($html.hasClass("dark")) {
            $html.removeClass("dark");
            localStorage.setItem("theme", "light");
        } else {
            $html.addClass("dark");
            localStorage.setItem("theme", "dark");
        }
    });
});
