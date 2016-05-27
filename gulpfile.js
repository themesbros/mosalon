var gulp    	= require( 'gulp' ),
	browserSync = require( 'browser-sync' ).create(),
	concat      = require( 'gulp-concat' ),
	cssmin      = require( 'gulp-cssmin' ),
	imagemin    = require( 'gulp-imagemin' ),
	//jshint      = require( 'gulp-jshint' ),
	rename      = require( 'gulp-rename' ),
	rtlcss      = require( 'gulp-rtlcss' ),
	sass        = require( 'gulp-sass' ),
	sort        = require( 'gulp-sort' ),
	uglify      = require( 'gulp-uglify' ),
	copy        = require( 'gulp-copy' ),
	wppot       = require( 'gulp-wp-pot' ),
	pngquant    = require( 'imagemin-pngquant' );

gulp.task( 'styles', function(){
	gulp.src( ['!css/*.min.css', 'style.css', 'rtl.css'], { base: '.' } )
		.pipe( cssmin() )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( './' ) )
});

gulp.task( 'rtlcss', function() {
	gulp.src( ['style.css'] )
		.pipe( rtlcss() )
		.pipe( rename( { suffix: '-rtl' } ) )
		.pipe( gulp.dest( './' ) )
});

gulp.task( 'scripts', function(){
	gulp.src( ['js/*.js', '!js/*.min.js'] )
		.pipe( uglify() )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( 'js/' ) )
});

gulp.task( 'imagemin', function(){
	gulp.src( 'images/**' )
		.pipe(
			imagemin({
				progressive: true,
				interlaced: true,
				svgoPlugins: [
				    { removeViewBox: false },
				    { cleanupIDs: false }
				],
				use: [pngquant()]
			})
		)
		.pipe( gulp.dest( 'images' ) )
});

gulp.task( 'pot', function () {
    gulp.src('**/*.php')
        .pipe( sort() )
        .pipe( wppot( {
            domain: 'mosalon',
            destFile:'mosalon.pot',
            bugReport: 'http://www.themesbros.com/',
            team: 'TB Team <support@themebros.com>'
        } ))
        .pipe( gulp.dest( 'languages') );
});

gulp.task( 'sass', function () {
 	gulp.src( 'scss/**/*.scss' )
	    .pipe( sass( { outputStyle: 'expanded' }	).on( 'error', sass.logError ) )
	    .pipe( gulp.dest( './' ) )
	    .pipe( browserSync.stream() );
});

gulp.task( 'serve', function() {

    browserSync.init({
        proxy: "wt.dev"
    });

    gulp.watch("scss/*.scss", ['sass', 'styles']);
    gulp.watch("**/*.php").on('change', browserSync.reload);
    gulp.watch("**/*.css").on('change', browserSync.reload);
});

gulp.task( 'watch', function() {
	gulp.watch( '*.css', ['serve'] );
});


