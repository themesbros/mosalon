<?php if ( is_mosalon_landing_page() && absint( get_theme_mod( 'display_sidebar', 1 ) ) == 1 ) return; ?>

<?php if ( is_active_sidebar( 'subsidiary' ) ) : // If the sidebar has widgets. ?>

	<aside <?php hybrid_attr( 'sidebar', 'subsidiary' ); ?>>

		<div class="wrap">
				
			<?php dynamic_sidebar( 'subsidiary' ); // Displays the subsidiary sidebar. ?>

		</div><!-- .wrap -->

	</aside><!-- #sidebar-subsidiary -->

<?php else : // Load default widgets. ?>

	<aside itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary" class="sidebar sidebar-cols-3" id="sidebar-subsidiary">	
		
		<div class="wrap">

			<section class="widget widget_recent_entries">
				<h3 class="widget-title"><?php _e( 'Recent Posts', 'mosalon' ); ?></h3>
				<ul><?php wp_get_archives('title_li=&type=postbypost&limit=6'); ?></ul>
			</section>

			<section class="widget widget_text">
				<h3 class="widget-title"><?php _e( 'Textwidget', 'mosalon' ); ?></h3>
				<div class="textwidget">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.
				Enim ad minim veniam, quis nostrud.
				</div>        
			</section>	

			<section class="widget widget_tag_cloud">
				<h3 class="widget-title"><?php _e( 'Tags', 'mosalon' ); ?></h3>
				<div class="tagcloud">
					<?php wp_tag_cloud( array( 'number' => 20 ) ); ?>
				</div>
			</section>			
		
		</div><!-- .wrap -->

	</aside>

<?php endif; // End widgets check. ?>