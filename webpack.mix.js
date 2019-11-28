let mix = require('laravel-mix');


mix.styles([
	'resources/assets/style/css/bootstrap.css',
    'resources/assets/style/css/icomoon.css',
    'resources/assets/style/css/flag-icon.min.css',
    'resources/assets/style/css/pace.css',
    'resources/assets/style/css/bootstrap-extended.css',
    'resources/assets/style/css/aplication.css',
    'resources/assets/style/css/colors.css',
    'resources/assets/style/css/vertical-menu.css',
    'resources/assets/style/css/vertical-overlay-menu.css',
    'resources/assets/style/css/palette-gradient.css',
    'resources/assets/style/css/style.css'
], 'public/css/miniAcademico.css')
.scripts([
	'resources/assets/style/js/jquery.min.js',
    'resources/assets/style/js/tether.min.js',
    'resources/assets/style/js/bootstrap.min.js',    
    'resources/assets/style/js/perfect-scrollbar.jquery.min.js',  
    'resources/assets/style/js/unison.min.js',
    'resources/assets/style/js/blockUI.min.js',
    'resources/assets/style/js/jquery.matchHeight-min.js',
    'resources/assets/style/js/screenfull.min.js',
    'resources/assets/style/js/pace.min.js',
    'resources/assets/style/js/app-menu.js',
    'resources/assets/style/js/appmenu.js',
    'resources/assets/style/js/dashboard-lite.js' 
], 'public/js/miniAcademico.js')
.js([
    'resources/assets/js/app.js'
], 'public/js/app.js');