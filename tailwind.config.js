import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                brand: {
                    DEFAULT: '#e85d04',
                    50: '#fff4eb',
                    100: '#ffe4cc',
                    200: '#ffc999',
                    300: '#ffa366',
                    400: '#ff7a33',
                    500: '#e85d04',
                    600: '#d14f00',
                    700: '#a83f00',
                    800: '#803000',
                    900: '#572100',
                },
            },
            fontFamily: {
                sans: ['Manrope', ...defaultTheme.fontFamily.sans],
                display: ['Sora', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                auth: '0 24px 64px -16px rgba(15, 23, 42, 0.18)',
                'auth-dark': '0 24px 64px -16px rgba(0, 0, 0, 0.55)',
            },
            keyframes: {
                'fade-up': {
                    '0%': { opacity: '0', transform: 'translateY(12px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                'soft-pulse': {
                    '0%, 100%': { opacity: '0.45' },
                    '50%': { opacity: '0.8' },
                },
            },
            animation: {
                'fade-up': 'fade-up 0.55s ease-out both',
                'fade-up-delay': 'fade-up 0.55s ease-out 0.12s both',
                'soft-pulse': 'soft-pulse 6s ease-in-out infinite',
            },
        },
    },

    plugins: [forms, typography],
};
