<?php
if (!defined('ABSPATH')) {
    die();
}

if (!function_exists("wz_post_galery_img")) {
    function wz_post_galery_img()
    {
        add_meta_box('list_img_galery_post', 'Chọn list ảnh', 'wz_post_galery_callback', 'post');
    }
}

add_action('add_meta_boxes', 'wz_post_galery_img');
if (!function_exists("wz_post_galery_callback")) {
    function wz_post_galery_callback($post)
    {
        $value = get_post_meta($post->ID, 'wz_post_galery_img', true);
        ?>
        <div>
            <div>
                <p>Images Gallery: </p>
                <p class="etape_libs_img">
                    <?php
                    if(!empty($value)){
                        foreach ($value as $img){
                            echo '<span><input name="wz_post_galery_img[]" type="hidden" value="'.$img.'"><img src="'.$img.'"><a class="del_item" href="#">Xóa</a></span>';
                        }
                    }
                    ?>
                </p>
            </div>
            <a class="btn_chonanh_post" href="#">Choose gallery images</a>
        </div>
        <?php
    }
}
function save_post_galery_img($post_id, $post)
{

    if(empty($post_id) || empty($post)) return;
    if($post->post_type != 'post') return;

    $value = isset($_POST['wz_post_galery_img']) ? $_POST['wz_post_galery_img'] : '';
    update_post_meta($post_id, 'wz_post_galery_img', $value);
}
add_action('save_post', 'save_post_galery_img', 10, 2);