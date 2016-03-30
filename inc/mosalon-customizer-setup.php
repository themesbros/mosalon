<?php

/* Theme Customizer setup. */
add_action( 'customize_register', 'mosalon_customizer_options', 20 );

/**
 * Sets up the theme customizer sections, controls, and settings.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $wp_customize
 * @return void
 */
function mosalon_customizer_options( $wp_customize ) {

	/*======================================
	=            PANEL: General            =
	======================================*/

	$wp_customize->add_panel( 'mosalon_general', array(
		'priority'    => 22,
		'capability'  => 'edit_theme_options',
		'title'       => __( 'General Options', 'mosalon' ),
	) );

    /* Remove default wp title_tagline section. */
    $wp_customize->remove_section( 'title_tagline' );

    /* Re-add it to general section. */
	$wp_customize->add_section( 'title_tagline', array(
		'title'      => __( 'Site Identity', 'mosalon' ),
		'priority'   => 19,
		'capability' => 'edit_theme_options',
		'panel'      => 'mosalon_general'
	) );

	/* === Site Identity === */

	$wp_customize->add_setting( 'logo', array(
		'default'           => trailingslashit( get_template_directory_uri() ) . 'images/logo.png',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'logo',
	        array(
				'label'       => __( 'Logo Upload', 'mosalon' ),
				'description' => __( 'If you remove logo, site title will be used instead.', 'mosalon' ),
				'section'     => 'title_tagline',
				'settings'    => 'logo',
				'priority'    => 1,
	        )
    ) );

	$wp_customize->add_setting( 'site_tagline_toggle', array(
		'default'           => 0,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'site_tagline_toggle', array(
		'label'    => __( 'Show site tagline?', 'mosalon' ),
		'type'     => 'checkbox',
		'section'  => 'title_tagline',
		'settings' => 'site_tagline_toggle',
	) );

	$wp_customize->add_section( 'section_header', array(
		'title'    => __( 'Header Options', 'mosalon' ),
		'priority' => 20,
		'panel'    => 'mosalon_general'
    ) );

	$wp_customize->add_section( 'section_separator', array(
		'title'    => __( 'Separator Options', 'mosalon' ),
		'priority' => 21,
		'panel'    => 'mosalon_general',
    ) );

	$wp_customize->add_setting( 'loop_title', array(
		'default'           => __( 'From the blog', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'loop_title', array(
		'label'    => __( 'Separator Title', 'mosalon' ),
		'section'  => 'section_separator',
		'settings' => 'loop_title',
	) );

	$wp_customize->add_setting( 'loop_subtitle', array(
		'default'           => __( 'Latest posts from our blog', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'loop_subtitle', array(
		'label'    => __( 'Separator Title', 'mosalon' ),
		'section'  => 'section_separator',
		'settings' => 'loop_subtitle',
	) );

	$wp_customize->add_setting( 'loop_img', array(
		'default'           => trailingslashit( get_template_directory_uri() ) . 'images/sep.png',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'loop_img',
	        array(
				'label'    => __( 'Separator Background Image', 'mosalon' ),
				'section'  => 'section_separator',
				'settings' => 'loop_img',
	        )
    ) );

	$wp_customize->add_setting( 'loop_opacity', array(
		'default'           => 0.4,
		'sanitize_callback' => 'mosalon_sanitize_opacity',
	) );

	$wp_customize->add_control( 'loop_opacity', array(
		'label'    => __( 'Image Opacity:', 'mosalon' ),
		'section'  => 'section_separator',
		'settings' => 'loop_opacity',
	) );

	$wp_customize->add_section( 'custom_css', array(
		'title'	=> __( 'Custom CSS', 'mosalon' ),
		'panel' => 'mosalon_general',
	) );

	$wp_customize->add_setting( 'mosalon_custom_css', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'mosalon_custom_css', array(
		'label'       => __( 'Custom CSS', 'mosalon' ),
		'description' => __( 'Enter custom CSS styles', 'mosalon' ),
		'type'        => 'textarea',
		'section'     => 'custom_css',
	) );

	/*=========================================
	=      		PANEL: Landing Page     	  =
	=========================================*/

	$wp_customize->add_panel( 'mosalon_front_page', array(
		'priority'    => 23,
		'capability'  => 'edit_theme_options',
		'title'       => __( 'Landing Page', 'mosalon' ),
		'description' => __( 'In order to use these options, you must first go to "Static Front Page", and select "A static Page". Under "Front page" select the page you want to display on front page. Now go to this page (Dashboard / Pages / Page) and on the right side, under "Page Attributes / Template" select "Landing Page". Go back here and set your options. ', 'mosalon' ),
	) );

	/*=====  Section Checklist  ======*/

	$wp_customize->add_section( 'section_checklist', array(
		'title' => __( 'Checklist', 'mosalon' ),
		'panel' => 'mosalon_front_page',
    ) );

	$wp_customize->add_setting( 'checklist_title', array(
		'default'           => __( 'LAUNCH YOUR NEW PRODUCT WEBSITE WITHIN MINUTES!', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'checklist_title', array(
		'label'    => __( 'Checklist Title', 'mosalon' ),
		'section'  => 'section_checklist',
		'settings' => 'checklist_title',
	) );

	$wp_customize->add_setting( 'checklist_text', array(
		'default' => sprintf(/* Translators: %s is \n, newline. */
					__( "Do you want easy to set up theme? %sDo you want customizable theme? %sDo you want great looking theme? %sWell, welcome to Mosalon!", 'mosalon' ), "\n", "\n", "\n"	),
		'sanitize_callback' => 'mosalon_sanitize_text',
	) );

	$wp_customize->add_control( 'checklist_text', array(
		'label'       => __( 'Checklist items', 'mosalon' ),
		'description' => __( 'One per line', 'mosalon' ),
		'type'        => 'textarea',
		'section'     => 'section_checklist',
	) );

	/*=====  Section Newsletter  ======*/

	$wp_customize->add_section( 'section_newsletter', array(
		'title' => __( 'Newsletter', 'mosalon' ),
		'panel' => 'mosalon_front_page',
    ) );

	$wp_customize->add_setting( 'nl_api_key', array(
		'default'           => __( 'fake_api_key', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'nl_api_key', array(
		'label'       => __( 'MailChimp Api Key', 'mosalon' ),
		'description' => sprintf( /* Translators: don't translate %s, it's link. */
			__( '%sGrab it here.%s', 'mosalon' ), '<a href="'. esc_url( 'https://admin.mailchimp.com/account/api-key-popup' ) .'">', '</a>' ),
		'section'     => 'section_newsletter',
		'settings'    => 'nl_api_key',
	) );

	$lists   = array( 'empty' => __( "Please enter API key and refresh  the page.", 'mosalon' ) ); // User created mailchimp lists.
	$api_key = get_theme_mod( 'nl_api_key' ) != '' ? esc_attr( get_theme_mod( 'nl_api_key' ) ) : '';

	if ( ! empty( $api_key ) ) {
		/* Load Mailchimp API. */
		require_once( trailingslashit( get_template_directory() ) .'inc/mailchimp.php' );
		$mc    = new Mosalon_Mailchimp_API( $api_key );
		$lists = $mc->get_lists();
		if ( !is_array( $lists ) )
			$lists = array( 'empty' => __( "Please enter API key and refresh the page.", 'mosalon' ) ); // User created mailchimp lists.
	}

	$wp_customize->add_setting( 'nl_selected_list', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'nl_selected_list', array(
		'type'    => 'select',
		'label'   => __( 'Select List', 'mosalon' ),
		'section' => 'section_newsletter',
        'choices' => $lists,
    ) );

	$wp_customize->add_setting( 'nl_title', array(
		'default'           => __( 'Sign Up Today - Free', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'nl_title', array(
		'label'    => __( 'Title', 'mosalon' ),
		'section'  => 'section_newsletter',
		'settings' => 'nl_title',
	) );

	$wp_customize->add_setting( 'nl_text', array(
		'default'           => __( 'Get latest news directly to your inbox!', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'nl_text', array(
		'label'    => __( 'Subscribe Text', 'mosalon' ),
		'section'  => 'section_newsletter',
		'settings' => 'nl_text',
	) );

	$wp_customize->add_setting( 'nl_button', array(
		'default'           => __( 'Sign Up Now', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'nl_button', array(
		'label'    => __( ' Subscribe Button Text', 'mosalon' ),
		'section'  => 'section_newsletter',
		'settings' => 'nl_button',
	) );

	$wp_customize->add_setting( 'doptin', array(
		'default'           => 1,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'doptin', array(
		'type'        => 'checkbox',
		'label'       => __( 'Double Opt-in?', 'mosalon' ),
		'description' => sprintf( __( 'Subscribers needs to confirm their email address. Read more about this %shere%s.', 'mosalon' ), '<a target="_blank" href="http://kb.mailchimp.com/lists/signup-forms/the-double-opt-in-process">', '</a>' ),
		'section'     => 'section_newsletter',
    ) );

	$wp_customize->add_setting( 'newsletter_text', array(
		'default' => __(  "You've been added to our sign-up list. We have sent an email, asking you to confirm the same.", 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'newsletter_text', array(
		'label'       => __( 'Success Message', 'mosalon' ),
		'description' => __( 'Message that will be shown when user is successfully subscribed to the list.', 'mosalon' ),
		'type'        => 'textarea',
		'section'     => 'section_newsletter',
	) );

	$wp_customize->add_setting( 'newsletter_shortcode', array(
		'default'           => '',
		'sanitize_callback' => 'mosalon_sanitize_textarea',
	) );

	$wp_customize->add_control( 'newsletter_shortcode', array(
		'type' 				=> 'textarea',
		'label'       => __( 'Custom Form', 'mosalon' ),
		'description' => __( "You don't have to use default form for subscription, you can add custom shortcode from a plugin here, or custom HTML, and theme will use it instead of default form. To use default form, leave this field blank.", 'mosalon' ),
		'section'     => 'section_newsletter',
		'settings'    => 'newsletter_shortcode',
	) );

	$wp_customize->add_setting( 'newsletter_custom_type', array(
		'default'           => 'html',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'newsletter_custom_type', array(
		'type'    => 'radio',
		'label'   => __( 'Custom Form Type', 'mosalon' ),
		'description' => __( "Select what type of form you're using.", 'mosalon' ),
		'section' => 'section_newsletter',
	    'choices' => array(
			'html'      => __( 'Custom HTML & JS', 'mosalon' ),
			'shortcode' => __( 'Shortcode', 'mosalon' ),
	    )
	) );

	/*=====  Section Countdown  ======*/

	$wp_customize->add_section( 'section_countdown', array(
		'title'       => __( 'Countdown', 'mosalon' ),
		'panel'       => 'mosalon_front_page',
		'description' => __( 'Set countdown timer to any date.', 'mosalon' )
    ) );

	$wp_customize->add_setting( 'display_countdown', array(
		'default'           => 1,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'display_countdown', array(
		'label'    => __( 'Display countdown?', 'mosalon' ),
		'type'     => 'checkbox',
		'section'  => 'section_countdown',
		'settings' => 'display_countdown',
	) );

	$wp_customize->add_setting( 'cd_month', array(
		'default'           => 'Jan',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'cd_month', array(
		'type'    => 'select',
		'label'   => __( 'Select Month', 'mosalon' ),
		'section' => 'section_countdown',
        'choices' => array(
			'Jan' => __( '01-Jan', 'mosalon' ),
			'Feb' => __( '02-Feb', 'mosalon' ),
			'Mar' => __( '03-Mar', 'mosalon' ),
			'Apr' => __( '04-Apr', 'mosalon' ),
			'May' => __( '05-May', 'mosalon' ),
			'Jun' => __( '06-Jun', 'mosalon' ),
			'Jul' => __( '07-Jul', 'mosalon' ),
			'Aug' => __( '08-Aug', 'mosalon' ),
			'Sep' => __( '09-Sep', 'mosalon' ),
			'Oct' => __( '10-Oct', 'mosalon' ),
			'Nov' => __( '11-Nov', 'mosalon' ),
			'Dec' => __( '12-Dec', 'mosalon' ),
        ),
    ) );

	$wp_customize->add_setting( 'cd_day', array(
		'default'           => date( 'd' ),
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'cd_day', array(
		'label'    => __( 'Day', 'mosalon' ),
		'section'  => 'section_countdown',
		'settings' => 'cd_day',
	) );

	$wp_customize->add_setting( 'cd_year', array(
		'default'           => date( 'Y' ) + 1,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'cd_year', array(
		'label'    => __( 'Year', 'mosalon' ),
		'section'  => 'section_countdown',
		'settings' => 'cd_year',
	) );

	$wp_customize->add_setting( 'cd_hour', array(
		'default'           => date( 'G' ),
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'cd_hour', array(
		'label'    => __( 'Hours', 'mosalon' ),
		'section'  => 'section_countdown',
		'settings' => 'cd_hour',
	) );

	$wp_customize->add_setting( 'cd_min', array(
		'default'           => date( 'i' ),
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'cd_min', array(
		'label'    => __( 'Minutes', 'mosalon' ),
		'section'  => 'section_countdown',
		'settings' => 'cd_min',
	) );

	/*=====  Section Video  ======*/

	$wp_customize->add_section( 'section_video', array(
		'title' => __( 'Video', 'mosalon' ),
		'panel' => 'mosalon_front_page',
    ) );

	$wp_customize->add_setting( 'display_video', array(
		'default'           => 1,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'display_video', array(
		'label'    => __( 'Display video?', 'mosalon' ),
		'type'     => 'checkbox',
		'section'  => 'section_video',
		'settings' => 'display_video',
	) );

	$wp_customize->add_setting( 'video_title', array(
		'default'           => __( 'Watch the video', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'video_title', array(
		'label'    => __( 'Video Title', 'mosalon' ),
		'section'  => 'section_video',
		'settings' => 'video_title',
	) );

	$wp_customize->add_setting( 'video_subtitle', array(
		'default'           => __( 'Watch the video', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'video_subtitle', array(
		'label'    => __( 'Video Subtitle', 'mosalon' ),
		'section'  => 'section_video',
		'settings' => 'video_subtitle',
	) );

	$wp_customize->add_setting( 'video_content', array(
		'default'           => '<iframe src="https://player.vimeo.com/video/27628086" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
		'sanitize_callback' => 'mosalon_sanitize_textarea',
	) );

	$wp_customize->add_control( 'video_content', array(
		'label'    => __( 'Video Video', 'mosalon' ),
		'section'  => 'section_video',
		'settings' => 'video_content',
	) );

	/*=====  Section Featured Items ======*/

	$wp_customize->add_section( 'section_featured_items', array(
		'title' => __( 'Featured Items', 'mosalon' ),
		'panel' => 'mosalon_front_page',
    ) );

	$wp_customize->add_setting( 'display_featured', array(
		'default'           => 1,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'display_featured', array(
		'label'    => __( 'Display featured items?', 'mosalon' ),
		'type'     => 'checkbox',
		'section'  => 'section_featured_items',
		'settings' => 'display_featured',
	) );

	$wp_customize->add_setting( 'featured_items_title', array(
		'default'           => __( 'Important Feature Points', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'featured_items_title', array(
		'label'    => __( 'Featured Title', 'mosalon' ),
		'section'  => 'section_featured_items',
		'settings' => 'featured_items_title',
	) );

	$wp_customize->add_setting( 'featured_items_subtitle', array(
		'default'           => __( 'Thinking big when you are small', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'featured_items_subtitle', array(
		'label'    => __( 'Featured Subtitle', 'mosalon' ),
		'section'  => 'section_featured_items',
		'settings' => 'featured_items_subtitle',
	) );

	$wp_customize->add_setting( 'icons_position', array(
		'default'           => 'left_aligned',
		'sanitize_callback' => 'sanitize_text_field'
    ) );

	$wp_customize->add_control( 'icons_position', array(
		'type'    => 'radio',
		'label'   => __( 'Icon placement', 'mosalon' ),
		'section' => 'section_featured_items',
        'choices' => array(
			'left_aligned' => __( 'Left', 'mosalon' ),
			'centered'     => __( 'Centered', 'mosalon' ),
        ),
    ) );

	$wp_customize->add_setting( 'featured_items_columns', array(
		'default'           => 2,
		'sanitize_callback' => 'absint',
    ) );

	$wp_customize->add_control( 'featured_items_columns', array(
		'type'        => 'select',
		'label'       => __( 'Featured Items Columns', 'mosalon' ),
		'description' => __( 'Number of columns per row', 'mosalon' ),
		'section'     => 'section_featured_items',
        'choices' 	  => array(
			1 => 1,
			2 => 2,
			3 => 3,
        ),
    ) );

    require_once( trailingslashit( get_template_directory() ) . 'inc/font-awesome-array.php' );

	$icons = array(
		'',
		'fa-check-circle-o',
		'fa-check-square-o',
		'fa-file-text-o',
		'fa-thumb-tack',
		'fa-unlock-alt',
		'fa-bell-o'
	);

	$sizes = array( '', 80, 80, 73, 80, 76, 68 );

    for( $i = 1; $i < 7; $i++ ) {

		$wp_customize->add_setting( "featured_icon_{$i}", array(
			'default'           => $icons[$i],
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( "featured_icon_{$i}", array(
			'label'   => __( 'Font Icon', 'mosalon' ) . ' ' . $i,
			'section' => 'section_featured_items',
			'type'    => 'select',
			'choices' => $list
		) );

		$wp_customize->add_setting( "featured_icon_size_{$i}", array(
			'default'           => $sizes[$i],
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( "featured_icon_size_{$i}", array(
			'label'   => __( 'Font Size', 'mosalon' ) . ' ' . $i,
			'type'    => 'number',
			'section' => 'section_featured_items',
		) );

		$wp_customize->add_setting( "featured_items_title_{$i}", array(
			'default'           => __( 'Very Important Feature Point', 'mosalon' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( "featured_items_title_{$i}", array(
			'label'    => __( 'Featured Title', 'mosalon' ) . ' ' . $i,
			'section'  => 'section_featured_items',
			'settings' => "featured_items_title_{$i}",
		) );

		$wp_customize->add_setting( "featured_items_text_{$i}", array(
			'default'           => __( 'Lorem ipsum sit amet, dolor and easy way to get more organic search without unnecessary bells and whistles.', 'mosalon' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( "featured_items_text_{$i}", array(
			'label'   => __( 'Featured Text', 'mosalon' ) . ' ' . $i,
			'type'    => 'textarea',
			'section' => 'section_featured_items',
		) );

    }

	/*=====  Section CTA ======*/

	$wp_customize->add_section( 'section_cta', array(
		'title' => __( 'Call To Action Wide', 'mosalon' ),
		'panel' => 'mosalon_front_page',
    ) );

	$wp_customize->add_setting( 'display_cta_wide', array(
		'default'           => 1,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'display_cta_wide', array(
		'label'    => __( 'Display CTA Wide?', 'mosalon' ),
		'type'     => 'checkbox',
		'section'  => 'section_cta',
		'settings' => 'display_cta_wide',
	) );

	$wp_customize->add_setting( 'cta_title', array(
		'default'           => __( 'And much more features! Buy product now!', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'cta_title', array(
		'label'    => __( 'Title', 'mosalon' ),
		'section'  => 'section_cta',
		'settings' => 'cta_title',
	) );

	$wp_customize->add_setting( 'cta_text', array(
		'default'           => __( "If you like this product don't forget to rate it!", 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'cta_text', array(
		'label'   => __( 'Text', 'mosalon' ),
		'type'    => 'textarea',
		'section' => 'section_cta',
	) );

	$wp_customize->add_setting( 'cta_button_text', array(
		'default'           => __( "Sign Up Now", 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'cta_button_text', array(
		'label'    => __( 'Button Text', 'mosalon' ),
		'section'  => 'section_cta',
		'settings' => 'cta_button_text',
	) );

	$wp_customize->add_setting( 'cta_button_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'cta_button_link', array(
		'label'    => __( 'Button URL', 'mosalon' ),
		'section'  => 'section_cta',
		'settings' => 'cta_button_link',
	) );

	/*=====  Section Latest News ======*/

	$wp_customize->add_section( 'section_latest_posts', array(
		'title' => __( 'Latest News', 'mosalon' ),
		'panel' => 'mosalon_front_page',
    ) );

	$wp_customize->add_setting( 'display_lp', array(
		'default'           => 1,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'display_lp', array(
		'label'    => __( 'Display latest posts?', 'mosalon' ),
		'type'     => 'checkbox',
		'section'  => 'section_latest_posts',
		'settings' => 'display_lp',
	) );

	$wp_customize->add_setting( 'latest_posts_title', array(
		'default'           => __( 'Latest Posts', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'latest_posts_title', array(
		'label'    => __( 'Title', 'mosalon' ),
		'section'  => 'section_latest_posts',
		'settings' => 'latest_posts_title',
	) );

 	$wp_customize->add_setting( 'latest_posts_subtitle', array(
		'default'           => __( 'Freshest news from our blog', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'latest_posts_subtitle', array(
		'label'    => __( 'Subtitle', 'mosalon' ),
		'section'  => 'section_latest_posts',
		'settings' => 'latest_posts_subtitle',
	) );

 	$wp_customize->add_setting( 'latest_posts_number', array(
		'default'           => 2,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'latest_posts_number', array(
		'label'    => __( 'Number of posts to show', 'mosalon' ),
		'section'  => 'section_latest_posts',
		'settings' => 'latest_posts_number',
	) );

	$wp_customize->add_setting( 'latest_posts_cats', array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
    ) );

	$wp_customize->add_control( 'latest_posts_cats', array(
		'label'       => __( 'Select Category', 'mosalon' ),
		'description' => __( 'Choose specific category to show posts from, or leave at "All Categories" to show all latest posts from all categories.', 'mosalon' ),
		'type'        => 'select',
		'section'     => 'section_latest_posts',
		'choices'     => mosalon_categories_array()
    ) );

	$wp_customize->add_setting( 'latest_post_image', array(
		'default'           => 1,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'latest_post_image', array(
		'label'    => __( 'Display post default image?', 'mosalon' ),
		'type'     => 'checkbox',
		'section'  => 'section_latest_posts',
		'settings' => 'latest_post_image',
	) );

 	$wp_customize->add_setting( 'latest_posts_length', array(
		'default'           => 22,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'latest_posts_length', array(
		'label'    => __( 'Number of words to show:', 'mosalon' ),
		'section'  => 'section_latest_posts',
		'settings' => 'latest_posts_length',
	) );

	$wp_customize->add_setting( 'latest_post_columns', array(
		'default'           => 2,
		'sanitize_callback' => 'absint',
    ) );

	$wp_customize->add_control( 'latest_post_columns', array(
		'type'        => 'select',
		'label'       => __( 'Columns Number', 'mosalon' ),
		'description' => __( 'In how many columns to display posts?', 'mosalon' ),
		'section'     => 'section_latest_posts',
        'choices' => array(
			1 => 1,
			2 => 2,
			3 => 3,
			4 => 4,
        ),
    ) );

	/*=====  Section CTA Centered ======*/

	$wp_customize->add_section( 'section_cta_centered', array(
		'title' => __( 'Call To Action Centered', 'mosalon' ),
		'panel' => 'mosalon_front_page',
    ) );

	$wp_customize->add_setting( 'display_cta_centered', array(
		'default'           => 1,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'display_cta_centered', array(
		'label'    => __( 'Display call to action centered?', 'mosalon' ),
		'type'     => 'checkbox',
		'section'  => 'section_cta_centered',
		'settings' => 'display_cta_centered',
	) );

	$wp_customize->add_setting( 'cta_centered_title', array(
		'default'           => __( 'Want to get a Free Course Preview?', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'cta_centered_title', array(
		'label'    => __( 'Title', 'mosalon' ),
		'section'  => 'section_cta_centered',
		'settings' => 'cta_centered_title',
	) );

	$wp_customize->add_setting( 'cta_centered_text', array(
		'default' => __( 'Offer a course preview to students and let them peak at the awesome resources!', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'cta_centered_text', array(
		'label'   => __( 'Text', 'mosalon' ),
		'type'    => 'textarea',
		'section' => 'section_cta_centered',
	) );

	$wp_customize->add_setting( 'cta_centered_button_text', array(
		'default'           => __( 'Give me the free case study', 'mosalon' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'cta_centered_button_text', array(
		'label'    => __( 'Button Text', 'mosalon' ),
		'section'  => 'section_cta_centered',
		'settings' => 'cta_centered_button_text',
	) );

	$wp_customize->add_setting( 'cta_centered_button_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'cta_centered_button_link', array(
		'label'    => __( 'Button URL', 'mosalon' ),
		'section'  => 'section_cta_centered',
		'settings' => 'cta_centered_button_link',
	) );

	/*=====  Section Checklist  ======*/

	$wp_customize->add_section( 'section_ordering', array(
		'title' => __( 'Section Ordering', 'mosalon' ),
		'panel' => 'mosalon_front_page',
    ) );

	$wp_customize->add_setting( 'display_sidebar', array(
		'default'           => 1,
		'sanitize_callback' => 'mosalon_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'display_sidebar', array(
		'type'    => 'checkbox',
		'label'   => __( 'Display subsidiary sidebar on landing page?', 'mosalon' ),
		'section' => 'section_ordering',
    ) );

    $sections = array(
		'top-cta'      => __( 'Checklist & Newsletter', 'mosalon' ),
		'countdown'    => __( 'Countdown', 'mosalon' ),
		'video'        => __( 'Video', 'mosalon' ),
		'features'     => __( 'Features', 'mosalon' ),
		'cta-wide'     => __( 'Call To Action (Wide)', 'mosalon' ),
		'latest-posts' => __( 'Latest Posts', 'mosalon' ),
		'cta-centered' => __( 'Call To Action (Centered)', 'mosalon' ),
	);

    $i = 0;

    foreach( $sections as $key => $value ) {

		$wp_customize->add_setting( "section_{$i}", array(
			'default'           => $key,
			'sanitize_callback' => 'sanitize_text_field',
	    ) );

	    $number = $i + 1;

		$wp_customize->add_control( "section_{$i}", array(
			'type'    => 'select',
			'label'   => __( 'Slot', 'mosalon' ) . ' ' . $number . ':',
			'section' => 'section_ordering',
	        'choices' => $sections
	    ) );

		$i++;
    }

	/*----------  Live Preview  ----------*/

	/* Load JavaScript files. */
	add_action( 'customize_preview_init', 'mosalon_enqueue_customizer_scripts' );
	add_action( 'customize_controls_enqueue_scripts', 'mosalon_customizer_scripts' );

	/* Enable live preview for WordPress theme features. */
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'loop_title' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'loop_subtitle' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'loop_opacity' )->transport    = 'postMessage';
}


/**
 * Loads theme customizer JavaScript.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function mosalon_enqueue_customizer_scripts() {

	/* Use the .min script if SCRIPT_DEBUG is turned off. */
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script(
		'mosalon-customize',
		trailingslashit( get_template_directory_uri() ) . "js/theme-customizer{$suffix}.js",
		array( 'jquery' ),
		null,
		true
	);

}

/**
 * Adds links / buttons to customizer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function mosalon_customizer_scripts() {

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script(
		'mosalon-customizer-links',
		trailingslashit( get_template_directory_uri() ) . "js/theme-customizer-links{$suffix}.js",
		array( 'jquery' ),
		null,
		true
	);

	$customizer_strings = array(
		'support' => __( 'Support Forum', 'mosalon' ),
		'review'  => __( 'Rate Us!', 'mosalon' )
	);

	wp_localize_script( 'mosalon-customizer-links', 'mc', $customizer_strings );

}

/*==============================================
=            SANITIZATION CALLBACKS            =
==============================================*/

/**
 * Sanitizes checkbox fields in customizer.
 *
 * @since 1.0.0
 * @access public
 * @param  bool 	$input
 * @return int|bool
 */
function mosalon_sanitize_checkbox( $input ) {
	return ( $input == 1 ) ? 1 : false;
}

/**
 * Sanitizes text in customizer.
 *
 * @since 1.0.0
 * @access public
 * @param  string 	$input
 * @return string
 */
function mosalon_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Sanitizes opacity for background image. Returns 0, 1, and everything between 0.01-0.99.
 *
 * @since 1.0.0
 * @access public
 * @param  string  	$value
 * @return int|float
 */
function mosalon_sanitize_opacity( $value ) {

    $value = abs( $value );

    if ( $value > 0 && $value < 1 )
        $value = number_format( $value, 2, '.', '' );

    return ( $value > 1 ) ? 1 : $value;
}

/**
 * Sanitizes textarea for video, allows html if user has privileges to do so.
 *
 * @since 1.0.0
 * @access public
 * @param  string  	$value
 * @return string
 */
function mosalon_sanitize_textarea( $value ) {
	return current_user_can( 'unfiltered_html' ) ? $value : wp_kses_post( stripslashes( $value ) );
}

/*=====  End of SANITIZATION CALLBACKS  ======*/

/**
 * Puts all categories into array.
 *
 * @since 1.0.0
 * @access public
 * @return array
 */
function mosalon_categories_array() {

	$cats       = array();
	$categories = get_categories();

	$cats[0] = __( 'All Categories', 'mosalon' );

	foreach( $categories as $cat ) {
		$cats[$cat->cat_ID] = $cat->cat_name;
	}

	return $cats;
}

?>