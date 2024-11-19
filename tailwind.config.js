import theme from 'tailwindcss/defaultTheme';
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1025px',
            'xl': '1250px',
            '2xl': '1536px',
        },
    },
    plugins: [
        require('tailwind-scrollbar-hide'),
        require('daisyui'),
    ],

    daisyui: {
        themes: ["pastel", "synthwave"],
    }
};
