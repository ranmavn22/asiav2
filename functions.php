<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-app', get_stylesheet_directory_uri() . '/assets/css/app.css' );
    wp_enqueue_script( 'slick_script', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'app_script', get_stylesheet_directory_uri() . '/assets/js/app.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

// Thêm script vào backend
add_action('admin_enqueue_scripts', 'wz_custom_admin_style');
if (!function_exists("wz_custom_admin_style")):
    function wz_custom_admin_style()
    {
        $args = array('posts_per_page'   => -1, 'post_type'  => 'hotels', 'post_status'      => 'publish', 'suppress_filters' => true);
        $posts_array = get_posts( $args );
        wp_enqueue_media();
        wp_enqueue_script('my_custom_script_admin', get_stylesheet_directory_uri() . '/assets/js/custom_admin.js', array('jquery'));
        wp_localize_script('my_custom_script_admin', 'my_object', array('ajax_url' => admin_url('admin-ajax.php'),'data_hotel' => $posts_array));
        wp_enqueue_style('my_admin-style', get_stylesheet_directory_uri() . '/assets/css/style_admin.css');
    }
endif;

include_once __DIR__. '/post-types/hotels.php';
include_once __DIR__. '/post-types/temoignages.php';
include_once __DIR__. '/post-types/tours.php';
include_once __DIR__. '/post-types/vietnam_secret.php';
include_once __DIR__. '/libs/add_custom_fields_category.php';
include_once __DIR__. '/libs/register_widget.php';



// Register shortcode
if (!function_exists('main_menu_callback')):
    function main_menu_callback()
    {
        include __DIR__.'/shortcode_element/shortcode_menu.php';
    }
    add_shortcode('main_menu', 'main_menu_callback');
endif;

if (!function_exists('search_function_callback')):
    function search_function_callback()
    {
        include __DIR__.'/shortcode_element/shortcode_search_function.php';
    }
    add_shortcode('search_form', 'search_function_callback');
endif;

if (!function_exists('tour_home_callback')):
    function tour_home_callback()
    {
        include __DIR__.'/shortcode_element/shortcode_list_tour_home.php';
    }
    add_shortcode('tour_feature', 'tour_home_callback');
endif;
