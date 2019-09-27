<?php
if (!defined('ABSPATH')) {
    die();
}

if(!function_exists("metabox_fields_hiden_post")):
    function metabox_fields_hiden_post(){
        add_meta_box("hiden_post","Hide post","metabox_hiden_post_callback","post",'side');
    }
endif;
add_action("add_meta_boxes","metabox_fields_hiden_post");

if(!function_exists("metabox_hiden_post_callback")){
    function metabox_hiden_post_callback($post){
        $value = get_post_meta($post->ID,'wz_hiden_post',true);
        ?>
        <p><input type="checkbox" name="hiden_post" <?php if($value == "on") echo 'checked'?>> <span>Choose to hide </span></p>
        <?php
    }
}
if(!function_exists("save_meta_hiden_post")):
    function save_meta_hiden_post($post_id,$post){
		if(empty($post_id) || empty($post)) return;
        if($post->post_type != 'post') return;
        $value = $_POST["hiden_post"];
        update_post_meta($post_id,"wz_hiden_post",$value);
    }
endif;
add_action('save_post', 'save_meta_hiden_post', 10, 2);
