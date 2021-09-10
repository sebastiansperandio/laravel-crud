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

mix.setPublicPath('public')
    .setResourceRoot('../') // Turns assets paths in css relative to css file
    .vue()
    .sass('resources/sass/frontend/app.scss', 'css/frontend.css')
    .sass('resources/sass/backend/app.scss', 'css/backend.css')
    .js('resources/js/frontend/app.js', 'js/frontend.js')
    .js('resources/js/backend/app.js', 'js/backend.js')
    .js('resources/js/frontend/actions_functions.js', 'js/actions_functions.js')
    .js('resources/js/frontend/create_contact.js', 'js/create_contact.js')
    .js('resources/js/frontend/edit_contact.js', 'js/edit_contact.js')
    .js('resources/js/frontend/list_contacts.js', 'js/list_contacts.js')
    .extract([
        'alpinejs',
        'jquery',
        'bootstrap',
        'popper.js',
        'axios',
        'sweetalert2',
        'lodash'
    ])
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}
