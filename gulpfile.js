var gulp = require('gulp'),
    include = require('gulp-include'),
    uglify = require('gulp-uglify'),
    notify = require('gulp-notify'),
    concat = require('gulp-concat'),
    minifycss = require('gulp-minify-css');

var paths = {
  dev: {
    sass: 'resources/assets/scss/',
    js: 'resources/assets/js/',
    vendor: 'resources/assets/vendor/',
  },
  production: {
    css: 'public/css/',
    js: 'public/js/',
  }
};


// task for js
gulp.task('script', function() {
  gulp.src([
      paths.dev.js + '*.js',
      // paths.dev.vendor + 'angular/angular.min.js'
      ])
    .pipe(include())
    // .pipe(uglify())
    .pipe(concat('app.min.js'))
    .pipe(gulp.dest(paths.production.js))
    .pipe(notify({
      message: '"Script" completed!!'
    }));
});

gulp.task('bowerjs', function() {
  gulp.src(paths.dev.vendor + 'angular/angular.min.js')
    .pipe(include())
    .pipe(gulp.dest(paths.production.js))
    .pipe(notify({
      message: '"bowerjs" success!!'
    }));
});

// task for css
// gulp.task('style', function() {
//   return sass(paths.dev.scss, {
//     trace: true,
//     sourcemap: true
//   })
//   .pipe(autoprefixer({
//     browsers: ['last 2 versions'],
//     cascade: false
//   }))
//   .on('error', function(err) {
//     notify({
//       message: err.message
//     });
//   })
//   .pipe(sourcemaps.init())
//     .pipe(minifycss())
//     .pipe(sourcemaps.write())
//     .pipe(gulp.dest(paths.production.css))
//     .pipe(notify({
//       message: '"Style" completed!!'
//     }));
// });

// gulp watch
gulp.task('watch', function() {
  // gulp.watch(paths.dev.sass + '*.scss', ['style']);
  gulp.watch(paths.dev.js + '*.js', ['script']);
});

gulp.task('default', [
    'script',
    'bowerjs',
    // 'style',
    'watch'
    ]);
