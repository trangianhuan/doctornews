let mix = require('laravel-mix');

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
   .copy('resources/assets/css', 'public/css', false)
   .copy('resources/assets/js/mock', 'public/js', false)
   .copy('resources/assets/fonts', 'public/fonts', false)
   .js('resources/assets/js/admin/department.js', 'public/js', false)
   .js('resources/assets/js/admin/service.js', 'public/js', false);
