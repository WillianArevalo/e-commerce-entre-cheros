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
                primary: "var(--primary-color)",
                secondary: "var(--secondary-color)",
                tertiary: "var(--tertiary-color)",

                "primary-store": "var(--primary-color-store)",
                "secondary-store": "var(--secondary-color-store)",
                "tertiary-store": "var(--tertiary-color-store)",
            },
            fontFamily: {
                "league-spartan": ["League Spartan", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
                mystical: ["Mystical", "sans-serif"],
            },
            borderColor: {
                primary: "var(--primary-color)",
                secondary: "var(--secondary-color)",
                tertiary: "var(--tertiary-color)",

                "primary-store": "var(--primary-color-store)",
                "secondary-store": "var(--secondary-color-store)",
                "tertiary-store": "var(--tertiary-color-store)",
            },
            textColor: {
                primary: "var(--primary-color)",
                secondary: "var(--secondary-color)",
                tertiary: "var(--tertiary-color)",

                "primary-store": "var(--primary-color-store)",
                "secondary-store": "var(--secondary-color-store)",
                "tertiary-store": "var(--tertiary-color-store)",
            },
            backgroundColor: {
                primary: "var(--primary-color)",
                secondary: "var(--secondary-color)",
                tertiary: "var(--tertiary-color)",

                "primary-store": "var(--primary-color-store)",
                "secondary-store": "var(--secondary-color-store)",
                "tertiary-store": "var(--tertiary-color-store)",
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("tailwindcss-animated")],
};
