<?php 
/**
 * Landing page call to action (centered) template part.
 *
 * This template part is called by template-landing-page.php.
 *
 *
 * @package		Mosalon WordPress Theme
 * @copyright	Copyright (c) 2016, ThemesBros.com, distributed under the terms of the GNU GPL
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		ThemesBros <www.themesbros.com/contact/>
 */

if ( 0 == absint( get_theme_mod( 'display_cta_centered', 1 ) ) )
	return;

$cta_centered_title = get_theme_mod( 'cta_centered_title', __( 'Want to get a Free Course Preview?', 'mosalon' ) );
$cta_centered_text = get_theme_mod( 'cta_centered_text', __( "Offer a course preview to students and let them peak at the awesome resources!", 'mosalon' ) );
$cta_centered_button_text  = get_theme_mod( 'cta_centered_button_text', __( "Give me the free case study", 'mosalon' ) );
$cta_centered_button_link  = get_theme_mod( 'cta_centered_button_link', "#" );
?>

<div id="mosalon-cta-centered" class="centered">

	<div class="wrap">
		<h3><?php echo esc_html( $cta_centered_title ); ?></h3>
		<p><?php echo esc_html( $cta_centered_text ); ?></p>
		<a class="button call-button" href="<?php echo esc_url( $cta_centered_button_link ); ?>"><?php echo esc_html( $cta_centered_button_text ); ?></a>				
	</div><!-- .wrap -->
	
</div><!-- #mosalon-cta-wide -->		