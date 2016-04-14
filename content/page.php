<article <?php hybrid_attr( 'post' ); ?>>

	<?php get_the_image(
			array(
				'size'    => 'mosalon-full',
				'caption' => true,
				'order'   => array( 'featured', 'attachment' )
			)
	); ?>

	<header class="entry-header">
		<?php the_title( '<h1 ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'mosalon' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

</article><!-- .entry -->