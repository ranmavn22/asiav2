<?php
if (!defined('ABSPATH')) {
    die();
}
function temoignages_init() {
	register_post_type( 'temoignages', array(
		'labels'            => array(
			'name'                => __( 'Temoignages', 'enfold' ),
			'singular_name'       => __( 'Temoignages', 'enfold' ),
			'all_items'           => __( 'All Temoignages', 'enfold' ),
			'new_item'            => __( 'New Temoignages', 'enfold' ),
			'add_new'             => __( 'Add New', 'enfold' ),
			'add_new_item'        => __( 'Add New Temoignages', 'enfold' ),
			'edit_item'           => __( 'Edit Temoignages', 'enfold' ),
			'view_item'           => __( 'View Temoignages', 'enfold' ),
			'search_items'        => __( 'Search Temoignages', 'enfold' ),
			'not_found'           => __( 'No Temoignages found', 'enfold' ),
			'not_found_in_trash'  => __( 'No Temoignages found in trash', 'enfold' ),
			'parent_item_colon'   => __( 'Parent Temoignages', 'enfold' ),
			'menu_name'           => __( 'Temoignages', 'enfold' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor','thumbnail' ),
		'has_archive'       => true,
		'rewrite'           => array( 'slug' => 'temoignages' ,'with_front' => false ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'temoignages',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'temoignages_init' );

function temoignages_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['temoignages'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Temoignages updated. <a target="_blank" href="%s">View Temoignages</a>', 'enfold'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'enfold'),
		3 => __('Custom field deleted.', 'enfold'),
		4 => __('Temoignages updated.', 'enfold'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Temoignages restored to revision from %s', 'enfold'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Temoignages published. <a href="%s">View Temoignages</a>', 'enfold'), esc_url( $permalink ) ),
		7 => __('Temoignages saved.', 'enfold'),
		8 => sprintf( __('Temoignages submitted. <a target="_blank" href="%s">Preview Temoignages</a>', 'enfold'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Temoignages scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Temoignages</a>', 'enfold'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Temoignages draft updated. <a target="_blank" href="%s">Preview Temoignages</a>', 'enfold'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'temoignages_updated_messages' );

function category_temoignages_init() {
    register_taxonomy( 'category_temoignages', array( 'temoignages' ), array(
        'hierarchical'      => true,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'category-temoignages' ,'with_front' => false ),
        'capabilities'      => array(
            'manage_terms'  => 'edit_posts',
            'edit_terms'    => 'edit_posts',
            'delete_terms'  => 'edit_posts',
            'assign_terms'  => 'edit_posts'
        ),
        'labels'            => array(
            'name'                       => __( 'Category', 'YOUR-TEXTDOMAIN' ),
            'singular_name'              => _x( 'Category', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
            'search_items'               => __( 'Search category', 'YOUR-TEXTDOMAIN' ),
            'popular_items'              => __( 'Popular category', 'YOUR-TEXTDOMAIN' ),
            'all_items'                  => __( 'All category', 'YOUR-TEXTDOMAIN' ),
            'parent_item'                => __( 'Parent category', 'YOUR-TEXTDOMAIN' ),
            'parent_item_colon'          => __( 'Parent category:', 'YOUR-TEXTDOMAIN' ),
            'edit_item'                  => __( 'Edit category', 'YOUR-TEXTDOMAIN' ),
            'update_item'                => __( 'Update category', 'YOUR-TEXTDOMAIN' ),
            'add_new_item'               => __( 'New category', 'YOUR-TEXTDOMAIN' ),
            'new_item_name'              => __( 'New category', 'YOUR-TEXTDOMAIN' ),
            'separate_items_with_commas' => __( 'Separate category with commas', 'YOUR-TEXTDOMAIN' ),
            'add_or_remove_items'        => __( 'Add or remove category', 'YOUR-TEXTDOMAIN' ),
            'choose_from_most_used'      => __( 'Choose from the most used category', 'YOUR-TEXTDOMAIN' ),
            'not_found'                  => __( 'No category found.', 'YOUR-TEXTDOMAIN' ),
            'menu_name'                  => __( 'Category', 'YOUR-TEXTDOMAIN' ),
        ),
        'show_in_rest'      => true,
        'rest_base'         => 'category_temoignages',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ) );

}
add_action( 'init', 'category_temoignages_init' );


require_once __DIR__.'/../metabox/temoignages/metabox_field_infor.php';


