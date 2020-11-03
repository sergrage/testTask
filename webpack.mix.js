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


mix.sass('resources/app/scss/app.scss', 'public/app/css/app.css').version();
mix.js('resources/app/js/app.js', 'public/app/js/app.js').version();
// mix.copy('resources/app/img', 'public/app/img');
