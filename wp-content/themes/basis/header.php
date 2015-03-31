<!DOCTYPE html>
<html class="no-js" lang="nl">
    <head>
        <meta charset="utf-8">

        <title><?php wp_title( '-', true, 'right' ); ?></title>

        <?php wp_head(); ?>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    </head>

    <body>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Homepage <?php echo get_bloginfo( 'name' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/content/img/logo.png" alt="Logo <?php echo get_bloginfo( 'name' ); ?>"></a>
                    
        <nav class="mainnav">
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'level0',
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>'
                    )
                );
            ?>
        </nav>

        <?php get_search_form(); ?>

        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<div class="breadcrumbs">','</div>');
        } ?>