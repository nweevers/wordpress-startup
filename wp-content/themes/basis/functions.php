<?php

if ( ! function_exists( 'theme_setup' ) ) :

function theme_setup() {

    add_theme_support( 'post-thumbnails' );

    //add_image_size( 'afbeeldingnaam', 200, 200, true );

	register_nav_menus( array(
		'primary'   => __( 'Hoofdmenu', 'basis' )
	) );

}
endif;
add_action( 'after_setup_theme', 'theme_setup' );


/**
 * Overzicht teksten
 */
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Admin menu
 */
function post_remove() {
   //remove_menu_page('edit.php');
   remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'post_remove');


/**
 * Editor toegang geven tot menu
 */
$roleEditor = get_role( 'editor' );
$roleEditor->add_cap( 'edit_theme_options' );


/**
 * Custom login logo
 */
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/resources/img/logo.png);
            background-size: auto;
            height: 65px;
            width: 341px;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

