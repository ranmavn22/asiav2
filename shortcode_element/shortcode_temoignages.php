<?php
if (!defined('ABSPATH')) {
    die();
}
$args = array(
    'posts_per_page' => 6,
    'offset' => 0,
    'post_type' => 'temoignages',
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'category_temoignages',
            'field' => 'slug',
            'terms' => 'feature'
        )
    )
);
$posts = get_posts($args);
if (!empty($posts)) {
    ?>
    <div class="wrap_temoignages sliderItem" data-item="3">
        <?php
        foreach ($posts as $post) {
            $value = get_post_meta($post->ID, 'wz_infor_temoignages', true);
            ?>
            <div class="item">
                <div class="content positionR">
                    <p><i class="fa fa-quote-left" aria-hidden="true"></i> <?php echo wp_trim_words($post->post_content, 50, '') ?></p>
                    <h3><?php echo $post->post_title ?><i><?php echo $value['date'] ?></i></h3>
                    <div class="img_avartar positionA"><a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title?>"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail') ?></a></div>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php
}
