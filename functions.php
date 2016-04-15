<?php

/* Get the template directory and make sure it has a trailing slash. */
$theme_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and launch it. */
require_once( $theme_dir . 'library/hybrid.php' );
new Hybrid();

/* Set up the theme early. */
add_action( 'after_setup_theme', 'mosalon_theme_setup', 5 );

/**
 * The theme setup function.  This function sets up support for various WordPress and framework functionality.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function mosalon_theme_setup() {

	/* Handle content width for embeds and images. */
	hybrid_set_content_width( 1140 );

	$theme_dir = trailingslashit( get_template_directory() );

	/* Load files. */
	require_once( $theme_dir . 'inc/mosalon-setup.php' );
	require_once( $theme_dir . 'inc/mosalon-customizer-setup.php' );

	/* Theme layouts. */
	add_theme_support( 'theme-layouts', array( 'default' => '2c-l' ) );

	/* The best thumbnail/image script ever. */
	add_theme_support( 'get-the-image' );

	/* Automatically add feed links to <head>. */
	add_theme_support( 'automatic-feed-links' );

	/* From wp 4.1 support for title tag. */
	add_theme_support( 'title-tag' );

	/* Add support for Woocommerce. */
	add_theme_support( 'woocommerce' );

	/* Add support for custom background. */
	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );
}