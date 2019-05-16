const { mix } = require('laravel-mix');

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
// Back-end
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
   
mix.js('resources/assets/js/teacher.js', 'public/js');
mix.js('resources/assets/js/student.js', 'public/js');


mix.js([
	'public/js/bootstrap-progressbar.min.js',
	'public/js/gentalella.min.js',
	'public/js/admin_custom.js',
	], 'public/js/admin.js');

mix.js('resources/assets/js/site.js', 'public/js');


//for admin
mix.styles([
		'public/css/bootstrap.min.css',
		'public/css/font-awesome.min.css',
		'public/site/css/animate.css',
		'public/css/gentalella.min.css',
		'public/css/admin_custom.css'
	], 'public/css/admin.css')

//for site
mix.styles([
		'public/css/bootstrap.min.css',
		'public/site/css/custom.css',
		'public/css/narrow.css',
		'public/css/font-awesome.min.css',
		'public/site/css/animate.css',
		'public/css/bootstrap-datetimepicker.min.css',
	], 'public/css/site.css')

// for student
mix.styles([
		'public/css/bootstrap.min.css',
		'public/css/font-awesome.min.css',
		'public/css/flat-ui.min.css',
		'public/css/student_custom.css',
	],'public/css/student.css');

