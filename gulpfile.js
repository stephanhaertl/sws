globalThis = global;
const gulp = require('gulp');
const imagemin = require('gulp-imagemin');
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const rename = require("gulp-rename");
const autoprefixer = require('autoprefixer');
const htmlmin = require('gulp-htmlmin');
const { src, series, parallel, dest, watch } = require('gulp');

const jsPath = 'assets/js/**/*.js';
const cssPath = 'assets/css/**/*.css';
const fontPath = 'assets/vendor/bootstrap-icons/fonts';

var vendorCSS = [  
  'assets/vendor/bootstrap/css/bootstrap.min.css',
  'assets/vendor/bootstrap-icons/bootstrap-icons.css',
  'assets/vendor/aos/aos.css',
  'assets/vendor/glightbox/css/glightbox.min.css',
  'assets/vendor/swiper/swiper-bundle.min.css',
  'assets/css/variables.css',
  'assets/css/main.css',
]

var vendorJs = [
  'assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
  'assets/vendor/aos/aos.js',
  'assets/vendor/glightbox/js/glightbox.min.js',
  'assets/vendor/isotope-layout/isotope.pkgd.min.js',
  'assets/vendor/swiper/swiper-bundle.min.js',
  'assets/vendor/php-email-form/validate.js',
  'assets/js/main.js',
]


function copyHtml() {
  return src('src/*.html').pipe(gulp.dest('dist'));
}

function imgTask() {
  return src('assets/img/*').pipe(imagemin()).pipe(gulp.dest('dist/img'));
}

function jsVendorTask(){
  return src(vendorJs)
    .pipe(sourcemaps.init())
    .pipe(concat('vendor.js'))
    .pipe(terser())
    //.pipe(sourcemaps.write('.'))
    //.pipe(rename('vendor.min.js'))
    .pipe(dest('dist/js'));
}

function cssTask() {
  return src(cssPath)
    .pipe(sourcemaps.init())
    .pipe(concat('style.css'))
    .pipe(postcss([autoprefixer(), cssnano()])) //not all plugins work with postcss only the ones mentioned in their documentation
    //.pipe(sourcemaps.write('.'))
    .pipe(dest('dist/css'));
}

function cssVendorTask() {
  return src(vendorCSS)
    .pipe(sourcemaps.init())
    .pipe(concat('style.css'))
    .pipe(postcss([autoprefixer(), cssnano()])) //not all plugins work with postcss only the ones mentioned in their documentation
    //.pipe(sourcemaps.write('.'))
    .pipe(dest('dist/css'));
}

function fontTask() {
  return src(fontPath + '/**/*.{eot,svg,ttf,woff,woff2}')
    .pipe(dest('dist/fonts'));
};


function htmlTask() {
  return src('site/templates/*.php')
    .pipe(htmlmin({ collapseWhitespace: true }))
    .pipe(dest('dist/html'));
};


function watchTask() {
  //watch([cssPath, jsPath], { interval: 1000 }, parallel(cssTask, jsTask));

  watch([cssPath], { interval: 1000 }, parallel(cssTask));
}

exports.cssVendorTask = cssVendorTask;
exports.jsVendorTask = jsVendorTask;
exports.imgTask = imgTask;
exports.fontTask = fontTask;
exports.htmlTask = htmlTask;
exports.copyHtml = copyHtml;
exports.default = series(
  parallel(imgTask, cssVendorTask, jsVendorTask, fontTask), //parallel(copyHtml, imgTask, jsTask, cssTask, htmlTask),
  //watchTask
);
