<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'fancy-style', get_stylesheet_directory_uri() . '/assets/js/fancybox/jquery.fancybox-1.3.4.css' );
    wp_enqueue_style( 'style-app', get_stylesheet_directory_uri() . '/assets/css/app.css' );
    wp_enqueue_script( 'slick_script', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'fancy_script', get_stylesheet_directory_uri() . '/assets/js/fancybox/jquery.fancybox-1.3.4.pack.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'app_script', get_stylesheet_directory_uri() . '/assets/js/app.js', array('jquery'), '1.0.0', true );
    wp_localize_script( 'app_script', 'ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

// Backend script
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

add_image_size('feature_thumbnail',370,275, true);
add_image_size( 'custom-medium', 270, 220, true );
add_image_size( 'custom-large', 600, 350, true );

// Get list guide
add_action( 'wp_ajax_getGuide', 'getGuide' );
add_action( 'wp_ajax_nopriv_getGuide', 'getGuide' );
function getGuide(){
    $page = $_REQUEST['page'];
    include __DIR__.'/shortcode_element/shortcode_list_guid_vietnam.php';
    wp_die();
}

//Ajax set cookies
add_action('wp_ajax_set_cookies', 'wz_set_cookies_callback');
add_action('wp_ajax_nopriv_set_cookies', 'wz_set_cookies_callback');
if(!function_exists("wz_set_cookies_callback")){
    function wz_set_cookies_callback(){
        $tourID = $_REQUEST["id"];
        $cookie_name = "toursID_asia";
        $cookie_count = "toursID_asia_count";

        if(($_COOKIE["toursID_asia"] != "")){
            $cookie = $_COOKIE["toursID_asia"] .','.$tourID;
            $value_cookie_array = explode(',',$cookie);
            $unique_tours_value = array_unique($value_cookie_array);
            $value_cookie = join(',',$unique_tours_value);
        }else{
            $value_cookie = $tourID;
        }
        $tours = explode(',',$value_cookie);
        $unique_tours = array_unique($tours);
        $count = count($unique_tours);
        setcookie($cookie_name, $value_cookie, time() + (86400 * 30), "/");
        setcookie($cookie_count, $count , time() + (86400 * 30), "/");
        die($_COOKIE["toursID_asia"]);
        wp_die();
    }
}

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

if (!function_exists('list_guid_callback')):
    function list_guid_callback($atts)
    {
        include __DIR__.'/shortcode_element/shortcode_list_guid_vietnam.php';
    }
    add_shortcode('list_guid', 'list_guid_callback');
endif;

if (!function_exists('list_reviews_callback')):
    function list_reviews_callback($atts)
    {
        include __DIR__.'/shortcode_element/shortcode_temoignages.php';
    }
    add_shortcode('list_reviews', 'list_reviews_callback');
endif;

if (!function_exists('slider_blog_callback')):
    function slider_blog_callback($atts)
    {
        include __DIR__.'/shortcode_element/slider_blog_homepage.php';
    }
    add_shortcode('slider_blog', 'slider_blog_callback');
endif;

if (!function_exists('hotel_tour_callback')):
    function hotel_tour_callback($atts)
    {
        include __DIR__.'/shortcode_element/tours/shortcode_list_hotels_intour.php';
    }
    add_shortcode('wz_table_hotel', 'hotel_tour_callback');
endif;

// Remove category base
add_filter('category_link', 'no_category_parents',1000,2);
function no_category_parents($catlink, $category_id) {
    $category = &get_category( $category_id );

    if ( is_wp_error( $category ) )
        return $category;
    
    $category_nicename = $category->slug;
    if ( $category->parent == $category->cat_ID ) {
        $category->parent = 0;
    } elseif ( $category->parent != 0 ) {
        $category_nicename = get_category_parents( 89, false, '/', true ) . $category_nicename;
    }

    $catlink = trailingslashit(get_option( 'home' )) . user_trailingslashit( $category_nicename, 'category' );
    return $catlink;
}

// Add our custom category rewrite rules
add_filter('category_rewrite_rules', 'no_category_parents_rewrite_rules');
function no_category_parents_rewrite_rules($category_rewrite) {
    $category_rewrite=array();
    $categories=get_categories(array('hide_empty'=>false));
    foreach($categories as $category) {
        $category_nicename = $category->slug;

        if ( $category->parent == $category->cat_ID ) {
            $category->parent = 0;
        } elseif ( $category->parent != 0 ) {
            $category_nicename = get_category_parents( 89, false, '/', true ) . $category_nicename;
        }

        $category_rewrite['('.$category_nicename.')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
        $category_rewrite['('.$category_nicename.')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
        $category_rewrite['('.$category_nicename.')/?$'] = 'index.php?category_name=$matches[1]';
    }
    // Redirect support from Old Category Base
    global $wp_rewrite;
    $old_base = $wp_rewrite->get_category_permastruct();
    $old_base = str_replace( '%category%', '(.+)', $old_base );
    $old_base = trim($old_base, '/');
    $category_rewrite[$old_base.'$'] = 'index.php?category_redirect=$matches[1]';

    return $category_rewrite;
}

// Add 'category_redirect' query variable
add_filter('query_vars', 'no_category_parents_query_vars');
function no_category_parents_query_vars($public_query_vars) {
    $public_query_vars[] = 'category_redirect';
    return $public_query_vars;
}
// Redirect if 'category_redirect' is set
add_filter('request', 'no_category_parents_request');
function no_category_parents_request($query_vars) {
    if(isset($query_vars['category_redirect'])) {
        $catlink = trailingslashit(get_option( 'home' )) . user_trailingslashit( $query_vars['category_redirect'], 'category' );
        status_header(301);
        header("Location: $catlink");
        exit();
    }
    return $query_vars;
}

add_filter( 'wpseo_breadcrumb_single_link' ,'wpseo_remove_breadcrumb_link', 10 ,2);
function wpseo_remove_breadcrumb_link( $link_output , $link ){
    $textRemoveArray = [
        'Vietnams',
        'Tours',
        'Temoignages'
    ];
    if(in_array($link['text'],$textRemoveArray )) {
        $link_output = '';
    }

    return $link_output;
}

add_filter('comment_form_defaults', 'set_my_comment_title', 20);
function set_my_comment_title( $defaults ){
 $defaults['title_reply'] = __('Commentaire - Votre message', '');
 return $defaults;
}

add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );
function mo_comment_fields_custom_order( $fields ) {
	$comment_field = '<textarea id="comment" name="comment" cols="45" rows="12" maxlength="65525" aria-required="true" required="required"></textarea>';
	$author_field = '<label for="author">Votre nom & prénom*:</label><input id="author" name="author" type="text" value="" size="30" maxlength="245" />';
	$email_field = '<label for="email">Votre adresse-mail*:</label><input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" />';
	$url_field = $fields['url'];
	unset( $fields['comment'] );
	unset( $fields['author'] );
	unset( $fields['email'] );
	unset( $fields['url'] );
	unset($fields['cookies']);
	// the order of fields is the order below, change it as needed:
	$fields['comment'] = $comment_field;
	$fields['author'] = $author_field;
	$fields['email'] = $email_field;
	$fields['url'] = $url_field;
	// done ordering, now return the fields:
	return $fields;
}