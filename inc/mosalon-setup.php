<?php
/**
 * Sets up custom filters and actions for the theme.  This does things like sets up sidebars, menus, scripts,
 * and lots of other awesome stuff that WordPress themes do.
 */

/* Register custom image sizes. */
add_action( 'init', 'mosalon_register_image_sizes', 5 );

/* Register custom menus. */
add_action( 'init', 'mosalon_register_menus', 5 );

/* Register sidebars. */
add_action( 'widgets_init', 'mosalon_register_sidebars', 5 );

/* Add custom scripts. */
add_action( 'wp_enqueue_scripts', 'mosalon_enqueue_scripts' );

/* Register custom styles. */
add_action( 'wp_enqueue_scripts', 'mosalon_register_styles', 0 );

/* Register theme layouts. */
add_action( 'hybrid_register_layouts', 'mosalon_register_layouts' );

/* Filters the excerpt length. */
add_filter( 'excerpt_length', 'mosalon_excerpt_length' );

/* Remove read more in excerpt */
add_filter( 'excerpt_more', 'mosalon_read_more' );

/* Adds custom attributes to the subsidiary sidebar. */
add_filter( 'hybrid_attr_sidebar', 'mosalon_sidebar_subsidiary_class', 10, 2 );

/* Remove allowed tags from comment form */
add_filter( 'comment_form_defaults', 'remove_comment_form_allowed_tags' );

/* Remove gallery inline styles */
add_filter( 'use_default_gallery_style', '__return_false' );

/* Site logo. */
add_filter( 'hybrid_site_title', 'mosalon_logo' );

/* Site tagline. */
add_filter( 'hybrid_site_description', 'mosalon_site_tagline_toggle' );

/* Replace header class. */
add_filter( 'hybrid_attr_header', 'header_class' );

/* Add class to image link. */
add_filter( 'get_the_image', 'mosalon_add_img_class' );

/* Adds style for loop meta image (set through customizer). */
add_action( 'wp_head', 'mosalon_loop_meta_img' );

/* Modifies wp_page_menu. */
add_filter( 'wp_page_menu', 'mosalon_modify_menu' );

/* Custom CSS support. */
add_action( 'wp_head', 'mosalon_custom_css' );

/* Mosalon body classes (fixes and extras). */
add_filter( 'body_class', 'mosalon_body_classes' );

/**
 * Registers custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function mosalon_register_image_sizes() {

	/* Sets the 'post-thumbnail' size. */
	set_post_thumbnail_size( 150, 150, true );

	/* Front page image size. */
	add_image_size( 'mosalon-full', 1140, 550, true );

	/* Latest posts image sizes. */
	add_image_size( 'mosalon-lp-2-widget-image', 555, 300, true );
	add_image_size( 'mosalon-lp-3-widget-image', 360, 250, true );
	add_image_size( 'mosalon-lp-4-widget-image', 260, 200, true );

}

/**
 * Registers nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function mosalon_register_menus() {
	register_nav_menu( 'primary',    	_x( 'Primary',    'nav menu location', 'mosalon' ) );
	register_nav_menu( 'subsidiary',    _x( 'Subsidiary', 'nav menu location', 'mosalon' ) );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function mosalon_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Blog: Primary', 'sidebar', 'mosalon' ),
			'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'mosalon' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'subsidiary',
			'name'        => _x( 'Blog: Subsidiary', 'sidebar', 'mosalon' ),
			'description' => __( 'A sidebar located in the footer of the site. Optimized for one, two, three or four widgets (and multiples thereof).', 'mosalon' )
		)
	);

}

/**
 * Adds support for multiple theme layouts.
 *
 * @since  1.0.2
 * @access public
 * @return void
 */
function mosalon_register_layouts() {

	$theme_dir = trailingslashit( get_template_directory_uri() );

    hybrid_register_layout(
        '2c-l',
        array(
            'label'              => __( '2 Columns: Content / Sidebar', 'mosalon' ),
            'show_in_customizer' => true,
            'show_in_meta_box'   => true,
            'image'              => $theme_dir . 'admin/images/2c-l.png'
        )
    );

    hybrid_register_layout(
        '2c-r',
        array(
            'label'              => __( '2 Columns: Sidebar / Content', 'mosalon' ),
            'show_in_customizer' => true,
            'show_in_meta_box'   => true,
         	'image'              => $theme_dir . 'admin/images/2c-r.png'
        )
    );

    hybrid_register_layout(
        '1c',
        array(
            'label'              => __( '1 Column', 'mosalon' ),
            'show_in_customizer' => true,
            'show_in_meta_box'   => true,
            'image'              => $theme_dir . 'admin/images/1c.png'
        )
    );

}

