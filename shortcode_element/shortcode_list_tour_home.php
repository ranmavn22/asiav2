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
                if ($value_feature == "on") { ?>
                    <?php $category_feature_image = get_option('wz_taxonomy_option_feature_image'.$term->term_id); ?>
                    <div class="item_tour">
                        <a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name; ?>">
                            <?php echo wp_get_attachment_image( $category_feature_image,'thumbnail' )?>
                        </a>
                        <p>
                            <a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
                        </p>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
    <div class="sliderItem tours_slide" data-item="3">
        <?php
        if (!empty($terms)) {
            foreach ($terms as $term) {
                $value_slide = get_option('wz_taxonomy_hotels_option_slide' . $term->term_id);
                if ($value_slide == "on") {
                    ?>
                    <?php $category_feature_image = get_option('wz_taxonomy_option_feature_image'.$term->term_id); ?>
                    <div class="item_tour">
                        <a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name; ?>">
                            <?php echo wp_get_attachment_image( $category_feature_image,'thumbnail' )?>
                            <span><?php echo $term->name; ?></span>
                        </a>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
</div>
