let gulp = require('gulp');
let less = require('gulp-less');
let path = require('path');
let cleanCSS = require('gulp-clean-css');
let rename = require('gulp-rename');
let concat = require('gulp-concat');
let minify = require('gulp-minify');

gulp.task('less', function () {
	return gulp.src('less/styles.less')
		.pipe(less({
			paths: [ path.join(__dirname, 'less', 'includes') ]
		}))
		.pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(rename({
			suffix: ".min"
		}))
		.pipe(gulp.dest('www/css/'));
});

gulp.task('js', function () {
	return gulp.src([
		'javascript/main.js'
	])
		.pipe(concat('main.js'))
		.pipe(minify({
			ext:{
				min:'.min.js'
			}
		}))
		.pipe(gulp.dest('www/js/'));
});

gulp.task('watch', function() {
	gulp.watch('less/*.less', gulp.series('less'));
	gulp.watch('javascript/*.js', gulp.series('js'));
});
