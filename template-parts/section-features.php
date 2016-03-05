<?php 
/**
 * Landing page features template part.
 *
 * This template part is called by template-landing-page.php.
 *
 *
 * @package		Mosalon WordPress Theme
 * @copyright	Copyright (c) 2016, ThemesBros.com, distributed under the terms of the GNU GPL
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		ThemesBros <www.themesbros.com/contact/>
 */

if ( 0 == absint( get_theme_mod( 'display_featured', 1 ) ) )
	return;

$title    = esc_html( get_theme_mod( 'featured_items_title', __( 'Important Feature Points', 'mosalon' ) ) );
$subtitle = esc_html( get_theme_mod( 'featured_items_subtitle', __( 'Thinking big when you are small', 'mosalon' ) ) );
$position = esc_html( get_theme_mod( 'icons_position', 'left_aligned' ) );
$columns  = absint( get_theme_mod( 'featured_items_columns', 2 ) );
?>

<div id="mosalon-features" class="wrap section <?php echo $position; ?>">

	<div class="row">
		
		<?php if ( ! empty( $title ) && ! empty( $subtitle ) ) : ?>

			<div class="section-info text-center">
			
				<?php if ( ! empty( $title ) ) : ?>
					<h2 class="section-title text-center"><?php echo $title; ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $subtitle ) ) : ?>
					<p class="section-description text-center"><?php echo $subtitle; ?></p>
			 	<?php endif; ?>
			
			</div><!-- .section-info -->

		<?php endif; ?>		

	</div><!-- .row -->

	<?php $featured = array();

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
		$title = esc_html( get_theme_mod( "featured_items_title_{$i}", __( 'Very Important Feature Point', 'mosalon' ) ) );
		$text  = esc_html( get_theme_mod( "featured_items_text_{$i}", __( 'Lorem ipsum sit amet, dolor and easy way to get more organic search without unnecessary bells and whistles.', 'mosalon' ) ) );
		$icon  = esc_html( get_theme_mod( "featured_icon_{$i}", $icons[$i] ) );
		$size  = absint( get_theme_mod( "featured_icon_size_{$i}", $sizes[$i] ) );

		if ( ! empty( $title ) || ! empty( $text ) || ! empty( $icon ) ) 
			$featured[] = array( 'title' => $title, 'text' => $text, 'icon' => $icon, 'size' => $size );
	} ?>
		
	<?php $count = count( $featured ); $i = 1; ?>

	<div class="row">

	<?php foreach( $featured as $item ) : ?>

		<div class="feature-wrap col-1-<?php echo $columns; ?>">

			<?php if ( ! empty( $item['icon'] ) && $item['icon'] != 'none' ) : ?>

				<div class="feature-icon">								
					<i class="fa <?php echo $item['icon']; ?>" style="font-size: <?php echo $item['size']; ?>px;"></i>
				</div><!-- .feature-icon -->

			<?php endif; ?>

			<div class="feature-content">
				<h4 class="feature-content-title">
					<?php echo esc_html( $item['title'] ); ?>				
				</h4>
				<p><?php echo esc_html( $item['text'] ); ?></p>
			</div><!-- .feature-content -->

		</div><!-- .feature-wrap -->

		<?php if ( $i % $columns == 0 && $i !== $count ) : ?>			
			</div><div class="row">
		<?php endif; ?>

	<?php $i++; endforeach; ?>
	
	</div><!-- .row -->

</div><!-- #mosalon-features -->