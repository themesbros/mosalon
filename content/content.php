<article <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular() ) : // If viewing a single post. ?>

		<header class="entry-header">

			<?php the_title( '<h1 ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>

			<div class="entry-byline">
				<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
				<span <?php hybrid_attr( 'entry-author' ); ?>><?php _e( 'By ', 'mosalon' ); the_author_posts_link(); ?></span>
				<?php comments_popup_link( __( '0 comments', 'mosalon' ), __( '1 comment', 'mosalon' ), __( '% comments', 'mosalon' ), 'comments-link', __( 'Comments Off', 'mosalon' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'mosalon' ), '[', ']'); ?>
			</div><!-- .entry-byline -->

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'In: %s', 'mosalon' ) ) ); ?>
			<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged: %s', 'mosalon' ) ) ); ?>
		</footer><!-- .entry-footer -->

	<?php else : // If not viewing a single post. ?>

		<?php get_the_image( array( 'size' => 'mosalon-full', 'caption' => true, 'order' => array( 'featured', 'attachment' ) ) ); ?>

		<header class="entry-header">
			<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
			<div class="entry-byline">
				<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
				<span <?php hybrid_attr( 'entry-author' ); ?>><?php _e( 'By ', 'mosalon' ); the_author_posts_link(); ?></span>
				<?php comments_popup_link( __( '0 comments', 'mosalon' ), __( '1 comment', 'mosalon' ), __( '% comments', 'mosalon' ), 'comments-link', __( 'Comments Off', 'mosalon' ) ); ?>
			</div><!-- .entry-byline -->
		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<a class="more-link" href="<?php the_permalink(); ?>"><?php _e( 'Read More &rarr;', 'mosalon' ); ?></a>
		</footer><!-- .entry-footer -->

	<?php endif; // End single post check. ?>

</article><!-- .entry -->