const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').js('resources/js/support-chat.js', 'public/js') 
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .webpackConfig({
        resolve: {
            extensions: ['.js', '.vue', '.json'],
            alias: {
                '@': __dirname + '/resources/js',
            },
        },
    });
