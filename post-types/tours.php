<?php
if (!defined('ABSPATH')) {
    die();
}

function tours_init() {
	register_post_type( 'tours', array(
		'labels'            => array(
			'name'                => __( 'Tours', 'enfold' ),
			'singular_name'       => __( 'Tours', 'enfold' ),
			'all_items'           => __( 'All Tours', 'enfold' ),
			'new_item'            => __( 'New Tours', 'enfold' ),
			'add_new'             => __( 'Add New', 'enfold' ),
			'add_new_item'        => __( 'Add New Tours', 'enfold' ),
			'edit_item'           => __( 'Edit Tours', 'enfold' ),
			'view_item'           => __( 'View Tours', 'enfold' ),
			'search_items'        => __( 'Search Tours', 'enfold' ),
			'not_found'           => __( 'No Tours found', 'enfold' ),
			'not_found_in_trash'  => __( 'No Tours found in trash', 'enfold' ),
			'parent_item_colon'   => __( 'Parent Tours', 'enfold' ),
			'menu_name'           => __( 'Tours', 'enfold' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title','editor','thumbnail','excerpt' ),
		'has_archive'       => true,
		'rewrite'           => array( 'slug' => 'circuit-vietnam' ,'with_front' => false ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'tours',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'tours_init' );

function tours_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['tours'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Tours updated. <a target="_blank" href="%s">View Tours</a>', 'enfold'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'enfold'),
		3 => __('Custom field deleted.', 'enfold'),
		4 => __('Tours updated.', 'enfold'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Tours restored to revision from %s', 'enfold'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Tours published. <a href="%s">View Tours</a>', 'enfold'), esc_url( $permalink ) ),
		7 => __('Tours saved.', 'enfold'),
		8 => sprintf( __('Tours submitted. <a target="_blank" href="%s">Preview Tours</a>', 'enfold'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Tours scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Tours</a>', 'enfold'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Tours draft updated. <a target="_blank" href="%s">Preview Tours</a>', 'enfold'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'tours_updated_messages' );

function category_tour_init() {
    register_taxonomy( 'category_tour', array( 'tours' ), array(
        'hierarchical'      => true,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'sejour-vietnam' ,'with_front' => false ),
        'capabilities'      => array(
            'manage_terms'  => 'edit_posts',
            'edit_terms'    => 'edit_posts',
            'delete_terms'  => 'edit_posts',
            'assign_terms'  => 'edit_posts'
        ),
        'labels'            => array(
            'name'                       => __( 'Category tours', 'YOUR-TEXTDOMAIN' ),
            'singular_name'              => _x( 'Category tour', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
            'search_items'               => __( 'Search category tours', 'YOUR-TEXTDOMAIN' ),
            'popular_items'              => __( 'Popular category tours', 'YOUR-TEXTDOMAIN' ),
            'all_items'                  => __( 'All category tours', 'YOUR-TEXTDOMAIN' ),
            'parent_item'                => __( 'Parent category tour', 'YOUR-TEXTDOMAIN' ),
            'parent_item_colon'          => __( 'Parent category tour:', 'YOUR-TEXTDOMAIN' ),
            'edit_item'                  => __( 'Edit category tour', 'YOUR-TEXTDOMAIN' ),
            'update_item'                => __( 'Update category tour', 'YOUR-TEXTDOMAIN' ),
            'add_new_item'               => __( 'New category tour', 'YOUR-TEXTDOMAIN' ),
            'new_item_name'              => __( 'New category tour', 'YOUR-TEXTDOMAIN' ),
            'separate_items_with_commas' => __( 'Separate category tours with commas', 'YOUR-TEXTDOMAIN' ),
            'add_or_remove_items'        => __( 'Add or remove category tours', 'YOUR-TEXTDOMAIN' ),
            'choose_from_most_used'      => __( 'Choose from the most used category tours', 'YOUR-TEXTDOMAIN' ),
            'not_found'                  => __( 'No category tours found.', 'YOUR-TEXTDOMAIN' ),
            'menu_name'                  => __( 'Category tours', 'YOUR-TEXTDOMAIN' ),
        ),
        'show_in_rest'      => true,
        'rest_base'         => 'category_tour',
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


    register_taxonomy( 'tags_tours', array( 'tours' ), $args );
	
	
	register_taxonomy( 'country_tour', array( 'tours' ), array(
        'hierarchical'      => true,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'country' ,'with_front' => false ),
        'capabilities'      => array(
            'manage_terms'  => 'edit_posts',
            'edit_terms'    => 'edit_posts',
            'delete_terms'  => 'edit_posts',
            'assign_terms'  => 'edit_posts'
        ),
        'labels'            => array(
            'name'                       => __( 'country tours', 'YOUR-TEXTDOMAIN' ),
            'singular_name'              => _x( 'country tour', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
            'search_items'               => __( 'Search country tours', 'YOUR-TEXTDOMAIN' ),
            'popular_items'              => __( 'Popular country tours', 'YOUR-TEXTDOMAIN' ),
            'all_items'                  => __( 'All country tours', 'YOUR-TEXTDOMAIN' ),
            'parent_item'                => __( 'Parent country tour', 'YOUR-TEXTDOMAIN' ),
            'parent_item_colon'          => __( 'Parent country tour:', 'YOUR-TEXTDOMAIN' ),
            'edit_item'                  => __( 'Edit country tour', 'YOUR-TEXTDOMAIN' ),
            'update_item'                => __( 'Update country tour', 'YOUR-TEXTDOMAIN' ),
            'add_new_item'               => __( 'New country tour', 'YOUR-TEXTDOMAIN' ),
            'new_item_name'              => __( 'New country tour', 'YOUR-TEXTDOMAIN' ),
            'separate_items_with_commas' => __( 'Separate country tours with commas', 'YOUR-TEXTDOMAIN' ),
            'add_or_remove_items'        => __( 'Add or remove country tours', 'YOUR-TEXTDOMAIN' ),
            'choose_from_most_used'      => __( 'Choose from the most used country tours', 'YOUR-TEXTDOMAIN' ),
            'not_found'                  => __( 'No country tours found.', 'YOUR-TEXTDOMAIN' ),
            'menu_name'                  => __( 'country tours', 'YOUR-TEXTDOMAIN' ),
        ),
        'show_in_rest'      => true,
        'rest_base'         => 'country_tour',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ) );

}
add_action( 'init', 'category_tour_init' );

// add meta box
require_once __DIR__."/../metabox/tour/metabox_infor_tour.php";
require_once __DIR__."/../metabox/tour/metabox_esprit_carte.php";
require_once __DIR__."/../metabox/tour/metabox_program.php";
require_once __DIR__."/../metabox/tour/metabox_tour_vietnam.php";



