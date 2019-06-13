'use strict';

const gulp       = require('gulp'),
      cssnano    = require('cssnano'),
      sass       = require('gulp-sass'),
      sourcemaps = require('gulp-sourcemaps');
const glob       = require("glob");
const path       = require('path');
const fs         = require('fs-extra');
const rtlcss     = require('rtlcss');

const babel  = require('gulp-babel');
const concat = require('gulp-concat');
const inject = require('gulp-inject');
const uglify = require('gulp-uglify');

var iconfont = require('gulp-iconfont');
var iconfontCss = require('gulp-iconfont-css');

const browserSync = require('browser-sync');

//path
const linkWebsite = 'http://localhost/wordpress/auros';

let supported = [
    'last 2 versions',
    'safari >= 8',
    'ie >= 10',
    'ff >= 20',
    'ios 6',
    'android 4'
];

gulp.task('css', function () {
    return gulp.src(['src/sass/style.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        //.pipe(cssnano({
        //    autoprefixer: {browsers: supported, add: true}
        //}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./'));
});

gulp.task('create-font', function() {
    gulp.src(['src/svg/*.svg'])
        .pipe(iconfontCss({
            fontName: 'opal-icon',
            path: 'src/svg/_template.scss',
            cssClass: 'opal-icon',
            targetPath: '../../assets/fonts/_icon.scss',
            fontPath: 'assets/fonts/'
        }))
        .pipe(iconfont({
            fontName: 'opal-icon',
            normalize: true,
            fontHeight: 1001,
            formats: ['ttf', 'eot', 'woff', 'svg', 'woff2'],
        }))
        .pipe(gulp.dest('assets/fonts/'));
});
gulp.task('watch-css', [
    'browser-sync',
    'css',
], function(){
    gulp.watch('src/sass/**/*.scss', ['css']);
});


gulp.task('watch', [
        'css',
        //'inject-file-customize',
        'babel-theme',
        // 'inject-vc-scss',
        'inject-elementor-scss',
        'browser-sync',
        //'babel-customize-preview',
        //'babel-customize-control'
        // 'create-font',
        //'css-admin',
    ],
    function () {
        //gulp.watch('src/sass/admin/admin.scss', ['css-admin']);
        gulp.watch('src/sass/**/*.scss', ['css']);
        gulp.watch('src/sass/button-animation.scss', ['css-button-animation']);
        gulp.watch('src/sass/offcanvas-menu.scss', ['css-offcanvas-menu']);

        gulp.watch('src/babel/**/*.js', ['babel-theme']);
        // Other watchers

        //Icon Font
         gulp.watch('src/**/*.svg', ['create-font']);
        gulp.watch('assets/_icon.scss', function(){
            fs.copySync('assets/_icon.scss', 'src/sass/base/_opal-icon.scss');
            console.log('done')
        });

        gulp.watch([
            'src/sass/**/*.scss',
            '!src/sass/*.scss',
            '!src/sass/base/**/*.scss',
            '!src/sass/bootstrap-v4/**/*.scss',
            '!src/sass/vendors/**/*.scss',
            '!src/sass/tippyjs/**/*.scss',
        ], ['inject-elementor-scss']);


        gulp.watch([
            'src/sass/tippyjs/**/*.scss'
        ], ['css-tippyjs']);

        //gulp.watch('./inc/**/*.php', (event) => {
        //    if (event.type !== 'changed') {
        //        gulp.start('inject-file-customize');
        //    }
        //});

        gulp.watch([]);

        gulp.watch([
            'src/babel-customize/customize.js',
            'src/babel-customize/customize/*.js',
        ], () => {
            gulp.start('babel-customize-control');
        });

        gulp.watch([
            'style.css'
        ], () => {
           gulp.start('render_color')
        });

        //gulp.watch([
        //    'src/babel-customize/preview.js',
        //    'src/babel-customize/preview/*.js',
        //], () => {
        //    gulp.start('babel-customize-preview');
        //});

        //gulp.watch('./dev/customize.xml', () => {
        //    gulp.start('customize');
        //});

        //gulp.watch('./src/babel-woocommerce/*.js', (event) => {
        //    let name = path.basename(event.path);
        //    gulp.src([
        //        './src/babel/fixjquery/before.js',
        //        event.path,
        //        './src/babel/fixjquery/after.js',
        //    ])
        //        .pipe(sourcemaps.init())
        //        .pipe(concat(name))
        //        .pipe(babel({
        //            presets: ['es2015', 'stage-0']
        //        }).on('error', function (error) {
        //            console.log(error);
        //            this.emit('end')
        //        }))
        //        .pipe(uglify())
        //        .pipe(sourcemaps.write('.'))
        //        .pipe(gulp.dest('./assets/js/woocommerce/'))
        //        .on('end', () => {
        //            console.log('end');
        //        })
        //})

        gulp.watch('./src/babel/*.js', () => {
            gulp.start('babel-theme');
        })

    });

// ========================================================================
// ========================================================================
//                            Customize
// ========================================================================
// ========================================================================
gulp.task('customize', () => {
    require('./dev/customize')();
});

gulp.task('inject-elementor-scss', () => {
    return gulp.src('src/sass/_elementor.scss')
               .pipe(inject(
                   gulp.src([
                       'src/sass/elementor/*.scss'
                   ], {read: false}), {
                       transform: function (filepath) {
                           let filename = path.basename(filepath, '.scss').replace(/(^_)*/, '');
                           return `@import "elementor/${filename}";`;
                       }
                   }
               ))
               .pipe(gulp.dest('src/sass/'));
});

// gulp.task('inject-vc-scss', () => {
//     return gulp.src('src/sass/_vc.scss')
//         .pipe(inject(
//             gulp.src([
//                 'src/sass/vc/*.scss'
//             ], {read: false}), {
//                 transform: function (filepath) {
//                     let filename = path.basename(filepath, '.scss').replace(/(^_)*/, '');
//                     return `@import "vc/${filename}";`;
//                 }
//             }
//         ))
//         .pipe(gulp.dest('src/sass/'));
// });

gulp.task('render_color', function(){
    require('../../plugins/auros-core/render-color')(false, 'auros_customizer');
});

gulp.task('customize', () => {
    require('./dev/customize')();
});

gulp.task('babel-customize-control', function () {
    return gulp.src([
        path.join('./', 'src/babel-customize/fixjquery/before.js'),
        path.join('./', 'src/babel-customize/customize.js'),
        path.join('./', 'src/babel-customize/customize/*.js'),
        path.join('./', 'src/babel-customize/fixjquery/after.js'),
    ])
        .pipe(sourcemaps.init())
        .pipe(concat('customize-controls.js'))
        .pipe(babel({
            presets: ['es2015', 'stage-0']
        }).on('error', function (error) {
            console.log(error);
            this.emit('end')
        }))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(path.join('./', 'assets/js/')));
});

gulp.task('babel-customize-preview', function () {
    return gulp.src([
        path.join('./', 'src/babel-customize/fixjquery/before.js'),
        path.join('./', 'src/babel-customize/preview.js'),
        path.join('./', 'src/babel-customize/preview/*.js'),
        path.join('./', 'src/babel-customize/fixjquery/after.js'),
    ])
        .pipe(sourcemaps.init())
        .pipe(concat('customize-preview.js'))
        .pipe(babel({
            presets: ['es2015', 'stage-0']
        }).on('error', function (error) {
            console.log(error);
            this.emit('end')
        }))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(path.join('./', 'assets/js/')));
});

