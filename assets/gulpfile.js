const gulp = require("gulp");
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const dartSass = require("gulp-dart-sass");
const autoprefixer = require("gulp-autoprefixer");
const browserSync = require("browser-sync").create();
const sourcemaps = require("gulp-sourcemaps");
const path = require("path");

// パス設定
const paths = {
  scss: {
    src: "./sass/project/*.scss",   // コンパイル対象
    watch: "./sass/**/*.scss",      // 監視対象
    dest: "./css",                  // 出力先
    map: "./css/_map",              // map 出力先
  },
  php: {
    watch: "../**/*.php",
  },
  js: {
    watch: "./js/**/*.js",
  },
};

// Sass コンパイル
function scss() {
  return gulp
    .src(paths.scss.src, { base: "./sass/project" })
    .pipe(plumber({ errorHandler: notify.onError("Sassエラー: <%= error.message %>") }))
    .pipe(sourcemaps.init())
    .pipe(
      dartSass({
        outputStyle: "expanded",
      })
    )
    .pipe(
      autoprefixer({
        cascade: false,
      })
    )
    // 修正: CSS出力先からの相対パスで map を書き出す
    .pipe(sourcemaps.write("_map"))
    .pipe(gulp.dest(paths.scss.dest))
    .pipe(browserSync.stream());
}


// ブラウザ自動リロード
function serve() {
  browserSync.init({
    proxy: "http://localhost/yadoyadaigaku",
    open: "local",
    notify: false,
  });

  gulp.watch(paths.scss.watch, scss);
  gulp.watch(paths.php.watch).on("change", browserSync.reload);
  gulp.watch(paths.js.watch).on("change", browserSync.reload);
}

// デフォルトタスク
exports.default = gulp.series(scss, serve);
