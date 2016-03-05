<?php get_header(); // Loads the header.php template. ?>

	<main <?php hybrid_attr( 'content' ); ?>>

		<?php get_template_part( 'loop' ); // Loads post loop. ?>
		
	</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>