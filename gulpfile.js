import gulp from "gulp";
import {deleteAsync as del} from "del";
import imagemin from "gulp-imagemin";
import plumber from "gulp-plumber";
import dartSass from "sass";
import gulpSass from "gulp-sass";
import minifycss from "gulp-minify-css";
import babel from "gulp-babel";
import uglify from "gulp-uglify";
import rename from "gulp-rename"
import autoprefixer from "gulp-autoprefixer"
import size from "gulp-size";

const sass = gulpSass(dartSass);

const pathSrc = "src/";
const pathBuild = "build/";
export const cleanBuild = () => {
    return del(["build/*", "!build/images"]);
};

const config = {
    pathSrc: {
        style: pathSrc + "styles/**/*.scss",
        js: pathSrc + "js/**/*.*",
        fonts: pathSrc + "fonts/**/*.*",
        images: pathSrc + "images/**/*.*",
    },
    pathDest: {
        style: pathBuild + "styles/",
        js: pathBuild + "js/",
        fonts: pathBuild + "fonts/",
        images: pathBuild + "images/",
    },
    watch: {
        style: pathSrc + "scss/**/*.scss",
        js: pathSrc + "js/**/*.*",
        fonts: pathSrc + "fonts/**/*.*",
        images: pathSrc + "images/**/*.*",
    },
};

const watchFiles = () => {
    gulp.watch(config.watch.style, gulp.series(scssTask));
    gulp.watch(config.watch.js, gulp.series(jsTask));
    gulp.watch(config.watch.images, gulp.series(imgTask));
    gulp.watch(config.watch.fonts, gulp.series(fontsTask));
};

export const scssTask = () => {
    return gulp
        .src(config.pathSrc.style)
        .pipe(plumber())
        .pipe(sass())
        .pipe(
            autoprefixer({
                cascade: false,
            })
        )
        .pipe(minifycss())
        .pipe(rename({
            basename: "main",
            suffix: ".min"
        }))
        .pipe(size())
        .pipe(gulp.dest(config.pathDest.style))
};

export const jsTask = () => {
    return gulp
        .src(config.pathSrc.js)
        .pipe(plumber())
        .pipe(babel())
        .pipe(uglify())
        .pipe(rename({
            basename: "main",
            suffix: ".min"
        }))
        .pipe(size())
        .pipe(gulp.dest(config.pathDest.js));
};

export const imgTask = () => {
    return gulp
        .src(config.pathSrc.images)
        .pipe(plumber())
        .pipe(imagemin())
        .pipe(gulp.dest(config.pathDest.images))
};

const fontsTask = () => {
    return gulp
        .src(config.pathSrc.fonts)
        .pipe(plumber())
        .pipe(gulp.dest(config.pathDest.fonts))
        .pipe(size())
};

export const build = gulp.series(
    cleanBuild,
    scssTask,
    jsTask,
    fontsTask,
    imgTask
);
export const dev = gulp.series(build, gulp.parallel(watchFiles));
export default gulp.series(dev);
