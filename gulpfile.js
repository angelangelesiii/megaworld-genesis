
'use strict';

var gulp = require('gulp');
var compass = require('gulp-compass');
var minifyCSS = require('gulp-csso');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('compass', function(){
    gulp.src('sass/*.scss')
    .pipe(compass({
        sass: 'sass',
        css: 'css',
        style: 'nested'
    }))
    .pipe(autoprefixer({
        browsers: ['cover 99.5%']
    }))
    .pipe(minifyCSS())
    .pipe(gulp.dest('css/'));

    gulp.src('css/style.css')
    .pipe(gulp.dest('.'));
});

gulp.task('production', function(){
    gulp.src('css/')
    .pipe(minifyCSS())
    .pipe(gulp.dest('css/'));
});

gulp.task('watch', function(){
    gulp.watch('sass/*.scss', ['compass']);
})

gulp.task('default');