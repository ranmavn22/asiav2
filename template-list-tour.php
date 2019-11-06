<?php
/**
 * Template Name: List Tour
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
    <div class="wrapPage1">
        <div class="wrapPage2">
            <div class="grid-container">
                <div class="contentPage">
                    <div class="">
                        <?php the_content() ?>
                    </div>
                    <?php $loop = new WP_Query(array('post_type' => 'tours', 'posts_per_page' => 15,'orderby' => 'date', 'order'   => 'ASC', 'paged' => get_query_var('paged') ? get_query_var('paged') : 1)); ?>
                    <div class="content_tour">
                        <div class='listPost'>
                            <?php
                            while ($loop->have_posts()) : $loop->the_post();
                                $tour = $post->ID;
                                include __DIR__.'/includes/item_tour.php';
                            endwhile; ?>
                        </div>
                    </div>
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
                </div>
                <div class="container_slider positionR">
                    <?php $args = array(
                        'posts_per_page' => 5,
                        'post_type' => 'vietnam_secret',
                        'post_status' => 'publish',
                        'suppress_filters' => true,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category_vnsecret_feature',
                                'field' => 'slug',
                                'terms' => 'feature-tour'
                            )
                        )
                    );
                    $posts_array = get_posts($args);
                    include __DIR__.'/includes/slider_tour.php';
                    ?>
                </div>
                <div id="back">
                    <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i> <span><?php _e('AUTRES FORMULES','wz')?></span></a>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php
get_footer();
