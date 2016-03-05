<?php 
/**
 * Landing page top green call to action template part with newsletter form.
 *
 * This template part is called by template-landing-page.php.
 *
 *
 * @package		Mosalon WordPress Theme
 * @copyright	Copyright (c) 2016, ThemesBros.com, distributed under the terms of the GNU GPL
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		ThemesBros <www.themesbros.com/contact/>
 */
?>

<div id="top-call-to-action">
	
	<div class="wrap">

		<div id="mosalon-checklist">
			
			<h3 id="mosalon-checklist-title"><?php echo esc_html( get_theme_mod( 'checklist_title', __( 'LAUNCH YOUR NEW PRODUCT WEBSITE WITHIN MINUTES!', 'mosalon' ) ) ); ?></h3>
			
			<?php $text  = get_theme_mod( 'checklist_text', sprintf(/* Translators: %s is \n, newline. */
					__( "Do you want easy to set up theme? %sDo you want customizable theme? %sDo you want great looking theme? %sWell, welcome to Mosalon!", 'mosalon' ), "\n", "\n", "\n"	) ); ?>
			<?php $lines = explode( "\n", $text ); ?>

			<?php if ( $text ) : ?>
		
		  		<ul class="fa-ul no-margin">

		  		<?php foreach( $lines as $line ) : ?>

					<li><?php echo esc_html( $line ); ?></li>

		  		<?php endforeach; ?>

		  		</ul>				

			<?php endif; // End check if there's text entered in checklist field. ?>

		</div><!-- .mosalon-checklist -->

		<div id="mosalon-newsletter">

			<?php 
			$api_key = esc_html( get_theme_mod( 'nl_api_key' ) );
			
			/* Don't load mailchimp.js on demo page, it will enable form submission, and throw error in debug.log. */
			if ( $api_key !== 'fake-api-key' )
				wp_enqueue_script( 'mosalon-mailchimp' );								

			wp_enqueue_script( 'jquery-form' );
			
			$ajaxurl    = admin_url( 'admin-ajax.php' );
			$ajax_nonce = wp_create_nonce( 'MailChimp' );

			wp_localize_script( 'mosalon-mailchimp', 'ajaxVars', array( 
				'ajaxurl'    => $ajaxurl, 
				'ajax_nonce' => $ajax_nonce,
				'success'    => get_theme_mod( 'newsletter_text', __( "You've been added to our sign-up list. We have sent an email, asking you to confirm the same.", 'mosalon' ) ),
				'error'      => __( "There was an error. Please try again.", 'mosalon' ),
				'email'      => __( "That does not look like a valid email.", 'mosalon' ),
				) 
			);	
		 	?>
			
			<h3><?php echo esc_html( get_theme_mod( 'nl_title', __( 'Sign Up Today - Free!', 'mosalon' ) ) ); ?></h3>
			<p><?php echo esc_html( get_theme_mod( 'nl_text', __( 'Get latest news directly to your inbox!', 'mosalon' ) ) ); ?></p>

			<form class="newsletter-form" action="#" method="POST">

				<label for="fname"><?php _e( 'First Name', 'mosalon' ); ?></label>
				<input id="fname" class="newsletter-input" type="text" name="fname" />

				<label for="lname"><?php _e( 'Last Name', 'mosalon' ); ?></label>
				<input id="lname" class="newsletter-input" type="text" name="lname" />

				<label for="email"><?php _e( 'Email *', 'mosalon' ); ?></label>
				<input id="email" class="newsletter-input" type="email" name="email" required />
				<button class="call-button newsletter-button" type="submit"><?php echo esc_html( get_theme_mod( 'nl_button', __( 'Sign Up Now', 'mosalon' ) ) ); ?></button>

 			</form>					

		</div>

	</div><!-- .wrap -->

</div><!-- #top-call-to-action -->