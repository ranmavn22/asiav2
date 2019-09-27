<?php
if (!defined('ABSPATH')) {
    die();
}

if (!function_exists("wz_hotel_information")) {
    function wz_hotel_information()
    {
        add_meta_box('hotel_information', 'Nhập thông tin khách sạn', 'hotel_information_callback', 'hotels');
    }
}

add_action('add_meta_boxes', 'wz_hotel_information');
if (!function_exists("hotel_information_callback")) {
    function hotel_information_callback($post)
    {
        $value = get_post_meta($post->ID, 'wz_information_hotel', true);

        ?>
        <div>
            <p>Tên khách sạn: <input type="text" name="wz_detail[name_hotel]" value="<?php if(!empty($value["name_hotel"])) echo $value["name_hotel"] ?>"></p>
            <p>Đánh giá: <select name="wz_detail[assess]">
                    <option value="2" <?php if(!empty($value["assess"])) if($value["assess"] == 2) echo "selected"?>>2 sao</option>
                    <option value="2.5" <?php if(!empty($value["assess"])) if($value["assess"] == 2.5) echo "selected"?>>2.5 sao</option>
                    <option value="3" <?php if(!empty($value["assess"])) if($value["assess"] == 3) echo "selected"?>>3 sao</option>
                    <option value="3.5" <?php if(!empty($value["assess"])) if($value["assess"] == 3.5) echo "selected"?>>3.5 sao</option>
                    <option value="4" <?php if(!empty($value["assess"])) if($value["assess"] == 4) echo "selected"?>>4 sao</option>
                    <option value="4.5" <?php if(!empty($value["assess"])) if($value["assess"] == 4.5) echo "selected"?>>4.5 sao</option>
                    <option value="5" <?php if(!empty($value["assess"])) if($value["assess"] == 5) echo "selected"?>>5 sao</option>
                    <option value="5.5" <?php if(!empty($value["assess"])) if($value["assess"] == 5.5) echo "selected"?>>5.5 sao</option>
                    <option value="6" <?php if(!empty($value["assess"])) if($value["assess"] == 6) echo "selected"?>>6 sao</option>
                    <option value="6.5" <?php if(!empty($value["assess"])) if($value["assess"] == 6.5) echo "selected"?>>6.5 sao</option>
                    <option value="7" <?php if(!empty($value["assess"])) if($value["assess"] == 7) echo "selected"?>>7 sao</option>
                </select></p>
            <p>Địa chỉ: <input type="text" name="wz_detail[address]" value="<?php if(!empty($value["address"])) echo $value["address"] ?>"></p>
            <p>Thành phố: <input type="text" name="wz_detail[city]" value="<?php if(!empty($value["city"])) echo $value["city"] ?>"></p>
            <p>Quốc gia: <input type="text" name="wz_detail[country]" value="<?php if(!empty($value["country"])) echo $value["country"] ?>"></p>
            <div>Images Gallery:  <p class="etape_libs_img">
                    <?php
                    if(!empty($value["img"])){
                        foreach ($value["img"] as $img){
                            echo '<span><input name="wz_detail[img][]" type="hidden" value="'.$img.'"><img src="'.$img.'"><a class="del_item" href="#">Xóa</a></span>';
                        }
                    }
                    ?>
                </p></div>
            <a class="btn_chonanh" href="#">Choose</a>
        </div>
        <?php
    }
}
function save_wz_hotel_information($post_id, $post)
{
	if(empty($post_id) || empty($post)) return;
    if($post->post_type != 'hotels') return;
    $value = isset($_POST['wz_detail']) ? $_POST['wz_detail'] : '';
    update_post_meta($post_id, 'wz_information_hotel', $value);
}
add_action('save_post', 'save_wz_hotel_information', 10, 2);