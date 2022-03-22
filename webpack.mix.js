const mix = require('laravel-mix');

const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

mix.webpackConfig({
    plugins:[
        new BrowserSyncPlugin({
            open:true,
            proxy:process.env.APP_URL,
            reload:true,
            files:['public/css/*.css', 'resources/views/**/*php']
        })
    ]
})

mix.disableNotifications();
//mix.sass('resources/sass/app.scss', 'public/css');
