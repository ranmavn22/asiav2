<?php
if (!defined('ABSPATH')) {
    die();
}

if(!function_exists("metabox_fields_infor")):
    function metabox_fields_infor(){
        add_meta_box("infor_temoignages","Nhập thông tin cá nhân","metabox_fields_temoignages_callback","temoignages");
    }
endif;
add_action("add_meta_boxes","metabox_fields_infor");

if(!function_exists("metabox_fields_temoignages_callback")){
    function metabox_fields_temoignages_callback($post){
    $value = get_post_meta($post->ID,'wz_infor_temoignages',true);
        ?>
        <p><span>Phone number:</span> <input type="text" name="infor_temoignages[phone]" value="<?php echo $value['phone']?>"></p>
        <p><span>Email:</span> <input type="text" name="infor_temoignages[email]" value="<?php echo $value['email']?>"></p>
        <p><span>Country:</span> <input type="text" name="infor_temoignages[country]" value="<?php echo $value['country']?>"></p>
		<p><span>Ngày đi:</span> <input type="text" name="infor_temoignages[date]" value="<?php echo $value['date']?>"></p>
<?php
    }
}

if(!function_exists("save_meta_fields_temoignages")):
    function save_meta_fields_temoignages($post_id,$post){
		if(empty($post_id) || empty($post)) return;
        if($post->post_type != 'temoignages') return;
        $value = $_POST["infor_temoignages"];
        update_post_meta($post_id,"wz_infor_temoignages",$value);
    }
endif;
add_action('save_post', 'save_meta_fields_temoignages', 10, 2);
