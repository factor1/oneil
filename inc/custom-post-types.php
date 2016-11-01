<?php
  /*-----------------------------------------------------------------------------
    Register Custom Post Types
  -----------------------------------------------------------------------------*/

  // Register Custom Post Type for Our Work
  function our_work() {

  	$labels = array(
  		'name'                  => _x( 'Our Works', 'Post Type General Name', 'text_domain' ),
  		'singular_name'         => _x( 'Our Work', 'Post Type Singular Name', 'text_domain' ),
  		'menu_name'             => __( 'Our Work', 'text_domain' ),
  		'name_admin_bar'        => __( 'Our Work', 'text_domain' ),
  		'archives'              => __( 'Our Work Archives', 'text_domain' ),
  		'parent_item_colon'     => __( 'Parent Work:', 'text_domain' ),
  		'all_items'             => __( 'All Work', 'text_domain' ),
  		'add_new_item'          => __( 'Add New Work', 'text_domain' ),
  		'add_new'               => __( 'Add Work', 'text_domain' ),
  		'new_item'              => __( 'New Work', 'text_domain' ),
  		'edit_item'             => __( 'Edit Work', 'text_domain' ),
  		'update_item'           => __( 'Update Work', 'text_domain' ),
  		'view_item'             => __( 'View Work', 'text_domain' ),
  		'search_items'          => __( 'Search Work', 'text_domain' ),
  		'not_found'             => __( 'Not found', 'text_domain' ),
  		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
  		'featured_image'        => __( 'Featured Image', 'text_domain' ),
  		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
  		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
  		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
  		'insert_into_item'      => __( 'Insert into Work', 'text_domain' ),
  		'uploaded_to_this_item' => __( 'Uploaded to this Work', 'text_domain' ),
  		'items_list'            => __( 'Work list', 'text_domain' ),
  		'items_list_navigation' => __( 'Work list navigation', 'text_domain' ),
  		'filter_items_list'     => __( 'Filter Work list', 'text_domain' ),
  	);
  	$rewrite = array(
  		'slug'                  => 'work',
  		'with_front'            => true,
  		'pages'                 => true,
  		'feeds'                 => true,
  	);
  	$args = array(
  		'label'                 => __( 'Our Work', 'text_domain' ),
  		'description'           => __( 'Collection of Our Work', 'text_domain' ),
  		'labels'                => $labels,
  		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
  		'taxonomies'            => array( 'work_category', 'post_tag' ),
  		'hierarchical'          => false,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'menu_icon'             => 'dashicons-align-left',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => 'our-work',
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'rewrite'               => $rewrite,
  		'capability_type'       => 'page',
  	);
  	register_post_type( 'our_work', $args );

  }
  add_action( 'init', 'our_work', 0 );

  // Register Custom Taxonomy for Work Categories
function work_categories() {

	$labels = array(
		'name'                       => _x( 'Work Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Work Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Work Categories', 'text_domain' ),
		'all_items'                  => __( 'All Work Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Work Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Work Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Work Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Work Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Work Category', 'text_domain' ),
		'update_item'                => __( 'Update Work Category', 'text_domain' ),
		'view_item'                  => __( 'View Work Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Work Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Work Categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Work Categories', 'text_domain' ),
		'search_items'               => __( 'Search Work Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Work Categories', 'text_domain' ),
		'items_list'                 => __( 'Work Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Work Categories list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'work-category',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'work_category', array( 'our_work' ), $args );

}
add_action( 'init', 'work_categories', 0 );
