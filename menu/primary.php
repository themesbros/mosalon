<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>

	<a id="toggle-primary-menu" href="#"></a>		
		
	<?php wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => 'ul',
			'menu_id'        => 'menu-primary-items',
			'menu_class'     => 'menu-items',
			'fallback_cb'    => 'wp_page_menu',
			'items_wrap'     => '<ul id="%s" class="%s">%s</ul>',
		)
	); ?>
		
</nav><!-- #menu-primary -->
