import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

   theme: {
        extend: {
            colors: {
                primary: "#38bdf8",
                accent: "#facc15",
                "background-light": "#ffffff",
                "background-soft": "#f0f9ff",
                "text-main": "#1e293b",
            },
            fontFamily: {
                display: ["Lexend", "sans-serif"],
                body: ["Comic Neue", "cursive"],
            },
            borderRadius: {
                DEFAULT: "0.5rem",
                lg: "1rem",
                xl: "1.5rem",
                full: "9999px",
            },
        },
    },

    plugins: [forms],
};
