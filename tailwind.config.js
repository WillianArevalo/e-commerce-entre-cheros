/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");
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
                primary: {
                    DEFAULT: "var(--primary-color)", // Usamos la variable CSS como valor por defecto
                    50: "var(--primary-color-50)",
                    100: "var(--primary-color-100)",
                    200: "var(--primary-color-200)",
                    300: "var(--primary-color-300)",
                    400: "var(--primary-color-400)",
                    500: "var(--primary-color-500)",
                    600: "var(--primary-color-600)",
                    700: "var(--primary-color-700)",
                    800: "var(--primary-color-800)",
                    900: "var(--primary-color-900)",
                    950: "var(--primary-color-950)",
                },
                secondary: "var(--secondary-color-store)",
                tertiary: "var(--tertiary-color-store)",
            },
            fontFamily: {
                "league-spartan": ["League Spartan", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
                mystical: ["Mystical", "sans-serif"],
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("tailwindcss-animated")],
};
