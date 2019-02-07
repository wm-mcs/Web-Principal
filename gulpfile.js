var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    

     mix.sass('mixer.scss','public/css');
     mix.sass('creative_template_mixer.scss','public/css'); 
     mix.sass('admin.scss','public/css'); 

     
    mix.scripts([
        
        'Template_creative/jquery.js',
        'Template_creative/bootstrap.bundle.js',
        'Template_creative/jquery.easing.js',        
        'Template_creative/scrollreveal.js',
        'Template_creative/jquery.magnific-popup.js',
        'Template_creative/creative.js',
        'Template_creative/jquery.easing.compatibility.js',
        'Plugins/Flickity.js',
        'Customs/sliders.js',
        'Customs/team.js'

       ]);

    mix.scripts([
        
        'Template_creative/jquery.js',
        'Template_creative/bootstrap.bundle.js',
       

       ],'public/js/admin.js');


    elixir(function(mix) {
            mix.version(['css/mixer.css', 'css/creative_template_mixer.css', 'css/admin.css' ,'js/all.js','js/admin.js']); 
    });

    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/build/fonts/bootstrap');
});
