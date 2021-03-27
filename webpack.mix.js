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

mix.setPublicPath('public');

// mix.copy("resources/js/Slick.js", "public/js/slick.js");
// mix.combine([
//     "resources/js/Main.js",
//     "resources/js/CustomElements/Logout.js",
// ], "public/js/main.js");

// mix.js('resources/js/app.js', 'js');

// Auths JS
// mix.js('resources/js/auths/login.js', 'js');
// mix.js('resources/js/auths/register.js', 'js');
// mix.js('resources/js/auths/new-password.js', 'js');
// mix.js('resources/js/auths/forgot-password.js', 'js');
mix.js('resources/js/auths/reset-password.js', 'js');

if (mix.inProduction()) {
    mix.minify([
        'js/login.js',
        'js/register.js',
        'js/new-password.js',
        'js/forgot-password.js',
        'js/reset-password.js',
    ]);
    mix.version();
}