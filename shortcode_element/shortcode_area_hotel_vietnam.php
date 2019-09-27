<?php
if (!defined('ABSPATH')) {
    die();
}
$term_20 = get_term(20, 'category_hotel');
$term_21 = get_term(21, 'category_hotel');
$term_19 = get_term(19, 'category_hotel');
?>
<div class="content_hotel_vietnam">
    <?php if ($term_20) { ?>
        <div class="item">
            <a href="<?php echo get_term_link(20) ?>"><img src="<?php echo z_taxonomy_image_url(20); ?>"/></a>
            <?php
            echo "<p><a href='" . get_term_link(20) . "'>" . $term_20->name . "</a></p>";
            ?>
        </div>
    <?php } ?>
    <?php if ($term_21) { ?>
        <div class="item">
            <a href="<?php echo get_term_link(21) ?>"><img src="<?php echo z_taxonomy_image_url(21); ?>"/></a>
            <?php
            echo "<p><a href='" . get_term_link(21) . "'>" . $term_21->name . "</a></p>";
            ?>
        </div>
    <?php } ?>
    <?php if ($term_19) { ?>
        <div class="item">
            <a href="<?php echo get_term_link(19) ?>"><img src="<?php echo z_taxonomy_image_url(19); ?>"/></a>
            <?php
            echo "<p><a href='" . get_term_link(19) . "'>" . $term_19->name . "</a></p>";
            ?>
        </div>
    <?php } ?>
</div>
