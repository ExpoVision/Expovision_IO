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

mix.js([
      'resources/js/home.js',
      'resources/js/actual_offers.js',
      'resources/js/property.js',
      'resources/js/share.js',
      'resources/js/all_properties.js',
   ], 'public/js/main.js')
   .sass('resources/scss/main.scss', 'public/css/main.css')
   .sass('resources/scss/header.scss', 'public/css/header.css')
   .sass('resources/scss/pages/home.scss', 'public/css/home.css')
   .sass('resources/scss/footer.scss', 'public/css/footer.css')
   .sass('resources/scss/pages/about.scss', 'public/css/about.css')
   .sass('resources/scss/pages/services.scss', 'public/css/services.css')
   .sass('resources/scss/pages/actual_offers.scss', 'public/css/actual_offers.css')
   .sass('resources/scss/pages/contact-us.scss', 'public/css/contact-us.css')
   .sass('resources/scss/pages/property.scss', 'public/css/property.css')
   .sass('resources/scss/pages/share.scss', 'public/css/share.css')
   .sass('resources/scss/pages/all_properties.scss', 'public/css/all_properties.css')
   .sass('resources/scss/adaptive.scss', 'public/css/adaptive.css')
