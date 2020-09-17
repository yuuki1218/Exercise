const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/styles/styles.scss", "public/css/styles")
    .sass("resources/sass/styles/calendarstyles.scss", "public/css/styles")
    .sass("resources/sass/styles/exercisestyles.scss", "public/css/styles");

// .sass("resources/sass/styles/app.scss", "public/css")
// .sass("resources/sass/styles/breakpoints", "public/css/styles/breakpoints");
