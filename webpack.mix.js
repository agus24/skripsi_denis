let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
        "public/assetAdmin/assets/css/theme-default/bootstrap.css",
        "public/assetAdmin/assets/css/theme-default/materialadmin.css",
        "public/assetAdmin/assets/css/theme-default/font-awesome.min.css",
        "public/assetAdmin/assets/css/theme-default/material-design-iconic-font.min.css",
        "public/assetAdmin/assets/css/theme-default/libs/rickshaw/rickshaw.css",
        "public/assetAdmin/assets/css/theme-default/libs/morris/morris.core.css",
        "public/assetAdmin/assets/css/theme-default/libs/select2/select2.css",
        "public/assetAdmin/assets/css/theme-default/libs/multi-select/multi-select.css",
        "public/assetAdmin/assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css",
        "public/assetAdmin/assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css",
        "public/assetAdmin/assets/css/theme-default/libs/bootstrap-colorpicker/bootstrap-colorpicker.css",
        "public/assetAdmin/assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css",
        "public/assetAdmin/assets/css/theme-default/libs/typeahead/typeahead.css",
        "public/assetAdmin/assets/css/theme-default/libs/dropzone/dropzone-theme.css",
    ], "public/css/materialize.css")
    .styles([
        "resources/assets/css/font-awesome.min.css",
        "resources/assets/css/empor-icon.css",
        "resources/assets/css/animate.min.css",
        "resources/assets/css/bootstrap-select.min.css",
        "resources/assets/css/bootstrap-slider.min.css",
        "resources/assets/css/cubeportfolio.min.css",
        "resources/assets/css/owl.carousel.min.css",
        "resources/assets/css/settings.css",
        "resources/assets/css/bootsnav.css",
        "resources/assets/css/style.css",
    ],'public/css/frontend.css')
    .js([
        "resources/assets/js/app.js"
    ], "public/js/app.js");
