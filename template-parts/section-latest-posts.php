<?php
/**
 * Landing page latest posts template part.
 *
 * This template part is called by template-landing-page.php.
 *
 *
 * @package		Mosalon WordPress Theme
 * @copyright	Copyright (c) 2016, ThemesBros.com, distributed under the terms of the GNU GPL
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		ThemesBros <www.themesbros.com/contact/>
 */

if ( 0 == absint( get_theme_mod( 'display_lp', 1 ) ) )
	return;
?>

<div id="mosalon-latest-posts" class="section">

	<div class="wrap">
		<?php
		$lp_title    = esc_html( get_theme_mod( 'latest_posts_title', __( 'Latest Posts', 'mosalon' ) ) );
		$lp_subtitle = esc_html( get_theme_mod( 'latest_posts_subtitle', __( 'Freshest news from our blog', 'mosalon' ) ) );
		$lp_number   = absint( get_theme_mod( 'latest_posts_number', 2 ) );
		$lp_cat      = absint( get_theme_mod( 'latest_posts_cats', 1 ) );
		$lp_img      = absint( get_theme_mod( 'latest_post_image', 1 ) );
		$lp_length   = absint( get_theme_mod( 'latest_posts_length', 22 ) );
		$lp_cols     = absint( get_theme_mod( 'latest_post_columns', 2 ) );

		?>

		<?php if ( ! empty( $lp_title ) && ! empty( $lp_subtitle ) ) : ?>

			<div class="section-info text-center">

				<?php if ( ! empty( $lp_title ) ) : ?>
					<h2 class="section-title text-center"><?php echo esc_attr( $lp_title ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $lp_subtitle ) ) : ?>
					<p class="section-description text-center"><?php echo esc_attr( $lp_subtitle ); ?></p>
			 	<?php endif; ?>

			</div><!-- .section-info -->

		<?php endif; ?>

		<?php

		$query_args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $lp_number,
			'category__in'        => $lp_cat,
			'ignore_sticky_posts' => true
		);

		$query = new WP_Query( $query_args );

		$img_url = ( true == $lp_img ) ? trailingslashit( get_template_directory_uri() ) . 'images/default-image.jpg' : false;

		/* Pull different image for size each column number. */
		if ( 1 == $lp_cols )
			$image_size = 'mosalon-full';

		elseif ( 2 == $lp_cols )
			$image_size = 'mosalon-lp-2-widget-image';

		elseif ( 3 == $lp_cols )
			$image_size = 'mosalon-lp-3-widget-image';

		elseif ( 4 == $lp_cols )
			$image_size = 'mosalon-lp-4-widget-image';

		$i = 0;	?>

		<div class="row">

		<?php if ( $query->have_posts() ) : ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); $i++; ?>

				<div class="col-1-<?php echo $lp_cols; ?>">

					<?php get_the_image(
						array(
							'size'    => $image_size,
							'caption' => true,
							'default' => $img_url,
							'order'   => array( 'featured', 'attachment', 'default' ),
						) );
					?>

					<h4 class="lp-title">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
					</h4>

					<?php
					$excerpt = get_the_excerpt();
					$words = explode( " ", $excerpt );
					echo '<p>' . implode( " ", array_splice( $words, 0, $lp_length ) ) . '...</p>';
					?>

					<a class="read-more-link" href="<?php the_permalink(); ?>"><?php _e( 'Read Article', 'mosalon' ); ?></a>

				</div>

				<?php if ( $i % $lp_cols == 0 && $i !== $lp_number ) : ?>

					</div><div class="row">

				<?php endif; ?>

			<?php endwhile; ?>

		<?php endif; ?>

		</div><!-- .row -->

	</div><!-- .wrap -->

</div><!-- #mosalon-latest-posts -->