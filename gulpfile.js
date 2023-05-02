'use strict';
const gulp = require('gulp');
const sass = require('gulp-dart-sass');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
var del = require('del');


var paths = {
  styles: {
    src: './gulp-src/sass/**/*.scss',
    dest: './assets/css'
  },
  scripts: {
    src: './gulp-src/scripts/**/*.js',
    dest: './assets/js'
  }
};

function clean() {
  // You can use multiple globbing patterns as you would with `gulp.src`,
  // for example if you are using del 2.0 or above, return its promise
  return del([ 'assets/css' ]);
}

function styles() {
    return gulp.src(paths.styles.src)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(paths.styles.dest));
} 

function scripts() {
  return gulp.src(paths.scripts.src, { sourcemaps: true })
    .pipe(babel())
    .pipe(uglify())
    .pipe(concat('main.min.js'))
    .pipe(gulp.dest(paths.scripts.dest));
}


function minify() {
  var plugins = [
    cssnano()
  ];

  return gulp.src(paths.styles.dest + '/**/*.css')
    .pipe(postcss(plugins))
    .pipe(gulp.dest(paths.styles.dest));
}

var buildAll = gulp.series(styles);

exports.clean = clean
exports.minify = minify
exports.build = gulp.series(clean, buildAll, minify);
exports.default = buildAll;