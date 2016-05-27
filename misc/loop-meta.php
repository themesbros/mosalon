<?php if ( ! is_mosalon_landing_page() ) : ?>

	<div <?php hybrid_attr( 'loop-meta' ); ?>>

		<?php $img = esc_url( get_theme_mod( 'loop_img', trailingslashit( get_template_directory_uri() ) . 'images/sep.png' ) ); ?>

		<?php if ( ! empty( $img ) ) : ?>
			<div class="loop-img"></div>
		<?php endif; ?>

		<?php if ( is_front_page() || is_page() || is_woocommerce() ) :
			$title = get_theme_mod( 'loop_title_page', __( 'Company Info', 'mosalon' ) );
			$desc  = get_theme_mod( 'loop_subtitle_page', __( 'Company slogan', 'mosalon' ) );

		elseif ( is_home() || is_singular() ) :
			$title =  get_theme_mod( 'loop_title', __( 'From the blog', 'mosalon' ) );
			$desc  = get_theme_mod( 'loop_subtitle', __( 'Latest posts from our blog', 'mosalon' ) );

		elseif ( is_404() ) :
			$title = __( 'Nothing Found', 'mosalon' );
			$desc  = __( 'Apologies, but no entries were found.', 'mosalon' );

		else :
			$title = esc_attr( get_the_archive_title() );
			$desc  = esc_attr( get_the_archive_description() );

			if ( empty( $desc ) ) {
				// If there's no category description.
				if ( is_category() ) {
					$text = __( 'You are browsing the category', 'mosalon' );
					$desc = $text . ' '. esc_html( $title );
				}

				if ( is_author() )
					$desc = __( 'All posts by this author page' , 'mosalon' );

				if ( is_tag() )
					$desc = __( 'You are browsing posts tagged with' , 'mosalon' ) . ' ' . esc_html( $title ) . '.';
			}

		endif; ?>

		<?php if ( $title ) : ?>
			<h1 <?php hybrid_attr( 'loop-title' ); ?>><?php echo esc_html( $title ); ?></h1>
		<?php endif; ?>

		<?php if ( $desc ) : ?>
			<div <?php hybrid_attr( 'loop-description' ); ?>>
				<p><?php echo esc_html( $desc ); ?></p>
			</div><!-- .loop-description -->
		<?php endif; ?>

	</div><!-- .loop-meta -->

<?php endif; // End check if is Mosalon's landing page. ?>