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
 * Yoast SEO breadcrumbs
 * Fix voor custom post types
 */
function my_wpseo_breadcrumb_links( $links ) {
    if ( is_single() ) {
        $cpt_object = get_post_type_object( get_post_type() );

        if ( !$cpt_object->_builtin ) {
            $landing_page = get_page_by_path( $cpt_object->rewrite['slug'] );

            if( isset($landing_page) ) {
           		array_splice( $links, 1, 0, array(
           		    array(
           		        'id' => $landing_page->ID
           		    )
           		)); 	
            }
        }
    }
 
    return $links;
}

add_filter( 'wpseo_breadcrumb_links', 'my_wpseo_breadcrumb_links' );


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
// function post_remove() {
//    //remove_menu_page('edit.php');
//    remove_menu_page('edit-comments.php');
// }
// add_action('admin_menu', 'post_remove');


/**
 * Verwijder overbodige classes uit navigaties
 * Behalve de active classes
 */
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  	return is_array($var) ? array_intersect($var, array('current-menu-item','current-menu-parent')) : '';
}


/**
 * Editor toegang geven tot menu
 */
$roleEditor = get_role( 'editor' );
$roleEditor->add_cap( 'edit_theme_options' );


//====================
// Custom login logo
//====================
function change_login_logo() { ?>
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

function change_login_logo_url() {
	return home_url();
}

function change_login_logo_url_title() {
	return '';
}

add_action( 'login_enqueue_scripts', 'change_login_logo' );
add_filter( 'login_headerurl', 'change_login_logo_url' );
add_filter( 'login_headertitle', 'change_login_logo_url_title' );


//============
// Left menu
//============
function edit_wp_menu() {
	//--------------------
	// Remove menu items
	//--------------------
	//remove_menu_page( 'index.php' );                  //Dashboard
	//remove_menu_page( 'edit.php' );                   //Posts
	//remove_menu_page( 'upload.php' );                 //Media
	//remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
	remove_menu_page( 'themes.php' );                 //Appearance
	//remove_menu_page( 'plugins.php' );                //Plugins
	//remove_menu_page( 'users.php' );                  //Users
	remove_menu_page( 'tools.php' );                  //Tools
	//remove_menu_page( 'options-general.php' );        //Settings	

	//---------
	// Rename
	//---------
	global $menu;
	global $submenu;

	$menu[5][0] = 'Nieuws';
}

function change_post_labels() {
	global $wp_post_types;

	$articlesLabels = $wp_post_types['post']->labels;

	$articlesLabels->name = "Nieuws";
	$articlesLabels->singular_name = "Bericht";
	$articlesLabels->add_new = "Nieuw bericht";
	$articlesLabels->add_new_item = "Nieuw bericht toevoegen";
	$articlesLabels->edit_item = "Bericht bewerken";
	$articlesLabels->new_item = "Nieuw bericht";
	$articlesLabels->view_item = "Bericht bekijken";
	$articlesLabels->search_items = "Berichten zoeken";
	$articlesLabels->not_found = "Geen berichten gevonden.";
	$articlesLabels->not_found_in_trash = "Geen berichten gevonden in de prullenbak.";
	$articlesLabels->parent_item_colon = "";
	$articlesLabels->all_items = "Alle berichten";
	$articlesLabels->archives = "Berichtenarchief";
	$articlesLabels->insert_into_item = "Invoegen in bericht";
	$articlesLabels->uploaded_to_this_item = "Geüpload naar dit bericht";
	$articlesLabels->featured_image = "Uitgelichte Afbeelding";
	$articlesLabels->set_featured_image = "Uitgelichte afbeelding instellen";
	$articlesLabels->remove_featured_image = "Uitgelichte afbeelding verwijderen";
	$articlesLabels->use_featured_image = "Als uitgelichte afbeelding gebruiken";
	$articlesLabels->filter_items_list = "Berichten filteren";
	$articlesLabels->items_list_navigation = "Berichtenlijst navigatie";
	$articlesLabels->items_list = "Berichtenlijst";
	$articlesLabels->menu_name = "Berichten";
	$articlesLabels->name_admin_bar = "Bericht";
}


add_action( 'admin_menu', 'edit_wp_menu' );
add_action( 'init', 'change_post_labels' );


//============
// Admin bar
//============
function remove_admin_bar_links() {
	global $wp_admin_bar;

	//print_r($wp_admin_bar);

	$wp_admin_bar->remove_menu( 'wp-logo' );
	$wp_admin_bar->remove_menu( 'comments' );
	$wp_admin_bar->remove_menu( 'new-user' );
}

add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


//=========
// Footer
//=========
function change_admin_footer() {
	echo '';
}

add_filter( 'admin_footer_text', 'change_admin_footer' );


//===========================================
// Remove wordpress version against hackers
//===========================================
function remove_version() {
 	return '';
}

add_filter('the_generator', 'remove_version');
