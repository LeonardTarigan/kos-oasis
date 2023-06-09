import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "dark-blue": "#537188",
                gold: "#cbb279",
                "gold-lighter": "#e1c78c",
                tan: "#e1d4bb",
                "light-grey": "#eeeeee",
                grey: "#afafaf",
                "dark-grey": "#575757",
                black: "#1e1e1e",
                red: "#d14d72",
            },
        },
    },

    plugins: [forms],
};
