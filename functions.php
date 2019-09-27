<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-app', get_stylesheet_directory_uri() . '/assets/css/app.css' );
    wp_enqueue_script( 'app_script', get_stylesheet_directory_uri() . '/assets/js/app.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

// Thêm script vào backend
add_action('admin_enqueue_scripts', 'wz_custom_admin_style');
if (!function_exists("wz_custom_admin_style")):
    function wz_custom_admin_style()
    {
        $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'hotels',
            'post_status'      => 'publish',
            'suppress_filters' => true
        );
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


// Thêm trường vào category
if(!function_exists("add_fields_init")){
    function add_fields_init() {
        $z_taxonomies = get_taxonomies();
        if (is_array($z_taxonomies)) {
            foreach ($z_taxonomies as $z_taxonomy) {
                add_action($z_taxonomy.'_add_form_fields', 'wz_add_form_taxonomies');
                add_action($z_taxonomy.'_edit_form_fields', 'wz_edit_form_taxonomies');
            }
        }
    }
    add_action('admin_init', 'add_fields_init');
}
if(!function_exists("wz_add_form_taxonomies")){
    function wz_add_form_taxonomies(){
        ?>
        <div>
            <div class="item">
                <h2>Banner</h2>
                <p><input style='width:100%;' type="text" class="banner_tour" value="" name="category_banner"></p>
                <a href="#" class="choose_banner_tour">Chọn banner( 1900 x 860 )</a>
            </div>
            <div class="item">
                <p><input style='width:100%;' type="text" class="banner_tour" value="" name="category_feature_image"></p>
                <a href="#" class="choose_banner_tour">Chọn hình đại diện</a>
            </div>
        </div>
        <?php
    }
}
if(!function_exists("wz_edit_form_taxonomies")){
    function wz_edit_form_taxonomies($term_id){
        $value_banner = get_option('wz_taxonomy_option_banner'.$term_id->term_id);
        $category_feature_image = get_option('wz_taxonomy_option_feature_image'.$term_id->term_id);
        ?>
        <div>
            <div class="item">
                <h2>Banner</h2>
                <p><input style='width:100%;' type="text" class="banner_tour" value="<?php echo $value_banner ?>" name="category_banner"></p>
                <img width="250px" src="<?php echo $value_banner ?>">
                <a href="#" class="choose_banner_tour">Chọn banner( 1900 x 860 )</a>
            </div>
            <div class="item">
                <h2>Ảnh đại diện</h2>
                <p><input style='width:100%;' type="text" class="banner_tour" value="<?php echo $category_feature_image ?>" name="category_feature_image"></p>
                <img width="250px" src="<?php echo $value_banner ?>">
                <a href="#" class="choose_banner_tour">Chọn hình đại diện</a>
            </div>
        </div>

        <?php
    }
}
// save our taxonomy pageID while edit or save term
add_action('edit_term','wz_save_taxonomy_page_id');
add_action('create_term','wz_save_taxonomy_page_id');
function wz_save_taxonomy_page_id($term_id) {
        update_option('wz_taxonomy_option_banner'.$term_id, $_POST['category_banner'], NULL);
        update_option('wz_taxonomy_option_feature_image'.$term_id, $_POST['category_feature_image'], NULL);
}


// Add fields for Tour
if(!function_exists("add_fields_tour_init")){
    function add_fields_tour_init() {
        $z_taxonomies = array('category_tour');
        if (is_array($z_taxonomies)) {
            foreach ($z_taxonomies as $z_taxonomy) {
                add_action($z_taxonomy.'_add_form_fields', 'wz_add_form_tour_taxonomies');
                add_action($z_taxonomy.'_edit_form_fields', 'wz_edit_form_tour_taxonomies');
            }
        }
    }
    add_action('admin_init', 'add_fields_tour_init');
}
if(!function_exists("wz_add_form_tour_taxonomies")){
    function wz_add_form_tour_taxonomies(){
        ?>
        <tr>
            <th class="form-field">Option</th>
            <td>
                <p><input type="checkbox" name="wz_feature_tour"><i>Chọn để hiển thị tour Trang chủ</i></p>
                <p><input type="checkbox" name="wz_slide_tour"><i>Chọn để hiển thị tour slide Trang chủ</i></p>
                <p><input type="checkbox" name="wz_hiden_tour"><i>Chọn để ẩn hiển thi Trang chủ</i></p>
            </td>
        </tr>
        <?php
    }
}
if(!function_exists("wz_edit_form_tour_taxonomies")){
    function wz_edit_form_tour_taxonomies($term_id){
        $value_feature = get_option('wz_taxonomy_hotels_option_feature'.$term_id->term_id);
        $value_slide = get_option('wz_taxonomy_hotels_option_slide'.$term_id->term_id);
        $value_hiden = get_option('wz_taxonomy_hotels_option_hiden'.$term_id->term_id);
        ?>
        <tr>
            <th class="form-field">Option</th>
            <td>
                <p><input type="checkbox" name="wz_feature_tour" <?php if($value_feature == "on") echo "checked" ?>><i>Chọn để hiển thị tour Trang chủ</i></p>
                <p><input type="checkbox" name="wz_slide_tour" <?php if($value_slide == "on") echo "checked" ?>><i>Chọn để hiển thị tour slide Trang chủ</i></p>
                <p><input type="checkbox" name="wz_hiden_tour" <?php if($value_hiden == "on") echo "checked" ?>><i>Chọn để ẩn hiển thị menu Trang chủ</i></p>
            </td>
        </tr>
        <tr>
            <td>Chọn tour:</td>
            <td>
                <?php
                $args = array(
                    'posts_per_page' => -1,
                    'offset' => 0,
                    'post_type' => 'vietnam_secret',
                    'post_status' => 'publish',
                );
                $posts = get_posts($args);
                $value_tour = get_option('wz_tour_slider_option_banner'.$term_id->term_id);
                ?>
                <p><select multiple  name="wz_tour[]">
                        <?php if(!empty($posts)){
                            foreach ($posts as $post){
                                ?>
                                <option value="<?php echo $post->ID ?>" <?php
                                if(!empty($value_tour)){
                                    foreach ($value_tour as $tour){
                                        if($tour == $post->ID){
                                            echo "selected";
                                        }
                                    }
                                }
                                ?>><?php echo $post->post_title ?></option>
                                <?php
                            }
                        } ?>
                    </select></p>
            </td>
        </tr>
        <?php
    }
}
// save our taxonomy pageID while edit or save term
if(!function_exists("wz_save_field_tour_taxonomy_page_id")){
    function wz_save_field_tour_taxonomy_page_id($term_id) {
        $tour_id = isset($_POST["wz_tour"]) ? $_POST["wz_tour"] : "";
        update_option('wz_tour_slider_option_banner'.$term_id, $tour_id, NULL);
        update_option('wz_taxonomy_hotels_option_feature'.$term_id, $_POST['wz_feature_tour'], NULL);
        update_option('wz_taxonomy_hotels_option_slide'.$term_id, $_POST['wz_slide_tour'], NULL);
        update_option('wz_taxonomy_hotels_option_hiden'.$term_id, $_POST['wz_hiden_tour'], NULL);
        //update_option('wz_taxonomy_hotels_option_banner'.$term_id, $_POST['category_banner_tour'], NULL);
    }
    add_action('edit_term','wz_save_field_tour_taxonomy_page_id');
    add_action('create_term','wz_save_field_tour_taxonomy_page_id');
}

// Register shortcode
if (!function_exists('main_menu_callback')):
    function main_menu_callback()
    {

    }
    add_shortcode('main_menu', 'main_menu_callback');
endif;
