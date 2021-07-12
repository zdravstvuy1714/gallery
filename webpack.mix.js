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

/*
 * Resources for Application.
 */
mix.styles([
    'resources/css/bulma.css',
    'resources/css/main.css'
], 'public/css/app.min.css');

mix.scripts([
    'resources/js/app.js'
], 'public/js/app.min.js');

/*
 * Resources for Admin Panel.
 */
