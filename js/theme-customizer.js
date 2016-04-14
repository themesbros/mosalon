(function( $ ) {

	/*
	 * Shows a live preview of changing the site title.
	 */
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			if ( ! $( '#site-title img' ).length )
				$( '#site-title a' ).html( to );
		} ); // value.bind
	} ); // wp.customize

	/*
	 * Shows a live preview of changing the site description.
	 */
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '#site-description' ).html( to );
		} ); // value.bind

	} ); // wp.customize

	/*
	 * Shows a live preview of changing the loop / blog title.
	 */
	wp.customize( 'loop_title', function( value ) {
		value.bind( function( to ) {
			$( '.loop-title' ).text( to );
		});
	});

	/*
	 * Shows a live preview of changing the loop / blog title.
	 */
	wp.customize( 'loop_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.loop-description p' ).text( to );
		});
	});

	/*
	 * Shows a live preview of changing the loop / blog title.
	 */
	wp.customize( 'loop_title_page', function( value ) {
		value.bind( function( to ) {
			$( '.loop-title' ).text( to );
		});
	});

	/*
	 * Shows a live preview of changing the loop / blog title.
	 */
	wp.customize( 'loop_subtitle_page', function( value ) {
		value.bind( function( to ) {
			$( '.loop-description p' ).text( to );
		});
	});

	/*
	 * Shows a live preview of changing the separator image opacity.
	 */
	wp.customize( 'loop_opacity', function( value ) {
		value.bind( function( to ) {
			$( '.loop-img' ).css( 'opacity', to );
		});
	});

}( jQuery ));