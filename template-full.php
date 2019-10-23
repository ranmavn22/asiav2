<?php
/**
 * Template Name: Full
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<?php
while (have_posts()) : the_post(); ?>

    <div class="bannerPage positionR">
        <?php echo get_the_post_thumbnail() ?>
        <div class="titlePage positionA"></div>
    </div>
    <div class="grid-container">
        <div class="titlePageCategory"><h1><?php the_title() ?></h1></div>
    </div>
    <?php the_content() ?>



    <div id="back">
        <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i>
            <span><?php _e('AUTRES FORMULES', 'wz') ?></span></a>
    </div>

<?php endwhile; ?>
<?php
get_footer();
