var gulp = require('gulp'),
    order = require('gulp-order'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    minifyCSS = require('gulp-minify-css'),
    autoprefixer = require('gulp-autoprefixer');

gulp.task('site-js', function () {
    return gulp.src('app/assets/js/site/**/*.js')
        .pipe(order([
            "plugins/jquery.blueimp-gallery.min.js",
            "plugins/bootstrap-image-gallery.js",
            "plugins/*.js",
            "divide.js"
        ]))
        .pipe(concat("divide.min.js"))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));
});

gulp.task('admin-js', function () {
    return gulp.src('app/assets/js/admin/**/*.js')
        .pipe(order([
            "plugins/*.js",
            "plugins/jquery.tablesorter.min.js",
            "plugins/jquery.tablesorter.pager.min.js",
            "plugins/jquery.tablesorter.widgets.min.js",
            "plugins/summernote.min.js",
            "plugins/summernote-hu-HU.js",
            "divide-admin.js"
        ]))
        .pipe(concat("divide-admin.min.js"))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));
});

gulp.task('site-css', function () {
    return gulp.src('app/assets/css/site/**/*.css')
        .pipe(order([
            "plugins/blueimp-gallery.css",
            "plugins/bootstrap-image-gallery.min.css",
            "plugins/*.css",
            "divide.css"
        ]))
        .pipe(autoprefixer({
            browsers: ['last 5 versions'],
            cascade: false
        }))
        .pipe(concat("divide.min.css"))
        .pipe(minifyCSS({keepSpecialComments: 0}))
        .pipe(gulp.dest('public/css'));
});

gulp.task('admin-css', function () {
    return gulp.src('app/assets/css/admin/**/*.css')
        .pipe(order([
            "plugins/alertify.core.css",
            "plugins/alertify.bootstrap.css",
            "plugins/summernote.css",
            "plugins/summernote-bs3.css",
            "plugins/*.css",
            "divide-admin.css"
        ]))
        .pipe(autoprefixer({
            browsers: ['last 5 versions'],
            cascade: false
        }))
        .pipe(concat("divide-admin.min.css"))
        .pipe(minifyCSS({keepSpecialComments: 0}))
        .pipe(gulp.dest('public/css'));
});

gulp.task('watch', function () {
    gulp.run('site-css');
    gulp.watch('app/assets/css/site/**/*.css', ['site-css']);
    gulp.watch('app/assets/js/site/**/*.js', ['site-js']);
    gulp.watch('app/assets/css/admin/**/*.css',['admin-css']);
});


gulp.task('watch-site-css', function () {
    gulp.run('site-css');
    gulp.watch('app/assets/css/site/**/*.css', ['site-css']);
});

gulp.task('watch-site-js', function () {
    gulp.run('site-js');
    gulp.watch('app/assets/js/site/**/*.js', ['site-js']);
});


gulp.task('watch-admin-css', function () {
    gulp.run('admin-css');
    gulp.watch('app/assets/css/admin/**/*.css',['admin-css']);
});


