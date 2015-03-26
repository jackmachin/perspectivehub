/*global require*/

var gulp = require('gulp');

// Include Our Plugins
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var minifyCSS = require('gulp-minify-css');


gulp.task('css', function () {
    "use strict";
    return gulp.src('*.css')
        .pipe(minifyCSS())
        .pipe(rename('style.min.css'));
});

// Concatenate & Minify JS
gulp.task('scripts', function () {
    "use strict";
    return gulp.src('/js/*.js')
        .pipe(uglify())
        .pipe(concat('scripts.js'))
        .pipe(rename('scripts.min.js'))
        .pipe(gulp.dest('/js/min'));
});

gulp.task('watch', function () {
    "use strict";
    gulp.watch('./js/*.js', ['lint', 'scripts']);
    gulp.watch('./js/**/*.js', ['lint', 'scripts']);
    gulp.watch('./scss/*.scss', ['sass']);
    gulp.watch('./scss/**/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['lint', 'css', 'scripts', 'watch']);
