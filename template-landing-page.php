<?php
/**
 * Template Name: Landing Page
 *
 */

get_header(); // Loads the header.php template. ?>

	<main <?php hybrid_attr( 'content' ); ?>>

		<?php
		$default_sections = array(
			'top-cta',
			'countdown',
			'video',
			'features',
			'cta-wide',
			'latest-posts',
			'cta-centered',
		);

		$sections = array();

		$i = 0;

		foreach( $default_sections as $section ) {
			$sections[] = get_theme_mod( "section_{$i}", $default_sections[$i] );
			$i++;
		}

		$sections = array_unique( $sections );

		foreach( $sections as $section )
			get_template_part( "template-parts/section", $section );
		?>

	</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>