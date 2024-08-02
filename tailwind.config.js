/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#bcddf1",
                secondary: "#011b4e",
                tertiary: "#138fdc",
                quaternary: "#f6f4f1",
            },
            fontFamily: {
                primary: ["League Spartan", "sans-serif"],
                secondary: ["Poppins", "sans-serif"],
                tertiary: ["Mystical", "sans-serif"],
            },
            borderColor: {
                primary: "#bcddf1",
                secondary: "#011b4e",
                tertiary: "#138fdc",
                quaternary: "#f6f4f1",
            },
            textColor: {
                primary: "#bcddf1",
                secondary: "#011b4e",
                tertiary: "#138fdc",
                quaternary: "#f6f4f1",
            },
            backgroundColor: {
                primary: "#bcddf1",
                secondary: "#011b4e",
                tertiary: "#138fdc",
                quaternary: "#f6f4f1",
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("tailwindcss-animated")],
};
