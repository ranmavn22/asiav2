<?php

function vietnam_secret_init() {
	register_post_type( 'vietnam_secret', array(
		'labels'            => array(
			'name'                => __( 'Vietnams', 'enfold' ),
			'singular_name'       => __( 'Vietnam', 'enfold' ),
			'all_items'           => __( 'All Vietnams', 'enfold' ),
			'new_item'            => __( 'New Vietnam', 'enfold' ),
			'add_new'             => __( 'Add New', 'enfold' ),
			'add_new_item'        => __( 'Add New Vietnam', 'enfold' ),
			'edit_item'           => __( 'Edit Vietnam', 'enfold' ),
			'view_item'           => __( 'View Vietnam', 'enfold' ),
			'search_items'        => __( 'Search Vietnams', 'enfold' ),
			'not_found'           => __( 'No Vietnams found', 'enfold' ),
			'not_found_in_trash'  => __( 'No Vietnams found in trash', 'enfold' ),
			'parent_item_colon'   => __( 'Parent Vietnam', 'enfold' ),
			'menu_name'           => __( 'Vietnams', 'enfold' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => true,
		'rewrite'           => array( 'slug' => 'vietnam-secret' ,'with_front' => false ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'vietnam_secret',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );
}
add_action( 'init', 'vietnam_secret_init' );

function vietnam_secret_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['vietnam_secret'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Vietnam updated. <a target="_blank" href="%s">View Vietnam</a>', 'enfold'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'enfold'),
		3 => __('Custom field deleted.', 'enfold'),
		4 => __('Vietnam updated.', 'enfold'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Vietnam restored to revision from %s', 'enfold'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Vietnam published. <a href="%s">View Vietnam</a>', 'enfold'), esc_url( $permalink ) ),
		7 => __('Vietnam saved.', 'enfold'),
		8 => sprintf( __('Vietnam submitted. <a target="_blank" href="%s">Preview Vietnam</a>', 'enfold'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Vietnam scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Vietnam</a>', 'enfold'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Vietnam draft updated. <a target="_blank" href="%s">Preview Vietnam</a>', 'enfold'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'vietnam_secret_updated_messages' );
function category_vnsecret_init() {
    register_taxonomy( 'category_vnsecret', array( 'vietnam_secret' ), array(
        'hierarchical'      => true,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'voyage-au-vietnam-autrement' ,'with_front' => false ),
        'capabilities'      => array(
            'manage_terms'  => 'edit_posts',
            'edit_terms'    => 'edit_posts',
            'delete_terms'  => 'edit_posts',
            'assign_terms'  => 'edit_posts'
        ),
        'labels'            => array(
            'name'                       => __( 'Category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'singular_name'              => _x( 'Category vnsecret', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
            'search_items'               => __( 'Search category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'popular_items'              => __( 'Popular category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'all_items'                  => __( 'All category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'parent_item'                => __( 'Parent category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'parent_item_colon'          => __( 'Parent category vnsecret:', 'YOUR-TEXTDOMAIN' ),
            'edit_item'                  => __( 'Edit category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'update_item'                => __( 'Update category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'add_new_item'               => __( 'New category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'new_item_name'              => __( 'New category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'separate_items_with_commas' => __( 'Separate category vnsecrets with commas', 'YOUR-TEXTDOMAIN' ),
            'add_or_remove_items'        => __( 'Add or remove category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'choose_from_most_used'      => __( 'Choose from the most used category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'not_found'                  => __( 'No category vnsecrets found.', 'YOUR-TEXTDOMAIN' ),
            'menu_name'                  => __( 'Category vnsecrets', 'YOUR-TEXTDOMAIN' ),
        ),
        'show_in_rest'      => true,
        'rest_base'         => 'category_vnsecret',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ) );
	
	register_taxonomy( 'category_vnsecret_feature', array( 'vietnam_secret' ), array(
        'hierarchical'      => true,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => true,
        'capabilities'      => array(
            'manage_terms'  => 'edit_posts',
            'edit_terms'    => 'edit_posts',
            'delete_terms'  => 'edit_posts',
            'assign_terms'  => 'edit_posts'
        ),
        'labels'            => array(
            'name'                       => __( 'Category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'singular_name'              => _x( 'Category vnsecret', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
            'search_items'               => __( 'Search category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'popular_items'              => __( 'Popular category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'all_items'                  => __( 'All category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'parent_item'                => __( 'Parent category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'parent_item_colon'          => __( 'Parent category vnsecret:', 'YOUR-TEXTDOMAIN' ),
            'edit_item'                  => __( 'Edit category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'update_item'                => __( 'Update category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'add_new_item'               => __( 'New category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'new_item_name'              => __( 'New category vnsecret', 'YOUR-TEXTDOMAIN' ),
            'separate_items_with_commas' => __( 'Separate category vnsecrets with commas', 'YOUR-TEXTDOMAIN' ),
            'add_or_remove_items'        => __( 'Add or remove category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'choose_from_most_used'      => __( 'Choose from the most used category vnsecrets', 'YOUR-TEXTDOMAIN' ),
            'not_found'                  => __( 'No category vnsecrets found.', 'YOUR-TEXTDOMAIN' ),
            'menu_name'                  => __( 'Category features', 'YOUR-TEXTDOMAIN' ),
        ),
        'show_in_rest'      => true,
        'rest_base'         => 'category_vnsecret_feature',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ) );

}
add_action( 'init', 'category_vnsecret_init' );


require_once __DIR__.'/../metabox/vietnam_secret/metabox_vn_secret.php';
