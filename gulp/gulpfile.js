//requeremos o módulo do gulp, assim como devemos fazer com qualquer outro módulo que pretendemos utilizar
var gulp = require('gulp'),
	sass = require('gulp-ruby-sass'),
	prefix = require('gulp-autoprefixer'),
	minifycss = require('gulp-minify-css'),
	refresh = require('gulp-livereload'),
	server = require('tiny-lr')();

gulp.task('compileStyles', function(){
	gulp.src('style.scss')
		.pipe(sass({
			noCache: true,
			precision: 4,
			unixNewlines: true
		}))

		.pipe(prefix('last 3 version'))

		.pipe(minifycss())

		.pipe(refresh(server));
});

gulp.task('watch', function(){
	server.listen(35729, function( err ){
		if (err){
			return console.log(err);
		}

		gulp.watch('*.{sass,scss}', [
			'compileStyles'
		]);
	});
});