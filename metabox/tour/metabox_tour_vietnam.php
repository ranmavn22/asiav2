<?php
if (!defined('ABSPATH')) {
    die();
}
if(!function_exists("wz_metabox_tour_vietnam")) {
    function wz_metabox_tour_vietnam()
    {
        add_meta_box('tour_vietnam', 'Vietnam Secret', 'wz_metabox_tour_vietnam_callback', 'tours');
    }
}

add_action('add_meta_boxes', 'wz_metabox_tour_vietnam');
if(!function_exists("wz_metabox_tour_vietnam_callback")) {
    function wz_metabox_tour_vietnam_callback($post)
    {
        $value_editor = get_post_meta($post->ID, 'wz_tour_vietnam', true);
        $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'vietnam_secret',
            'post_status'      => 'publish',
            'suppress_filters' => true
        );
        $posts_array = get_posts( $args );

        ?>
        <p>Chọn: <select multiple  name="wz_tour_vietnam[]">
                <?php if(!empty($posts_array)){
                    foreach ($posts_array as $post){
                        ?>
                        <option value="<?php echo $post->ID ?>" <?php
                        if(!empty($value_editor)){
                            foreach ($value_editor as $tour){
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
        <?php
    }
}
if(!function_exists("save_tour_vietnam")) {
    function save_tour_vietnam($post_id, $post)
    {
        if(empty($post_id) || empty($post)) return;
        if($post->post_type != 'tours') return;
        $value = isset($_POST['wz_tour_vietnam']) ? $_POST['wz_tour_vietnam'] : '';


        update_post_meta($post_id, 'wz_tour_vietnam', $value);
    }
}
add_action('save_post', 'save_tour_vietnam', 10, 2);


