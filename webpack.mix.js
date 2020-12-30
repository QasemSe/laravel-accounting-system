const mix = require('laravel-mix');
const exec = require('child_process').exec;
require("laravel-mix-purgecss")

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

mix.sass('resources/sass/dashboard/app.scss', 'public/assets/dashboard/css')
    .js('resources/js/app.js', 'public/assets/js')
    .purgeCss({
        enabled: false,
    })
    .then(() => {
        exec('rtlcss public/assets/dashboard/css/app.css ./public/assets/dashboard/css/app-rtl.css');
    })
;
