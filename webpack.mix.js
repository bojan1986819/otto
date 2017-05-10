const { mix } = require('laravel-mix');

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
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    .scripts([
        'resources/assets/js/phpgrid/grid.locale-hu.js',
        'resources/assets/js/phpgrid/jquery.jqGrid.min.js',
        'resources/assets/js/phpgrid/jquery-ui.custom.min.js'
        ],'public/js/vendor.js')
    .scripts('resources/assets/js/all.js', 'public/js/all.js')
    // .styles([
    //     'resources/assets/css/phpgrid/jquery-ui.custom.css',
    //     'resources/assets/css/phpgrid/ui.jqgrid.css'
    // ],'public/css/vendor.css')
;
mix.styles(['resources/assets/css/slim.css','resources/assets/css/lightbox.min.css'], 'public/css/vendor.css');

