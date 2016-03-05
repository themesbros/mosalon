<?php if ( ! is_mosalon_landing_page() ) : ?>

	<div <?php hybrid_attr( 'loop-meta' ); ?>>
		
		<?php $img = get_theme_mod( 'loop_img', trailingslashit( get_template_directory_uri() ) . 'images/sep.png' ); ?>

		<?php if ( ! empty( $img ) ) : ?>
			<div class="loop-img"></div>
		<?php endif; ?>

		<?php if ( is_front_page() || is_home() || is_singular() ) : 
			$title =  get_theme_mod( 'loop_title', __( 'From the blog', 'mosalon' ) ); 
			$desc  = '<p>' . get_theme_mod( 'loop_subtitle', __( 'Latest posts from our blog', 'mosalon' ) ) . '</p>';		

		elseif ( is_404() ) : 
			$title = __( 'Nothing Found', 'mosalon' );
			$desc  = '<p>'. __( 'Apologies, but no entries were found.', 'mosalon' ) . '</p>';
			
		else : 
			$title = esc_attr( get_the_archive_title() ); 
			$desc  = esc_attr( get_the_archive_description() );
			
			if ( empty( $desc ) ) {
				// If there's no category description.
				if ( is_category() ) {
					$text = __( 'You are browsing the category', 'mosalon' );
					$desc = '<p>' . $text . ' '. $title . '.</p>';
				}

				if ( is_author() )
					$desc = '<p>' . __( 'All posts by this author page' , 'mosalon' ) . '</p>';

				if ( is_tag() )
					$desc = '<p>' . __( 'You are browsing posts tagged with' , 'mosalon' ) . ' ' . $title . '.</p>';
			}
	 
		endif; ?>

		<h1 <?php hybrid_attr( 'loop-title' ); ?>><?php echo $title; ?></h1>

		<div <?php hybrid_attr( 'loop-description' ); ?>>
			<?php echo $desc; ?>
		</div><!-- .loop-description -->

	</div><!-- .loop-meta -->

<?php endif; // End check if is Mosalon's landing page. ?>