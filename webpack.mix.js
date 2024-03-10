// webpack.mix.js

const mix = require('laravel-mix');

mix.disableSuccessNotifications();

mix.sass('assets/src/sass/main.scss', 'assets/dist/css/main.css')
    .options({
        processCssUrls: false
    });

mix.js('/assets/src/js/main.js', '/assets/dist/js/main.js');
