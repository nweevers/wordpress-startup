<!DOCTYPE html>
<html class="no-js" lang="nl">
	<head>
		<meta charset="utf-8">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title><?php wp_title( '-', true, 'right' ); ?></title>

		<?php wp_head(); ?>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/browserconfig.xml" />

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/resources/css/all.css">
		<script src="<?php echo get_template_directory_uri(); ?>/resources/scripts/libs/header.min.js"></script>
	</head>

	<body>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Homepage <?php echo get_bloginfo( 'name' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/resources/img/logo.png" alt="Logo <?php echo get_bloginfo( 'name' ); ?>"></a>
					
		<nav class="mainnav">
			<?php
				wp_nav_menu(
					array(
						'container' 	=> false,
						'depth'  		=> 2,
						'items_wrap' 	=> '<ul class="%2$s">%3$s</ul>',
						'menu_class' 	=> 'level0',
						'theme_location' => 'primary'
					)
				);
			?>
		</nav>

		<?php get_search_form(); ?>

		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<div class="breadcrumbs">','</div>');
		} ?>