gulp.task('optimize-css', () => {
    fs.readFile('style.css', 'utf8', (err, data) => {
        let css = data.replace(/\/\*\# sourceMappingURL(.*)/gm, '');
        cssnano.process(css, {
            core           : false,
            minifyParams   : false,
            discardComments: false,
            //autoprefixer: {browsers: supported, add: true},
        }).then((result) => {
            let cssCode = result.css;
            cssCode     = cssCode.replace(/,\s*\n/g, '');
            cssCode     = responsive_css(cssCode);
            cssCode     = visual_composer_css(cssCode);
            cssCode     = fontawesome_css(cssCode);
            cssCode     = colors_css(cssCode);
            cssCode     = cssCode.replace(/(})\s+/g, '$1\n');
            cssCode     = cssCode.replace(/(\/)\s+/g, '$1\n');
            cssCode     = cssCode.replace(/,\s*\n/g, '');

            fs.writeFile('style.css', cssCode, 'utf8', (err) => {
                if (err) reject(err);
                console.log('done');
            });
        })
    })
});

function visual_composer_css(css) {
    return css.replace(/(\/\* ===== Start Visual Composer ===== \*\/)(([^\n]*\n)+)(\/\* ===== End Visual Composer ===== \*\/)/g, function (match, p1, p2, p3, p4) {
        fs.writeFileSync('assets/css/vc.css', p2.trim(), 'utf8');
        return '';
    }).trim();
}

