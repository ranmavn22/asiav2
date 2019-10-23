<?php

/*
	Template Name: Archives Media
	*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

?>
    <div class="bannerPage positionR">
        <?php the_post_thumbnail()?>
    </div>
    <div class="grid-container">
        <div class="titlePageCategory"><h1><?php the_title() ?></h1></div>
        <div class="contentPage"><?php echo the_content() ?></div>
        <?php
        $loop = new WP_Query(array('post_type' => 'attachment',
                'posts_per_page' => 12,
                'post_status' => 'inherit',
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'media_category',
                        'field'    => 'slug',
                        'terms'    => 'galery',
                    ),
                ),
            )
        );
        echo "<div class='listPost'>";
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <div class="item">
                <?php $image = wp_get_attachment_image_src($post->ID, "custom-medium"); ?>
                <a rel="gallery" class="lightBox" href="<?php echo $image[0]?>" title="">
                    <img src="<?php echo $image[0]?>" alt="">
                </a>
            </div>
        <?php
        endwhile;
        echo "</div>";
        ?>
    </div>
    <!-- chỉ mục trang -->
    <div id="wz_pagination">
        <div class="content_pagination">
            <?php
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '?paged=%#%',
                'mid_size' => 1,
                'current' => max(1, get_query_var('paged')),
                'total' => $loop->max_num_pages,
                'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
                'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>'),
            ));
            ?>
        </div>
    </div>
    <div id="back">
        <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i> <span><?php _e('AUTRES FORMULES','wz')?></span></a>
    </div>
<?php
get_footer();
