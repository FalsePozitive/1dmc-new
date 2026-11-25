<?php
function custom_post_country() {
	$labels = array(
		'name'               => _x( 'Countries', 'post type general name' ),
		'singular_name'      => _x( 'Country', 'post type singular name' ),
		'add_new'            => _x( 'Add New Country', 'book' ),
		'add_new_item'       => __( 'Add New Country' ),
		'edit_item'          => __( 'Edit Country' ),
		'new_item'           => __( 'New Country' ),
		'all_items'          => __( 'Countries' ),
		'view_item'          => __( 'View Country' ),
		'search_items'       => __( 'Search Countries' ),
		'not_found'          => __( 'No Countries found' ),
		'not_found_in_trash' => __( 'No Countries found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Countries'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Countries',
		'public'        => true,
		'menu_position' => 4,
		'menu_icon' => 'dashicons-admin-site',
		'supports'      => array( 'title', 'excerpt', 'thumbnail', 'editor' ),
		'has_archive'   => true,
		'hierarchical'      => true,
		
	);
	register_post_type( 'country', $args );	
}
add_action( 'init', 'custom_post_country' );
?>
<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_country_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_country_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New  Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		
	);

	register_taxonomy( 'country-category', array( 'country' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Tags', 'taxonomy general name' ),
		'singular_name'              => _x( 'Tag', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Tags' ),
		'popular_items'              => __( 'Popular Tags' ),
		'all_items'                  => __( 'All Tags' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag' ),
		'update_item'                => __( 'Update Tag' ),
		'add_new_item'               => __( 'Add New Tag' ),
		'new_item_name'              => __( 'New Tag Name' ),
		'separate_items_with_commas' => __( 'Separate tags with commas' ),
		'add_or_remove_items'        => __( 'Add or remove tags' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags' ),
		'not_found'                  => __( 'No tags found.' ),
		'menu_name'                  => __( 'Tags' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
	);

	register_taxonomy( 'country-tags', array( 'country' ), $args );
}
include (get_template_directory() . "/inc/cpt/country_meta.php");

?>