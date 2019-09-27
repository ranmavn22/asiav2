<?php
if (!defined('ABSPATH')) {
    die();
}
$url = get_stylesheet_directory_uri();

$terms = get_terms("category_tour");

?>
<div class="content_list_tour">
    <div class="tours_lastnew">
        <?php
        if (!empty($terms)) {
            foreach ($terms as $term) {
                $value_feature = get_option('wz_taxonomy_hotels_option_feature' . $term->term_id);
                if ($value_feature == "on") {
                    ?>
                    <div class="item_tour">
                        <a href="<?php echo get_term_link($term->term_id); ?>"><img class="wz_lazyload"
                                                                                    data-original="<?php echo z_taxonomy_image_url($term->term_id); ?>"
                                                                                    alt="">
                            <p><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a><img
                                        class="detail" src="<?php echo $url ?>/dist/images/icon_bottom_img.png"></p>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
    <div class="tours_slide owl-carousel owl-theme">
        <?php
        if (!empty($terms)) {
            foreach ($terms as $term) {
                $value_slide = get_option('wz_taxonomy_hotels_option_slide' . $term->term_id);
                if ($value_slide == "on") {
                    ?>
                    <div class="item_tour">
                        <a href="<?php echo get_term_link($term->term_id); ?>"><img class="wz_lazyload"
                                                                                    src="<?php echo z_taxonomy_image_url($term->term_id); ?>"
                                                                                    alt=""></a>
                        <p><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a><img
                                    class="detail" src="<?php echo $url ?>/dist/images/icon_bottom_img.png"></p>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
</div>
