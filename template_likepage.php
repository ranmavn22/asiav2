<?php
/**
 * Template Name: Wish
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
$obj = get_queried_object();
$value_banner = get_option('wz_taxonomy_option_feature_image'.$obj->term_id);

?>
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
    <div class="grid-container">
        <div class="contentPage"><?php the_content() ?></div>
        <div class='listPost'>
            <?php
            $loop = new WP_Query(array(
                    'post_type' => 'vietnam_secret',
                    'posts_per_page' => 12,
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                    'post__in' => explode(',',$_COOKIE["toursID_asia"]),
                    )
            );
            while ($loop->have_posts()) : $loop->the_post();
                $value = get_post_meta($post->ID, 'wz_information_vnsecret', true);
                ?>
                <div class="item">
                    <a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title ?>"><?php echo get_the_post_thumbnail($post->ID, 'custom-medium', array('alt' => $post->post_title)) ?></a>
                    <h3><a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title ?>"><?php echo wp_trim_words(get_the_title(),10,'...') ?></a></h3>
                    <p class="except_content"><?php echo wp_trim_words(get_the_content(),30,'')?></p>
                    <?php if(!empty($value["address"])){?>
                        <p class="address_post_vnsecret"><span><?php echo $value["address"]?></span></p>
                    <?php }?>
                </div>
            <?php endwhile; ?>
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
        <div id="back">
            <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i> <span><?php _e('AUTRES FORMULES','wz')?></span></a>
        </div>
    </div>
<?php endwhile; ?>
<?php
get_footer();
