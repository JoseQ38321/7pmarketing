const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                golden: {
                    light: '#AEA699',
                    normal: '#8D816E',
                    dark: '#837868',
                },
                blue: {
                    normal: '#030317',
                },
                ham: {
                    normal: '#282828',
                },
                gray: {
                    light: "#393939",
                }
            },
            borderWidth: {
                3: '3px',
            },
            height: {
                content: 'fit-content',
                650: '650px',
                480: '480px',
            },
            width: {
                content: 'fit-content',
            },
            fill: {
                white: '#ffffff',
            },
            lineHeight: {
                150: '150px!important',
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
