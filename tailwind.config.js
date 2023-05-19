const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    darkMode: "class",

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },

            colors: {
                dark: {
                    "eval-0": "#151823",
                    "eval-1": "#222738",
                    "eval-2": "#2A2F42",
                    "eval-3": "#2C3142",
                },
            },
            backgroundImage: {
                backgorund:
                    "url('public/assets/background/loginBackgorund.jpg')",
            },
        },
        screens: {
            "2xl": { min: "1535px" },
            xl: { min: "1280px" },
            lg: { min: "1024px" },
            md: { min: "768px" },
            sm: { min: "640px" },
            xs: { min: "0px" },
        },
    },

    plugins: [require("@tailwindcss/forms")],
    plugins: [require("flowbite/plugin")],
    plugins: [require("tw-elements/dist/plugin.cjs")],
};
