<?php
if (!defined('ABSPATH')) {
    die();
}

if(!function_exists("metabox_fields_infor_tour")):
    function metabox_fields_infor_tour(){
        add_meta_box("wz_inforation_tour","Nhập thông tin Chuyến đi","metabox_fields_infor_tour_callback","tours");
    }
endif;
add_action("add_meta_boxes","metabox_fields_infor_tour");

if(!function_exists("metabox_fields_infor_tour_callback")){
    function metabox_fields_infor_tour_callback($post){
        $value = get_post_meta($post->ID,'infor_tour',true);
        $value_time_search = get_post_meta($post->ID,'wz_infor_tour_jour',true);
        $description_tour_price = get_post_meta($post->ID,'description_tour_price',true);
        $hien_thi_gia = get_post_meta($post->ID,'hien_thi_gia',true);
        ?>
        <p><span>Commencement: </span> <input type="text" name="infor_tour[commencement]" value="<?php echo $value['commencement']?>"></p>
        <p><span>Départ: </span> <input type="text" name="infor_tour[depart1]" value="<?php echo $value['depart1']?>"></p>
        <p><span>Départ: </span> <input type="text" name="infor_tour[depart2]" value="<?php echo $value['depart2']?>"></p>
        <p><span>Duree: </span> <input type="text" name="wz_infor_tour_jour" value="<?php echo $value_time_search?>"> Jour</p>
		<p><span>Price: </span> <input type="text" name="infor_tour[price]" value="<?php echo $value['price']?>"><i class="fa fa-eur" aria-hidden="true"></i> <input type="checkbox" name="hien_thi_gia" <?php if($hien_thi_gia == 'on'){ echo "checked"; }?>> Hiện thị giá Tour</p>
		<p><span>Code: </span> <input type="text" name="infor_tour[code]" value="<?php echo $value['code']?>"></p>
		<p><span>Mô tả giá tour: </span> <input style="width:400px" type="text" name="description_tour_price" value="<?php echo $description_tour_price ?>"></p>
        <?php
    }
}

if(!function_exists("save_meta_fields_tour_tour")):
    function save_meta_fields_tour_tour($post_id,$post){
		if(empty($post_id) || empty($post)) return;
        if($post->post_type != 'tours') return;
        $value = $_POST["infor_tour"];
        $value_time_search = $_POST["wz_infor_tour_jour"];
        $description_tour_price = $_POST["description_tour_price"];
        $hien_thi_gia = $_POST["hien_thi_gia"];
        update_post_meta($post_id,"infor_tour",$value);
        update_post_meta($post_id,"wz_infor_tour_jour",$value_time_search);
        update_post_meta($post_id,"description_tour_price",$description_tour_price);
        update_post_meta($post_id,"hien_thi_gia",$hien_thi_gia);
    }
endif;
add_action('save_post', 'save_meta_fields_tour_tour', 10, 2);
