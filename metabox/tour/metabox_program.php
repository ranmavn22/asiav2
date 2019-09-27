<?php
if (!defined('ABSPATH')) {
    die();
}
if(!function_exists("wz_metabox_content_program_tour")) {
    function wz_metabox_content_program_tour()
    {
        add_meta_box('content_program_tour', 'Programme détaillé', 'wz_metabox_content_program_tour_callback', 'tours');
    }
}

add_action('add_meta_boxes', 'wz_metabox_content_program_tour');
if(!function_exists("wz_metabox_content_program_tour_callback")) {
    function wz_metabox_content_program_tour_callback($post)
    {
        $value_editor = get_post_meta($post->ID, 'wz_program_detail', true);
        $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'hotels',
            'post_status'      => 'publish',
            'suppress_filters' => true
        );
        $posts_array = get_posts( $args );

        ?>
        <div class="program_tour">
            <div class="content_program_tour">
                <?php if(!empty($value_editor)){
                    $num = 0;
                    foreach ($value_editor as $item){
                        $index = $num++;
                        ?>
                        <div class="item" data-index="<?php echo $index?>">
                            <span class="title" data-index="0">Jour <?php echo $index+1 ?></span>
                            <a href="#" class="del_item">Xóa</a>
                            <p class="label">Label: <input type="text" value="<?php echo $item["label"]?>" name="wz_program[<?php echo $index?>][label]" style="width: 50%"></p>
                            <textarea id="test_<?php echo $index+1 ?>" name="wz_program[<?php echo $index?>][content]"><?php echo $item["content"]?></textarea>
                            <p>Chọn khách sạn:
                                <select name="wz_program[<?php echo $index?>][hotels]">
										<option value="">None</option>
                                    <?php if(!empty($posts_array)){foreach ($posts_array as $hotel){?>
                                        <option value="<?php echo $hotel->ID ?>" <?php if($value_editor[$index]["hotels"] ==  $hotel->ID){ echo 'selected';}?>><?php echo $hotel->post_title ?></option>
                                    <?php }}?>
                                </select>
                            </p>
                            <!--<p>Giới thiệu ngắn khách sạn: </p><textarea name="wz_program[<?php /*echo $index*/?>][detail_hotel]"><?php /*echo $value_editor[$index]["detail_hotel"]*/?></textarea>-->
                        </div>
                        <?php
                        /*$content = $value_editor[$index]["content"];
                        $id = 'test_'.$index+1;
                        wp_editor( $content, 'test_1' );*/
                    }
                }?>
            </div>
            <a class="btn_add_program">Add Program detail</a>
        </div>
<?php
    }
}
if(!function_exists("save_program_tour")) {
    function save_program_tour($post_id, $post)
    {
		if(empty($post_id) || empty($post)) return;
        if($post->post_type != 'tours') return;
        $value = isset($_POST['wz_program']) ? $_POST['wz_program'] : '';
        update_post_meta($post_id, 'wz_program_detail', $value);
    }
}
add_action('save_post', 'save_program_tour', 10, 2);


