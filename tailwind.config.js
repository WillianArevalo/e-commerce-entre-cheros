/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "var(--color-primary)",
                secondary: "var(--color-secondary)",
                tertiary: "var(--color-tertiary)",
                quaternary: "var(--color-quaternary)",
            },
            fontFamily: {
                primary: ["League Spartan", "sans-serif"],
                secondary: ["Poppins", "sans-serif"],
            },
            borderColor: {
                primary: "var(--color-primary)",
                secondary: "var(--color-secondary)",
                tertiary: "var(--color-tertiary)",
                quaternary: "var(--color-quaternary)",
            },
            textColor: {
                primary: "var(--color-primary)",
                secondary: "var(--color-secondary)",
                tertiary: "var(--color-tertiary)",
                quaternary: "var(--color-quaternary)",
            },
            backgroundColor: {
                primary: "var(--color-primary)",
                secondary: "var(--color-secondary)",
                tertiary: "var(--color-tertiary)",
                quaternary: "var(--color-quaternary)",
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("tailwindcss-animated")],
};
