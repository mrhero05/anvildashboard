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
        colors: {
            'prsp-blue': '#282e8c',
            'prsp-blu2': '#dde3e7',
            'prsp-blue3': '#2e328adb',
            'prsp-green': '#08c847',
            'prsp-white': '#ffffff',
            'prsp-red': '#d31d1d',
            'prsp-yellow': '#eaff56',
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
