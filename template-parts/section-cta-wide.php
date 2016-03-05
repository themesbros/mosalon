<?php 
/**
 * Landing page call to action (wide) template part.
 *
 * This template part is called by template-landing-page.php.
 *
 *
 * @package		Mosalon WordPress Theme
 * @copyright	Copyright (c) 2016, ThemesBros.com, distributed under the terms of the GNU GPL
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		ThemesBros <www.themesbros.com/contact/>
 */

if ( 0 == absint( get_theme_mod( 'display_cta_wide', 1 ) ) )
	return;

$cta_title       = get_theme_mod( 'cta_title', __( 'And much more features! Buy product now!', 'mosalon' ) );
$cta_text        = get_theme_mod( 'cta_text', __( "If you like this product don't forget to rate it!", 'mosalon' ) );
$cta_button_text = get_theme_mod( 'cta_button_text', __( 'Sign Up Now!', 'mosalon' ) );
$cta_button_link = get_theme_mod( 'cta_button_link', "#" );
?>

<div id="mosalon-cta-wide" class="left_aligned">

	<div class="wrap">
		<h3><?php echo esc_html( $cta_title ); ?></h3>
		<p><?php echo esc_html( $cta_text ); ?></p>
		<a class="button call-button" href="<?php echo esc_url( $cta_button_link ); ?>"><?php echo esc_html( $cta_button_text ); ?></a>				
	</div><!-- .wrap -->

</div><!-- #mosalon-cta-wide -->