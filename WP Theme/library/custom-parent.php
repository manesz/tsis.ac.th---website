<?php
function custom_parent_info() { 
	register_post_type('parent_info',
		array( 'labels' => array(
			'name' => __( 'Parent Information', 'bonestheme' ),
			'singular_name' => __( 'Parent Information Post', 'bonestheme' ),
			'all_items' => __( 'All Parent Information Posts', 'bonestheme' ),
			'add_new' => __( 'Add New', 'bonestheme' ),
			'add_new_item' => __( 'Add New Parent Information', 'bonestheme' ),
			'edit' => __( 'Edit', 'bonestheme' ),
			'edit_item' => __( 'Edit Parent Information', 'bonestheme' ),
			'new_item' => __( 'New Parent Information', 'bonestheme' ),
			'view_item' => __( 'View Parent Information', 'bonestheme' ),
			'search_items' => __( 'Search Parent Information', 'bonestheme' ),
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ),
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ),
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the parent Information', 'bonestheme' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'rewrite'	=> array( 'slug' => 'parent_info', 'with_front' => false ),
			'has_archive' => 'parent_info',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'sticky')
		)
	);
	register_taxonomy_for_object_type( 'category', 'parent_info' );
	register_taxonomy_for_object_type( 'post_tag', 'parent_info' );	
}
function remove_menu_from_cpt() {
  global $submenu;
  $post_type = 'book';
  $tax_slug = 'post_tag';
  $tag_slug = 'category';
  if (isset($submenu['edit.php?post_type=parent_info'])) {
    foreach ($submenu['edit.php?post_type=parent_info'] as $k => $sub) {
      if ((false !== strpos($sub[2],$tax_slug))||(false !== strpos($sub[2],$tag_slug))) {
        unset($submenu['edit.php?post_type=parent_info'][$k]);
      }
    }
  }
}
add_action('admin_menu','remove_menu_from_cpt');
if(has_category('test')){
	echo 'sfdfsdljfklsdjf';
}
add_action( 'init', 'custom_parent_info');
	register_taxonomy( 'parent_info_cat', 
		array('parent_info'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __( 'Parent Information Categories', 'bonestheme' ),
				'singular_name' => __( 'Parent Information Category', 'bonestheme' ),
				'search_items' =>  __( 'Search Parent Information Categories', 'bonestheme' ),
				'all_items' => __( 'All Parent Information Categories', 'bonestheme' ),
				'parent_item' => __( 'Parent Parent Information Category', 'bonestheme' ),
				'parent_item_colon' => __( 'Parent Parent Information Category:', 'bonestheme' ),
				'edit_item' => __( 'Edit Parent Information Category', 'bonestheme' ),
				'update_item' => __( 'Update Parent Information Category', 'bonestheme' ),
				'add_new_item' => __( 'Add New Parent Information Category', 'bonestheme' ),
				'new_item_name' => __( 'New Parent Information Category Name', 'bonestheme' )
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'category_parentinfo' ),
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'parent_info_tag', 
		array('parent_info'),
		array('hierarchical' => false,
			'labels' => array(
				'name' => __( 'Parent Information Tags', 'bonestheme' ),
				'singular_name' => __( 'Parent Information Tag', 'bonestheme' ),
				'search_items' =>  __( 'Search Parent Information Tags', 'bonestheme' ),
				'all_items' => __( 'All Parent Information Tags', 'bonestheme' ),
				'parent_item' => __( 'Parent Parent Information Tag', 'bonestheme' ),
				'parent_item_colon' => __( 'Parent Parent Information Tag:', 'bonestheme' ),
				'edit_item' => __( 'Edit Parent Information Tag', 'bonestheme' ),
				'update_item' => __( 'Update Parent Information Tag', 'bonestheme' ),
				'add_new_item' => __( 'Add New Parent Information Tag', 'bonestheme' ),
				'new_item_name' => __( 'New Parent Information Tag Name', 'bonestheme' )
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);
function remove_post_category() {
	remove_meta_box( 'categorydiv' , 'parent_info' , 'normal' ); 
	remove_meta_box( 'tagsdiv-post_tag' , 'parent_info' , 'normal' ); 
}
add_action( 'admin_menu' , 'remove_post_category' );