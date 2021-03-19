const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync("http://localhost:8000")
    .disableNotifications();
