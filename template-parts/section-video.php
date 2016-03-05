<?php 
/**
 * Landing page video template part.
 *
 * This template part is called by template-landing-page.php.
 *
 *
 * @package		Mosalon WordPress Theme
 * @copyright	Copyright (c) 2016, ThemesBros.com, distributed under the terms of the GNU GPL
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		ThemesBros <www.themesbros.com/contact/>
 */

if ( 0 == absint( get_theme_mod( 'display_video', 1 ) ) )
	return;
?>

<div id="mosalon-video" class="wrap section">
		
	<?php 
	$title    = esc_html( get_theme_mod( 'video_title', __( 'Watch the video', 'mosalon' ) ) );
	$subtitle = esc_html( get_theme_mod( 'video_subtitle', __( 'Engage your audience with a video experience', 'mosalon' ) ) );
	$content  = get_theme_mod( 'video_content', '<iframe src="https://player.vimeo.com/video/27628086" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' );
 	?>

	<div class="section-info text-center">
	
		<?php if ( ! empty( $title ) ) : ?>
			<h2 class="section-title text-center"><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $subtitle ) ) : ?>
			<p class="section-description text-center"><?php echo $subtitle; ?></p>
	 	<?php endif; ?>
	
	</div><!-- .section-info -->	

	<?php echo $content; ?>		

</div><!-- #mosalon-video -->