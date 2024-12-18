const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('autoprefixer'),
   ])
   .sourceMaps();

if (mix.inProduction()) {
   mix.version();
}