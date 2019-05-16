<?php

// add feed links to header
if (function_exists('automatic_feed_links')) {
	automatic_feed_links();
} else {
	return;
}

// include custom jQuery
function dw_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'dw_include_custom_jquery');

// styles and scripts
function dw_scripts() {
  wp_enqueue_style( 'dw-style', get_stylesheet_uri());
  wp_register_script('dw-ocean', get_stylesheet_directory_uri().'/js/DW.ocean.js', array(),NULL, true);
	wp_enqueue_script('dw-ocean');
	wp_register_script('dw-drawyer', get_stylesheet_directory_uri().'/js/DW.drawyer.js', array(),NULL, true);
	wp_enqueue_script('dw-drawyer');
	wp_register_script('jquery-magnific-popup', get_stylesheet_directory_uri().'/js/jquery.magnific-popup.min.js', array('jquery'),NULL, true);
	wp_enqueue_script('jquery-magnific-popup');
}
add_action( 'wp_enqueue_scripts', 'dw_scripts' ); 



// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { margin-bottom:0!important; height:120px!important; background-size:contain!important; background-image: url('.get_stylesheet_directory_uri().'/img/dw-logo-dark.png) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');


// add google analytics to footer
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
//add_action('wp_footer', 'add_google_analytics');


// Register Custom Post Type
function custom_post_type_portfolio() {

	$labels = array(
		'name'                  => _x( 'Portfolio Items', 'Portfolio Item General Name', 'text_domain' ),
		'singular_name'         => _x( 'Portfolio Item', 'Portfolio Item Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Portfolio Items', 'text_domain' ),
		'name_admin_bar'        => __( 'Portfolio Item', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio Item', 'text_domain' ),
		'description'           => __( 'Portfolio Item Description', 'text_domain' ),
		'labels'                => $labels,
		'exclude_from_search'   => true,
		'supports'              => array('title', 'editor', 'thumbnail'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'has_archive'						=> 'portfolio',
		'rewrite' => 'portfolio',
		'show_in_rest'          => true,
		'public' => true
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'custom_post_type_portfolio', 0 );

?>