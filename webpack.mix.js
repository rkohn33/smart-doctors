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
mix.copy('resources/js/doctor.data.js', 'public/js');
mix.copy('resources/js/parsley.min.js', 'public/js');
mix.copyDirectory('node_modules/intl-tel-input/build', 'public/itel');
mix.styles(
            [
                'resources/css/custom.css',
                'resources/css/dd.css',
                'resources/css/flags.css',
                'resources/css/apppointment.css',
                'resources/css/wallet.css',
                'resources/css/header.css',
                'resources/css/availibility.css',
                'resources/css/user-profile.css',
                'resources/css/editables.css',
                'resources/css/block-selector.css',
                'resources/css/form-validation.css',
            ]
            , 'public/css/custom.css');

mix.styles([
            'resources/css/user-dashboard.css',
            'resources/css/user-consultation.css',
            'resources/css/patient-header.css'
            ], 'public/css/patient-custom.css');


