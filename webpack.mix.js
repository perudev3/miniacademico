let mix = require('laravel-mix');


mix.styles([
	'resources/assets/style/css/animate.css',
    'resources/assets/style/css/bootstrap.min.css',
    'resources/assets/style/css/bootstrap-datatimepicker.min.css',
    'resources/assets/style/css/font-awesome.css',
    'resources/assets/style/css/Roboto.css',
    'resources/assets/style/css/style.css',
    'resources/assets/style/css/Sans.css',
    'resources/assets/style/css/toastr.min.css'
], 'public/css/miniAcademico.css')
.scripts([
	'resources/assets/style/js/bootstrap.min.js',    
    'resources/assets/style/js/inspinia.js',    
    'resources/assets/style/js/toastr.min.js', 
    'resources/assets/style/js/jquery.metisMenu.js', 
    'resources/assets/style/js/sparkline-demo.js',
    'resources/assets/style/js/script.js'   
], 'public/js/miniAcademico.js')
.js([
    'resources/assets/js/app.js'
], 'public/js/app.js');