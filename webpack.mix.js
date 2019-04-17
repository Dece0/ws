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
    //.js('node_modules/vue/dist/vue.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css/app.min.css')
    .options({
      processCssUrls: true
   });

   mix.options({
    extractVueStyles: false,
    processCssUrls: true,
    uglify: {},
    purifyCss: false,
    //purifyCss: {},
    postCss: [require('autoprefixer')],
    clearConsole: false
});