<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head>

<?php wp_head(); ?>

</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<header <?php hybrid_attr( 'header' ); ?>>
	
		<div id="branding">
			<?php hybrid_site_title(); ?>
			<?php hybrid_site_description(); ?>
		</div><!-- #branding -->				

		<?php hybrid_get_menu( 'primary' ); // Loads menu/primary.php template. ?>
		
	</header><!-- #header -->
		
	<?php locate_template( array( 'misc/loop-meta.php' ), true ); // Loads the misc/loop-meta.php template. ?>

	<div id="main" class="wrap">