<?php
if (!defined('ABSPATH')) {
    die();
}

if (!function_exists("metabox_fields_esprit_carte")):
    function metabox_fields_esprit_carte()
    {
        add_meta_box("wz_esprit_carte_tour", "Esprit Carte Tour", "metabox_fields_esprit_carte_callback", "tours");
    }
endif;
add_action("add_meta_boxes", "metabox_fields_esprit_carte");

if (!function_exists("metabox_fields_esprit_carte_callback")) {
    function metabox_fields_esprit_carte_callback($post)
    {
        $value_esprit_carte = get_post_meta($post->ID, 'wz_esprit_carte', true);
        $value_carte = get_post_meta($post->ID, 'img_carte', true);
        //Editor
        echo '<p>Nhập lợi ích chuyến đi</p>';
        $loi_ich_editor = get_post_meta($post->ID, 'wz_editor_esprit_carte', true);
        $editor_id = 'wz_editor_esprit_carte';
        $settings = array(
            'wpautop' => true,
            'media_buttons' => true,
            'textarea_name' => $editor_id,
            'textarea_rows' => 15,
            'tabindex' => '',
            'editor_css' => '',
            'editor_class' => '',
            'teeny' => false,
            'dfw' => false,
            'tinymce' => true,
            'quicktags' => true
        );
        wp_editor($loi_ich_editor, $editor_id, $settings);
        // end editor
        //Choose carte
        ?>
        <div class="area_carte"><span>Chọn bản đồ: </span><a class="btn_choose_carte" href="#">Choose </a><a class="btn_del_carte" href="#"> Xóa</a>
            <input type="hidden" value="<?php echo $value_carte ?>" class="wz_url_img_selected" name="img_carte">
            <p>
                <?php
                if (!empty($value_carte)) {
                    echo "<img src='" . $value_carte . "'>";
                }
                ?>
            </p>
        </div>
        <div class="itineraire_en_bref">
            <h3>Itinéraire en bref:</h3>
            <div class="content_itineraire_en_bref">
                <?php
                if (!empty($value_esprit_carte)) {
                    $num = 0;
                    foreach ($value_esprit_carte as $item)
                    {
                        $num_index = $num++;?>
                        <div class="item" data-index="<?php echo $num_index?>">
                            <div class="etape"><span>Étape <?php echo $num_index + 1 ?>: </span><a class="add_lich" data-index="<?php echo $num_index?>">Thêm mô tả</a></div>
                            <a class="del_item">Xóa</a>
                                <div class="etape_content">
                                    <?php if (!empty($item["label"])) { ?>
                                    <p class="label_etape"><span>Label: </span><input type="text" name="wz_esprit_carte[][label]" value="<?php echo $item["label"]?>"></p>
                                    <?php } ?>
                                    <?php if (!empty($item["lichtrinh"])) {
                                        foreach ($item["lichtrinh"] as $detail) { ?>
                                            <p><input name="wz_esprit_carte[<?php echo $num_index; ?>][lichtrinh][]" value="<?php echo $detail; ?>"><a class="del_item" href="#">Xóa</a></p>
                                        <?php }
                                    } ?>
                                </div>
                                <div class="etape_libs_img">
                                    <?php if(!empty($item["img"])){
                                        foreach ($item["img"] as $img){ ?>
                                            <span><input name="wz_esprit_carte[<?php echo $num_index; ?>][img][]" type="hidden" value="<?php echo $img ?>">
                                                <img src="<?php echo $img ?>"><a class="del_item" href="#">Xóa</a></span>
                                    <?php }
                                    }?>
                                </div>
                                <a href="#" class="btn_add_img" data-index="<?php echo $num_index?>">Thêm ảnh</a>

                        </div>
                    <?php }
                }
                ?>

            </div>
            <a class="btn_add_itineraire_en_bref" href="#">Thêm hành trình</a>
        </div>
        <?php

    }
}

if (!function_exists("save_metabox_fields_esprit_carte_tour")):
    function save_metabox_fields_esprit_carte_tour($post_id, $post)
    {
		if(empty($post_id) || empty($post)) return;
        if($post->post_type != 'tours') return;
        //Save lợi ich
        $value = $_POST["wz_editor_esprit_carte"];
        $value_carte = $_POST["img_carte"];
        update_post_meta($post_id, "wz_editor_esprit_carte", $value);
        update_post_meta($post_id, "img_carte", $value_carte);
        $value_carte = $_POST["wz_esprit_carte"];
        update_post_meta($post_id, "wz_esprit_carte", $value_carte);


        //Save bản đồ

    }
endif;
add_action('save_post', 'save_metabox_fields_esprit_carte_tour', 10, 2);
