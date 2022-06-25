const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            height: {
                '128': '32rem',
                '116': '29rem',
                '134': '34rem',
                '184': '46rem',
                '160': '40rem',
                '180': '45rem'
            },
            width: {
                '134': '34rem',
                '256': '64rem',
            },
            backgroundImage: {
                'split-white-red': 'linear-gradient(to bottom, white 50%, #991b1b 50%)'
            },
            borderWidth: {
                DEFAULT: '1px',
                '0': '0',
                '2': '2px',
                '3': '3px',
                '4': '4px',
                '6': '6px',
                '8': '8px',
            },
            colors: {
                'logo-blue': '#3472df',
            },

        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('tailwindcss-textshadow')],
};
