let mix = require('laravel-mix');

mix.sass('resources/css/app.scss', 'public/css/app.css')
    .js('resources/js/app.js', 'public/js/app.js');
