<?php
/**
 * Template Name: Thank
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

    <?php
    while (have_posts()) : the_post(); ?>

        <div class="bannerPage positionR">
            <?php echo get_the_post_thumbnail() ?>
            <div class="titlePage positionA"><h1><?php the_title() ?></h1></div>
        </div>
		<div class="breadcrumbs">
        <div class="grid-container">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
        </div>
    </div>
        <div class="wrapPage1">
        <div class="wrapPage2">
        <div class="grid-container">
            <div class="contentPage">
                <div class="">
                    <?php the_content() ?>
                </div>
            </div>

            <div id="back">
                <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i> <span><?php _e('AUTRES FORMULES','wz')?></span></a>
            </div>
        </div>
        </div>
        </div>
        <?php endwhile; ?>
<?php
get_footer('thanks');