/**
 * Enqueues scripts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function mosalon_enqueue_scripts() {

	$theme_dir = trailingslashit( get_template_directory_uri() );
	$suffix    = hybrid_get_min_suffix();

	wp_register_script(
		'mosalon-fitvids',
		$theme_dir . "js/fitvids{$suffix}.js",
		array( 'jquery' ),
		null,
		true
	);

	wp_register_script(
		'mosalon-custom-js',
		$theme_dir . "js/custom{$suffix}.js",
		array( 'jquery' ),
		null,
		true
	);

	wp_register_script( 'mosalon-mailchimp',
		$theme_dir . "js/mailchimp{$suffix}.js",
		array( 'jquery' ),
		null,
		true
	);

	wp_register_script(
		'mosalon-countdown',
		$theme_dir . "js/countdown{$suffix}.js",
		array( 'jquery' ),
		null,
		true
	);

	wp_enqueue_script( 'mosalon-fitvids' );
	wp_enqueue_script( 'mosalon-custom-js' );

}

/**
 * Registers custom stylesheets for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function mosalon_register_styles() {

	$suffix = hybrid_get_min_suffix();
	$style  = is_rtl() ? 'rtl' : 'style';

	/* Font Icon Font */
	wp_register_style( 'font-awesome', trailingslashit( get_template_directory_uri() ) . "admin/css/font-awesome{$suffix}.css" );
	wp_enqueue_style( 'font-awesome' );

	$style_url = trailingslashit( get_template_directory_uri() ) . "{$style}{$suffix}.css";

	/* Load parent theme stylesheet. */
	wp_register_style( 'style', $style_url );
	wp_enqueue_style ( 'style' );

	/* Autoload child theme stylesheet. */
	if ( is_child_theme() )
		wp_enqueue_style( 'child', get_stylesheet_uri() );

	wp_dequeue_style( 'tribe-events-calendar-style-css' );
}


/**
 * Adds a custom excerpt length.
 *
 * @since  1.0.0
 * @access public
 * @param  int     $length
 * @return int
 */
function mosalon_excerpt_length( $length ) {
	return 60;
}

/**
 * Disables read more link ([...]) in excerpt.
 * @since 1.0.0
 * @access public
 * @param  string 	$more
 * @return string
 */
function mosalon_read_more( $more ) {
	return '...';
}

/**
 * Adds a custom class to the 'subsidiary' sidebar.  This is used to determine the number of columns used to
 * display the sidebar's widgets.  This optimizes for 1, 2, 3 and 4 columns or multiples of those values.
 *
 * Note that we're using the global $sidebars_widgets variable here. This is because core has marked
 * wp_get_sidebars_widgets() as a private function. Therefore, this leaves us with $sidebars_widgets for
 * figuring out the widget count.
 * @link http://codex.wordpress.org/Function_Reference/wp_get_sidebars_widgets
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr
 * @param  string $context
 * @return array
 */
function mosalon_sidebar_subsidiary_class( $attr, $context ) {

	if ( 'subsidiary' === $context ) {

		global $sidebars_widgets;

		if ( is_array( $sidebars_widgets ) && !empty( $sidebars_widgets[ $context ] ) ) {

			$count = count( $sidebars_widgets[ $context ] );

			if ( ( $count == 4 ) || $count > 4 )
				$attr['class'] .= ' sidebar-cols-4';

			elseif ( !( $count % 3 ) )
				$attr['class'] .= ' sidebar-cols-3';

			elseif ( !( $count % 2 ) )
				$attr['class'] .= ' sidebar-cols-2';

			else
				$attr['class'] .= ' sidebar-cols-1';

		}
	}

	return $attr;
}


/**
 * Disables comments allowed tags below comment textarea.
 *
 * @since 1.0.0
 * @access public
 * @param  array $defaults
 * @return array
 */
function remove_comment_form_allowed_tags( $defaults ) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}

/**
 * Set's logo, replaces site title.
 * @since 1.0.0
 * @access public
 * @param  string 	$title
 * @return string
 */
function mosalon_logo( $title ) {

	$logo = get_theme_mod( 'logo', trailingslashit( get_template_directory_uri() ) . 'images/logo.png' );

	if ( ! empty( $logo ) ) {
		$alt   = get_bloginfo( 'name' );
		$img   = '<img src="'. esc_url( $logo ) .'" alt="'. esc_attr( $alt ) .'" />';
		$title = sprintf( '<h1 id="site-title"><a href="%s" rel="home">%s</a></h1>', home_url(), $img );
	}

	return $title;
}

/**
 * Shows / hides site tagline.
 *
 * @since 1.0.0
 * @access public
 * @param  string 	$tagline
 * @return string|bool
 */
function mosalon_site_tagline_toggle( $tagline ) {
	$state = get_theme_mod( 'site_tagline_toggle', false );
	return ( 1 === $state ) ? $tagline : false;
}

/**
 * Modifies hybrid_attr_header, adds class .wrap to header tag.
 *
 * @since  1.0.0
 * @access public
 * @param array $attr
 * @return array
 */
function header_class( $attr ) {
	$attr['class'] = 'wrap';
	return $attr;
}

/**
 * Adds .mosalon-thumbnail class to image link.
 *
 * @since 1.0.0
 * @access public
 * @param  string 	$image
 * @return string
 */
