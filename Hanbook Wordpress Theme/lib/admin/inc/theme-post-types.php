<?php // Custom Post Types

function post_type_slide() {

	/*************************** Slide Post Type ***************************/
	
	register_post_type('slide', array(
		'labels' => array('name' => __('Slides'), 'singular_label' => __('Slide'), 'add_new_item' => __('Add Slide'), 'edit_item' => __('Edit Slide')),
		'public' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'_builtin' => false,
		'_edit_link' => 'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array("slug" => "slide"),
		'menu_position' => 20,
		'with_front' => true,
		'supports' => array('title', 'editor', 'comments', 'author')
	));
	
	
	/*************************** Slide Categories ***************************/
	
	register_taxonomy('slide_categories', 'slide', array('hierarchical' => true, 'labels' => array('name' => __( 'Slide Categories' ), 'singular_label' => __('Slide Category'), 'add_new_item' => __( 'Add New Slide Category' ), 'search_items' => __( 'Search Slide Categories' )), 'rewrite' => array('slug' => 'slide-categories')));
	
}

add_action('init', 'post_type_slide');

?>