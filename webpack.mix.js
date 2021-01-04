const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/frontend/app.js', 'public/frontend/js')
    .js('resources/js/backend/app.js', 'public/backend/js')
    // .sass('resources/sass/app.scss', 'public/css');
    .sass('resources/sass/frontend/style.scss', 'public/frontend/css')
    .sass('resources/sass/backend/style.scss', 'public/backend/css');
