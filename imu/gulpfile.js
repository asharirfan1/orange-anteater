var elixir = require('laravel-elixir');
var postStylus = require('poststylus');

require('laravel-elixir-livereload');
require('laravel-elixir-stylus');

elixir(function(mix) {

    mix
        .coffee('app.coffee')
        .stylus('app.styl', null, {
            use: [
                postStylus( [ 'autoprefixer', 'lost', 'rucksack-css' ] )
            ]
        })
        .livereload();

    mix
        .copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts')
        .copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
        .copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
        .copy('node_modules/font-awesome/css/font-awesome.css', 'public/css/font-awesome.css')
        .copy('node_modules/font-awesome/fonts', 'public/fonts')
        .copy('node_modules/fuelux/dist/fonts', 'public/fonts')
        .copy('node_modules/fuelux/dist/css/fuelux.min.css', 'public/css')
        .copy('node_modules/fuelux/dist/js/fuelux.min.js', 'public/js')
        .copy('node_modules/requirejs/require.js', 'public/js')
        .copy('node_modules/moment/min/moment.min.js', 'public/js')
        .copy('node_modules/gmaps/gmaps.min.js', 'public/js')
        .copy('node_modules/slick-carousel/slick/slick.css', 'public/css')
        .copy('node_modules/slick-carousel/slick/slick-theme.css', 'public/css')
        .copy('node_modules/slick-carousel/slick/slick.min.js', 'public/js')
        .copy('node_modules/gmaps/gmaps.min.js', 'public/js')
        .copy('bower_components/fancybox/source/*.png', 'public/css/fancybox')
        .copy('bower_components/fancybox/source/*.gif', 'public/css/fancybox')
        .copy('bower_components/fancybox/source/jquery.fancybox.css', 'public/css/fancybox')
        .copy('bower_components/fancybox/source/jquery.fancybox.pack.js', 'public/js')
        .copy('bower_components/magnific-popup/dist/magnific-popup.css', 'public/css')
        .copy('bower_components/magnific-popup/dist/jquery.magnific-popup.min.js', 'public/js')
});

