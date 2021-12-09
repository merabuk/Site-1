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

/**
 * Стили и скрипты для фронта сайта
 */
mix.js('resources/js/frontend/frontend.js', 'public/js')
    .js('resources/js/frontend/menu.js', 'public/js')
    .js('resources/js/frontend/slider.js', 'public/js')
    .js('resources/js/frontend/modals.js', 'public/js')
    .vue()
    .sass('resources/sass/frontend.scss', 'public/css')
    .version();

/**
 * Стили и скрипты для бэка сайта
 */
mix.js('resources/js/backend/backend.js', 'public/js')
    .vue()
    .sass('resources/sass/backend/backend.scss', 'public/css')
    .version();
mix.copyDirectory('resources/css/backend/plugins', 'public/css/backend/plugins');
mix.copyDirectory('resources/js/backend/plugins', 'public/js/backend/plugins');

/**
 * МаскИнпут для всего сайта
 */
mix.js('resources/js/plugins/jquery.maskedinput.js', 'public/js');

/**
 * Перенос исходников картинок сайта
 */
mix.copyDirectory('resources/images', 'public/images');
