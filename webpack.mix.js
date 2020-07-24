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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/custom.js', 'public/js');
mix.styles(
            [
                'resources/css/custom.css',
                'resources/css/dd.css',
                'resources/css/flags.css',
                'resources/css/apppointment.css',
                'resources/css/wallet.css',
                'resources/css/header.css',
                'resources/css/availibility.css',
            ]
            , 'public/css/custom.css');

// mix.styles('resources/css/wallet.css', 'public/css/wallet.css');


