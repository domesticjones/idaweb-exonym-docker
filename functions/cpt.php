<?php
/*
===========================
  [[[ Custom Post Types ]]]
===========================
*/

// Clear Rewrite Rules for CPT's
function ex_theme_terlet() {
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'ex_theme_terlet');

// Register Custom Post Type
function cpt_services() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'services' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'services' ),
		'menu_name'             => __( 'Services', 'services' ),
		'name_admin_bar'        => __( 'Service', 'services' ),
		'archives'              => __( 'Service Archives', 'services' ),
		'attributes'            => __( 'Service Attributes', 'services' ),
		'parent_item_colon'     => __( 'Parent Service:', 'services' ),
		'all_items'             => __( 'All Services', 'services' ),
		'add_new_item'          => __( 'Add New Service', 'services' ),
		'add_new'               => __( 'Add New', 'services' ),
		'new_item'              => __( 'New Service', 'services' ),
		'edit_item'             => __( 'Edit Service', 'services' ),
		'update_item'           => __( 'Update Service', 'services' ),
		'view_item'             => __( 'View Service', 'services' ),
		'view_items'            => __( 'View Services', 'services' ),
		'search_items'          => __( 'Search Service', 'services' ),
		'not_found'             => __( 'Not found', 'services' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'services' ),
		'featured_image'        => __( 'Featured Image', 'services' ),
		'set_featured_image'    => __( 'Set featured image', 'services' ),
		'remove_featured_image' => __( 'Remove featured image', 'services' ),
		'use_featured_image'    => __( 'Use as featured image', 'services' ),
		'insert_into_item'      => __( 'Insert into item', 'services' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'services' ),
		'items_list'            => __( 'Items list', 'services' ),
		'items_list_navigation' => __( 'Items list navigation', 'services' ),
		'filter_items_list'     => __( 'Filter items list', 'services' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'services' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-admin-customizer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'cpt_services', 0 );

// Redirect archives to page
function redirect_services_archive() {
  if( !is_admin && is_post_type_archive( 'service' ) ) {
    wp_redirect( home_url( 'services' ), 301 );
    exit();
  }
}
add_action( 'template_redirect', 'redirect_cpt_archive' );

// Change Enter Title Here
function wpb_change_title_text($title){
$screen = get_current_screen();
  if('service' == $screen->post_type) {
    $title = 'Enter the name of the service';
  }
  return $title;
}

add_filter( 'enter_title_here', 'wpb_change_title_text' );
