'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass')(require('node-sass'));
var postcss = require('gulp-postcss');
var cssnano = require('cssnano');

gulp.task('sass', function () {
    var plugins = [
        cssnano()
    ];
    gulp.src('./sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
//        .pipe(postcss(plugins))
        .pipe(gulp.dest('./stylesheets'));
});