function mosalon_add_img_class( $image ) {
	$image = str_replace( '<a', '<a class="mosalon-thumbnail" ', $image );
	return $image;
}

/**
 * Backward compatibility for title tag.
 *
 * @since 1.0.0
 * @access public
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function mosalon_render_title_tag() {
?>
<title><?php wp_title( ':', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'mosalon_render_title_tag' );
}

/**
 * @since  1.0.0
 * @access public
 * @return void
 */
function mosalon_loop_meta_img() {

	$img = get_theme_mod( 'loop_img', trailingslashit( get_template_directory_uri() ) . 'images/sep.png' );

	if ( empty( $img ) )
		return;

	$opacity = get_theme_mod( 'loop_opacity', 0.4 );
	?>
	<style>
	.loop-img {
		background: url('<?php echo esc_url( $img ); ?>') no-repeat scroll center top;
		opacity: <?php echo esc_attr( $opacity ); ?>;
	}
	</style>
	<?php
}

/**
 * Adds id "menu-primary-items" to <ul>.
 *
 * @since  1.0.0
 * @param  $menu
 * @return string
 */
function mosalon_modify_menu( $menu ) {
  	return preg_replace( '/<ul>/', '<ul id="menu-primary-items">', $menu, 1 );
}

/**
 * Checks if it's landing page template used on current page.
 *
 * @since  1.0.0
 * @access public
 * @return boolean
 */
function is_mosalon_landing_page() {
	return is_page_template( 'template-landing-page.php' ) ? true : false;
}

/**
 * Checks whether to show primary sidebar. Sidebar will be shown only if it's not landing page template,
 * and not 1 column layout.
 *
 * @since  1.0.0
 * @access public
 * @return boolean
 */
function mosalon_show_sidebar() {

	$global_layout = esc_html( get_theme_mod( 'theme_layout', '2c-l' ) );

	if ( is_singular() ) {
		$single_layout = esc_html( hybrid_get_post_layout( get_the_ID() ) );
		return $single_layout == '1c' || is_mosalon_landing_page() ? false : true;
	}
	else return $global_layout == '1c' ? false : true;
}

/**
 * All classes starting with "single-" are overriden to "singular-" by Hybrid Core.
 * Function adds "single" and "single-post_type" class in addition to Hybrid Core's "singular-post_type".
 *
 * @since  1.0.0
 * @access public
 * @param  array 	$classes
 * @return array
 */
function mosalon_body_classes( $classes ) {

	if ( is_singular() ) {
		$object    = get_queried_object();
		$classes[] = 'single';
		$classes[] = "single-{$object->post_type}";
	}

	return $classes;
}

/**
 * Adds custom CSS to head.
 * @since  1.1.0
 * @return void
 */
function mosalon_custom_css() {

	$custom_css = get_theme_mod( 'mosalon_custom_css' );
	if ( empty( $custom_css ) )
		return;
	else
		echo '<style>' . $custom_css . '</style>';
}

/**
 * WP callback for adding subscribers to MailChimp.
 *
 * @since  1.0.0
 * @return boolean
 */
add_action( 'wp_ajax_add_to_mailchimp_list', 'add_to_mailchimp_list' );
add_action( 'wp_ajax_nopriv_add_to_mailchimp_list', 'add_to_mailchimp_list' );

function add_to_mailchimp_list() {

	check_ajax_referer( 'MailChimp', 'ajax_nonce' );

	$result = mosalon_mailchimp_subscribe();

	if ( is_array( $result ) )
		echo 'added';
	else
		echo 'invalid email';

	wp_die();
}

/* PHP fallback for subscription if Javascript is off in browser. */
add_action( 'init', 'mosalon_mailchimp_subscribe' );

/**
 * Subscribes user to Mailchimp with PHP if Javascript is off in browser.
 *
 * @since  1.1
 * @return array | boolean
 */
function mosalon_mailchimp_subscribe() {

	if ( ! isset( $_POST['email'] ) )
		return;

	$email = sanitize_email( $_POST['email'] );

	if ( is_email( $email ) ) {

		$fname = esc_attr( $_POST['fname'] );
		$lname = esc_attr( $_POST['lname'] );

		$vars = array();

		if ( ! empty( $fname ) )
			$vars['FNAME'] = $fname;

		if ( ! empty( $lname ) )
			$vars['LNAME'] = $lname;

		$api_key      = esc_attr( get_theme_mod( 'nl_api_key' ) );
		$list_id      = esc_attr( get_theme_mod( 'nl_selected_list' ) );
		$double_optin = (bool) get_theme_mod( 'doptin' );

		/* Load Mailchimp API. */
		require_once( trailingslashit( get_template_directory() ) .'inc/mailchimp.php' );

		$MailChimp = new Mosalon_MailChimp_API( $api_key );
		$result = $MailChimp->call( 'lists/subscribe', array(
						'id'                => $list_id,
						'email'             => array( 'email' => $email ),
		                'merge_vars'        => $vars,
						'double_optin'      => $double_optin,
						'update_existing'   => true,
						'replace_interests' => false,
						));
		return $result;
	}
	return false;
}