function colors_css(css) {
    return css.replace(/(\/\* ===== Start Color: primary ===== \*\/)(([^\n]*\n)+)(\/\* ===== End Color: primary ===== \*\/)/g, '')
        .replace(/(\/\* ===== Start Color: secondary ===== \*\/)(([^\n]*\n)+)(\/\* ===== End Color: secondary ===== \*\/)/g, '')
        .replace(/\/\* ===== (Start|End) Color: .* ===== \*\//g, '')

}

function responsive_css(css) {
    let responsive = '';
    let regex      = /@medi((\s)*([A-z0-9]+))+(\s*\((?:[^)(]+|\((?:[^)(]+|\([^)(]*\))*\))*\)\s*\{(?:[^}{]+|\{(?:[^}{]+|\{[^}{]*\})*\})*\})/g;
    css            = css.replace(regex, function (match) {
        responsive += `
${match}`;
        return '';
    });
    fs.writeFileSync('assets/css/responsive.css', responsive.trim(), 'utf8');
    return css;
}



gulp.task('rtlcss', () => {
    let contentCss = fs.readFileSync('style.css', 'utf8');
    fs.writeFileSync('style-rtl.css', rtlcss.process(contentCss), 'utf8');
});

gulp.task('start', ['css', 'inject-file-customize', 'browser-sync'], function () {
    gulp.watch('src/sass/**/*.scss', ['css']);
    // Other watchers
});

gulp.task('css-admin', () => {
    return gulp.src(['src/sass/admin/admin.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        //.pipe(cssnano({
        //    autoprefixer: {browsers: supported, add: true}
        //}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./inc/admin/css/'));
});

gulp.task('css-button-animation', () => {
    return gulp.src(['src/sass/button-animation.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        //.pipe(cssnano({
        //    autoprefixer: {browsers: supported, add: true}
        //}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css'));
});

gulp.task('css-offcanvas-menu', () => {
    return gulp.src(['src/sass/offcanvas-menu.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        //.pipe(cssnano({
        //    autoprefixer: {browsers: supported, add: true}
        //}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css'));
});

gulp.task('css-tippyjs', () => {
    return gulp.src(['src/sass/tippyjs/tippy.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        //.pipe(cssnano({
        //    autoprefixer: {browsers: supported, add: true}
        //}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css'));
});

gulp.task('babel-theme', () => {
    return gulp.src([
        './src/babel/fixjquery/before.js',
        './src/babel/*.js',
        './src/babel/fixjquery/after.js',
    ])
        .pipe(sourcemaps.init())
        .pipe(concat('theme.js'))
        .pipe(babel({
            presets: ['es2015', 'stage-0']
        }).on('error', function (error) {
            console.log(error);
            this.emit('end')
        }))
        //.pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/js/'));
});

gulp.task('inject-file-customize', () => {
    glob('./inc/customize/*.php', {}, (er, files) => {
        let arr  = [];
        let code = `<?php
/**
 * @return string
 */
function auros_custom_css() {
`;
        code += files.map((file) => {
            let name    = path.basename(file, '.php'); // page-title
            let namePhp = '$' + name.replace(/\-+/g, '_'); // $page_title
            arr.push(namePhp);
            return `    ${namePhp} = include get_theme_file_path('inc/customize/${name}.php');`
        }).join('\n');
        code += `
    $css = <<<CSS
`;
        for (let a of arr) {
            code += `{${a}}
`;
        }
        code += `CSS;
    /**
     * Filters Home Finder custom colors CSS.
     *
     * @since Home Finder 1.0
     *
     * @param string $css Base theme colors CSS.
     */
    $css = preg_replace('!/\\*[^*]*\\*+([^/][^*]*\\*+)*/!', '', $css);
    $css = str_replace(': ', ':', $css);
    $css = str_replace(array("\\r\\n", "\\r", "\\n", "\\t", '  ', '    ', '    '), '', $css);
    return apply_filters( 'ezboozt_theme_customizer_css', $css );
}`;
        fs.writeFileSync('./inc/theme-custom-css.php', code, 'utf8');
    })
});

// ========================================================================
// ========================================================================
//                                Live Reload
// ========================================================================
// ========================================================================
gulp.task('browser-sync', () => {
    let files = [
        'style.css',
    ];
    browserSync.init(files, {
        proxy    : linkWebsite,
        watchTask: true,
        port     : 8888,
        force    : true,
        open     : "local",
        // ui       : false
         // browser: "google chrome",
    });
});

//
//gulp.task('default', ['watch']);

// ========================================================================
// ========================================================================
//                               Update Theme
// ========================================================================
// ========================================================================
let update_path_folder_svn = '';

gulp.task('opal-demo', function(){
    let _path = '../../../wp-includes/theme.php';
    let regex = /function get_theme_mod(\s*\((?:[^)(]+|\((?:[^)(]+|\([^)(]*\))*\))*\)\s*\{(?:[^}{]+|\{(?:[^}{]+|\{[^}{]*\})*\})*\})/g;
    let content = fs.readFileSync(_path, 'utf8');
    content = content.replace(regex, `function get_theme_mod( $name, $default = false ) {
   // Pham tien duc
    $custom_mods = apply_filters('opal-custom-theme-mods', array());
    if(is_array($custom_mods) && count($custom_mods) > 0){
        if(isset($custom_mods[$name])){
            return $custom_mods[$name];
        }
    }
    if(isset($_GET[$name])){
        return $_GET[$name];
    }
	$mods = get_theme_mods();

	if ( isset( $mods[$name] ) ) {
		/**
		 * Filters the theme modification, or 'theme_mod', value.
		 *
		 * The dynamic portion of the hook name, \`$name\`, refers to
		 * the key name of the modification array. For example,
		 * 'header_textcolor', 'header_image', and so on depending
		 * on the theme options.
		 *
		 * @since 2.2.0
		 *
		 * @param string $current_mod The value of the current theme modification.
		 */
		return apply_filters( "theme_mod_{$name}", $mods[$name] );
	}

	if ( is_string( $default ) )
		$default = sprintf( $default, get_template_directory_uri(), get_stylesheet_directory_uri() );

	/** This filter is documented in wp-includes/theme.php */
	return apply_filters( "theme_mod_{$name}", $default );
}`);

    fs.writeFileSync(_path, content, 'utf8');
});