<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
$obj = get_queried_object();
$value_banner = get_option('wz_taxonomy_option_banner'.$obj->term_id);

?>
    <div class="bannerPage positionR">
        <?php echo wp_get_attachment_image( $value_banner,'full' )?>
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
        <div class="titlePageCategory2"><h1>Toutes les idées de voyages : <span><?php echo $obj->name ?></span></h1></div>
        <div class="">
            <?php echo $obj->description ?>
        </div>
        <!--<p class="seeMoreContentPage text-center"><a href="#" class="" title="VOIR LA SUITE"><span>VOIR LA SUITE</span></a></p>-->

        <?php

        $loop = new WP_Query(array('post_type' => 'tours', 'posts_per_page' => 12, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1,'tax_query' => array(
                array(
                    'taxonomy' => 'category_tour',
                    'field'    => 'slug',
                    'terms'    => $obj->slug,
                ),
            ),)
        );

        ?>
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
        <div id="back">
            <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i> <span><?php _e('AUTRES FORMULES','wz')?></span></a>
        </div>
    </div>
    </div>
    </div>
<?php
get_footer();
