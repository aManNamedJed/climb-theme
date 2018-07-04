let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'dist/js')
   .sass('resources/assets/sass/style.scss', 'dist/css')
   .setPublicPath('dist')
   .browserSync('https://climb.test');