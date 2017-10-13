"use strict";

var gulp = require('gulp'),
sass = require('gulp-sass'),
jshint = require('gulp-jshint'),
concat = require('gulp-concat'),
path = require('path'),
cleanCSS = require('gulp-clean-css'),
imagemin = require('gulp-imagemin'),
plumber = require('gulp-plumber'),
notify = require('gulp-notify'),
browserSync = require('browser-sync').create(),
fs = require('node-fs'),
fse = require('fs-extra'),
json = require('json-file'),
uglify = require('gulp-uglify'),
themeName = json.read('./package.json').get('name'),
siteName = json.read('./package.json').get('siteName'),
themeDir = '../' + themeName,
plumberErrorHandler = { errorHandler: notify.onError({
 
    title: 'Gulp',
 
    message: 'Error: <%= error.message %>'
 
  })
 
};

gulp.task('default', function(){
 
    console.log('default gulp task...');
 
});

gulp.task('default', ['sass', 'js', 'imgPress', 'watch', 'browser-sync']);

gulp.task('init', function() {
 
  fs.mkdirSync(themeDir, 765, true);
 
  fse.copySync('theme-boilerplate', themeDir + '/');
 
});

// Static server
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: 'localhost/' + siteName,
        port: 80
    });
});

gulp.task('sass', function () {
 
    gulp.src('./src/sass/*.scss')

    	.pipe(plumber(plumberErrorHandler))
 
       .pipe(sass())

       .pipe(cleanCSS())

       .pipe(concat('style.min.css'))
 
       .pipe(gulp.dest('./assets/css'))

       .pipe(browserSync.stream({match: '**/*.css'}))

       .pipe(notify({
          message: "✔︎ CSS task complete",
          onLast: true
        }));
 
});
 

gulp.task('js', function () {
 
	gulp.src('./src/js/*.js')

		.pipe(plumber(plumberErrorHandler))
 
		.pipe(jshint())
 
		.pipe(jshint.reporter('fail'))

		.pipe(uglify())
		 
		.pipe(concat(themeName + '.min.js'))
		 
		.pipe(gulp.dest('./assets/js'))

		.pipe(browserSync.stream({match: '**/*.js'}))

              .pipe(notify({
                message: "✔︎ JS task complete",
                onLast: true
              }));
 
});

gulp.task('imgPress', function() {
 
  gulp.src('./src/images/*.{png,jpg,gif}')

	.pipe(plumber(plumberErrorHandler))
 
	.pipe(imagemin({
 
      		optimizationLevel: 7,
 
      		progressive: true
 
    	}))
 
    	.pipe(gulp.dest('./assets/images'))

    	.pipe(browserSync.stream({match: '**/*.{png,jpg,gif}'}))

       .pipe(notify({
          message: "✔︎ IMG task complete",
          onLast: true
        }));
 
});

gulp.task('watch', function() {

	gulp.watch('**/*.php').on('change', browserSync.reload);
 
	gulp.watch('./src/sass/*.scss', ['sass']).on('change', browserSync.reload);
 
	gulp.watch('./src/js/*.js', ['js']).on('change', browserSync.reload);
 
	gulp.watch('./src/images/*.{png,jpg,gif}', ['imgPress']).on('change', browserSync.reload);
 
});