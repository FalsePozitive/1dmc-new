<?php
// Register Testimonials Custom Post Type
function custom_post_testimonials() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
		'add_new'            => _x( 'Add New Testimonial', 'testimonial' ),
		'add_new_item'       => __( 'Add New Testimonial' ),
		'edit_item'          => __( 'Edit Testimonial' ),
		'new_item'           => __( 'New Testimonial' ),
		'all_items'          => __( 'Testimonials' ),
		'view_item'          => __( 'View Testimonial' ),
		'search_items'       => __( 'Search Testimonials' ),
		'not_found'          => __( 'No Testimonials found' ),
		'not_found_in_trash' => __( 'No Testimonials found in the Trash' ),
		'menu_name'          => 'Testimonials'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Testimonials',
		'public'        => true,
		'menu_position' => 4,
		'menu_icon'     => 'dashicons-admin-comments',
		'supports'      => array( 'title', 'editor' ),
		'has_archive'   => true,
		'hierarchical'  => true,
	);

	register_post_type( 'testimonials', $args );
}
add_action( 'init', 'custom_post_testimonials' );


// Register Testimonial Categories Taxonomy
function testimonials_taxonomy() {

	$labels = array(
		'name'              => _x( 'Testimonial Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Testimonial Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true, // behaves like Categories (true) vs Tags (false)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'testimonial-category' ),
	);

	register_taxonomy( 'testimonial-categories', array( 'testimonials' ), $args );
}
add_action( 'init', 'testimonials_taxonomy' );
?>
