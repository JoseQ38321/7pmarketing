const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .copy('node_modules/material-icons/css/material-icons.min.css', 'public/css/material-icons.min.css')
    .js('resources/js/dropzone.js', 'public/js')
    .postCss('resources/css/dropzone.css', 'public/css', [
        require('postcss-import')
    ]);

if (mix.inProduction()) {
    mix.version();
}
