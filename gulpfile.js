'use strict';
const gulp = require('gulp');
const sass = require('gulp-sass')(require('node-sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');

function build() {
    var plugins = [
        cssnano()
    ];
    gulp.src('./sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
//        .pipe(postcss(plugins))
        .pipe(gulp.dest('./stylesheets'));
        return Promise.resolve('complete...');
} 


exports.build = build;
exports.default = build;