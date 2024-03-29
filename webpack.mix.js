const mix = require('laravel-mix');

require('dotenv').config();

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your WordPlate application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JavaScript files.
 |
 */

const theme = process.env.WP_THEME;

mix.setResourceRoot('../');
mix.setPublicPath(`public/themes/${theme}/assets`);

mix.sass('resources/styles/app.scss', 'styles');

mix.styles(
  ['node_modules/normalize.scss/normalize.scss'],
  'resources/styles/project/normalize.scss'
);

mix.js('resources/scripts/app.js', 'scripts');
mix.js('resources/scripts/heroloader.js', 'scripts');
