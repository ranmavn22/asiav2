<?php
if (!defined('ABSPATH')) {
    die();
}

if (!function_exists("wz_vnsecret_information")) {
    function wz_vnsecret_information()
    {
        add_meta_box('vnsecret_information', 'Nhập thông tin bài đăng', 'wz_vnsecret_information_callback', 'vietnam_secret');
    }
}

add_action('add_meta_boxes', 'wz_vnsecret_information');
if (!function_exists("wz_vnsecret_information_callback")) {
    function wz_vnsecret_information_callback($post)
    {
        $args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'post_type' => 'tours',
            'post_status' => 'publish',
        );
        $posts = get_posts($args);
        $value = get_post_meta($post->ID, 'wz_information_vnsecret', true);
        ?>
        <div>
            <p>Địa chỉ: <input type="text" name="wz_detail[address]" value="<?php if(!empty($value["address"])) echo $value["address"] ?>"></p>
            <p>Chọn tour: <select multiple  name="wz_detail[tour][]">
                    <?php if(!empty($posts)){
                        foreach ($posts as $post){
                            ?>
                            <option value="<?php echo $post->ID ?>" <?php
                            if(!empty($value["tour"])){
                                foreach ($value["tour"] as $tour){
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
            <div>
                <p>Images Gallery: </p>
                <p class="etape_libs_img">
                    <?php
                    if(!empty($value["img"])){
                        foreach ($value["img"] as $img){
                            echo '<span><input name="wz_detail[img][]" type="hidden" value="'.$img.'"><img src="'.$img.'"><a class="del_item" href="#">Xóa</a></span>';
                        }
                    }
                    ?>
                </p>
            </div>
            <a class="btn_chonanh" href="#">Choose gallery images</a>
        </div>
        <?php
    }
}
function save_wz_vnsecret_information($post_id, $post)
{

    if(empty($post_id) || empty($post)) return;
    if($post->post_type != 'vietnam_secret') return;

    $value = isset($_POST['wz_detail']) ? $_POST['wz_detail'] : '';
    update_post_meta($post_id, 'wz_information_vnsecret', $value);
}
add_action('save_post', 'save_wz_vnsecret_information', 10, 2);