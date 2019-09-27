<?php
if (!defined('ABSPATH')) {
    die();
}
if(!function_exists("wz_metabox_form_demande_prix")) {
    function wz_metabox_form_demande_prix()
    {
        add_meta_box('content_infor_hotels', 'Editor Informations Hotel', 'wz_metabox_form_demande_prix_callback', 'hotels');
    }
}

add_action('add_meta_boxes', 'wz_metabox_form_demande_prix');
if(!function_exists("wz_metabox_form_demande_prix_callback")) {
    function wz_metabox_form_demande_prix_callback($post)
    {
        $value_editor = get_post_meta($post->ID, 'wz_demande', true);
        $editor_id = 'wz_demande_editor';
        $settings = array(
            'wpautop' => false,
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
        wp_editor($value_editor, $editor_id, $settings);
    }
}
if(!function_exists("save_value_demande_prix")) {
    function save_value_demande_prix($post_id, $post)
    {
		if(empty($post_id) || empty($post)) return;
		if($post->post_type != 'hotels') return;
        $value = isset($_POST['wz_demande_editor']) ? $_POST['wz_demande_editor'] : '';
        update_post_meta($post_id, 'wz_demande', $value);
    }
}
add_action('save_post', 'save_value_demande_prix', 10, 2);


