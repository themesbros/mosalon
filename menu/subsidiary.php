<nav <?php hybrid_attr( 'menu', 'subsidiary' ); ?>>
		
	<?php wp_nav_menu(
		array(
			'theme_location' => 'subsidiary',
			'container'      => '',
			'menu_id'        => 'menu-subsidiary-items',
			'menu_class'     => 'menu-items',
			'fallback_cb'    => 'wp_page_menu',
			'items_wrap'     => '<ul id="%s" class="%s">%s</ul>',
			'depth'          => -1
		)
	); ?>
		
</nav><!-- #menu-subsidiary -->
