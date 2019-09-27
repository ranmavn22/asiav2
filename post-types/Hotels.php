<?php
if (!defined('ABSPATH')) {
    die();
}
function Hotels_init() {
	register_post_type( 'hotels', array(
		'labels'            => array(
			'name'                => __( 'Hotels', 'enfold' ),
			'singular_name'       => __( 'Hotels', 'enfold' ),
			'all_items'           => __( 'All Hotels', 'enfold' ),
			'new_item'            => __( 'New Hotels', 'enfold' ),
			'add_new'             => __( 'Add New', 'enfold' ),
			'add_new_item'        => __( 'Add New Hotels', 'enfold' ),
			'edit_item'           => __( 'Edit Hotels', 'enfold' ),
			'view_item'           => __( 'View Hotels', 'enfold' ),
			'search_items'        => __( 'Search Hotels', 'enfold' ),
			'not_found'           => __( 'No Hotels found', 'enfold' ),
			'not_found_in_trash'  => __( 'No Hotels found in trash', 'enfold' ),
			'parent_item_colon'   => __( 'Parent Hotels', 'enfold' ),
			'menu_name'           => __( 'Hotels', 'enfold' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' , 'excerpt','thumbnail'),
		'has_archive'       => true,
		'rewrite'           => array( 'slug' => 'hotels' ,'with_front' => false ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'hotels',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'Hotels_init' );

function Hotels_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['hotels'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Hotels updated. <a target="_blank" href="%s">View Hotels</a>', 'enfold'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'enfold'),
		3 => __('Custom field deleted.', 'enfold'),
		4 => __('Hotels updated.', 'enfold'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Hotels restored to revision from %s', 'enfold'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Hotels published. <a href="%s">View Hotels</a>', 'enfold'), esc_url( $permalink ) ),
		7 => __('Hotels saved.', 'enfold'),
		8 => sprintf( __('Hotels submitted. <a target="_blank" href="%s">Preview Hotels</a>', 'enfold'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Hotels scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Hotels</a>', 'enfold'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Hotels draft updated. <a target="_blank" href="%s">Preview Hotels</a>', 'enfold'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'Hotels_updated_messages' );

function Categoty_init() {
    register_taxonomy( 'category_hotel', array( 'hotels' ), array(
        'hierarchical'      => true,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'list-hotels' ,'with_front' => false ),
        'capabilities'      => array(
            'manage_terms'  => 'edit_posts',
            'edit_terms'    => 'edit_posts',
            'delete_terms'  => 'edit_posts',
            'assign_terms'  => 'edit_posts'
        ),
        'labels'            => array(
            'name'                       => __( 'Categories', 'YOUR-TEXTDOMAIN' ),
            'singular_name'              => _x( 'Category', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
            'search_items'               => __( 'Search categories', 'YOUR-TEXTDOMAIN' ),
            'popular_items'              => __( 'Popular categories', 'YOUR-TEXTDOMAIN' ),
            'all_items'                  => __( 'All categories', 'YOUR-TEXTDOMAIN' ),
            'parent_item'                => __( 'Parent category', 'YOUR-TEXTDOMAIN' ),
            'parent_item_colon'          => __( 'Parent category:', 'YOUR-TEXTDOMAIN' ),
            'edit_item'                  => __( 'Edit category', 'YOUR-TEXTDOMAIN' ),
            'update_item'                => __( 'Update category', 'YOUR-TEXTDOMAIN' ),
            'add_new_item'               => __( 'New category', 'YOUR-TEXTDOMAIN' ),
            'new_item_name'              => __( 'New category', 'YOUR-TEXTDOMAIN' ),
            'separate_items_with_commas' => __( 'Separate categories with commas', 'YOUR-TEXTDOMAIN' ),
            'add_or_remove_items'        => __( 'Add or remove categories', 'YOUR-TEXTDOMAIN' ),
            'choose_from_most_used'      => __( 'Choose from the most used categories', 'YOUR-TEXTDOMAIN' ),
            'not_found'                  => __( 'No categories found.', 'YOUR-TEXTDOMAIN' ),
            'menu_name'                  => __( 'Categories', 'YOUR-TEXTDOMAIN' ),
        ),
        'show_in_rest'      => true,
        'rest_base'         => 'Category',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ) );
    $labels = array(
        'name'              => _x( 'Tags', 'textdomain' ),
        'singular_name'     => _x( 'Tag', 'textdomain' ),
        'search_items'      => __( 'Search Tag', 'textdomain' ),
        'all_items'         => __( 'All Tag', 'textdomain' ),
        'parent_item'       => __( 'Parent Tag', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Tag:', 'textdomain' ),
        'edit_item'         => __( 'Edit Tag', 'textdomain' ),
        'update_item'       => __( 'Update Tag', 'textdomain' ),
        'add_new_item'      => __( 'Add New Tag', 'textdomain' ),
        'new_item_name'     => __( 'New Genre Tag', 'textdomain' ),
        'menu_name'         => __( 'Tags', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );


    register_taxonomy( 'tags_hotel', array( 'hotels' ), $args );

}
add_action( 'init', 'Categoty_init' );


// Add metabox
require_once __DIR__.'/../metabox/hotels/metabox_infor_hotel.php';
require_once __DIR__.'/../metabox/hotels/metabox_form.php';

































