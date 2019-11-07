<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header('blog');
$obj = get_queried_object();
$value_banner = get_option('wz_taxonomy_option_feature_image'.$obj->term_id);

?>
    <div class="bannerPage positionR">
        <?php echo wp_get_attachment_image( $value_banner,'full' )?>
    </div>
    <div class="grid-container blogTemplate listHotelPage">
        <div class="titlePageCategory2"><h1>Toutes les idées de voyages : <span><?php echo $obj->name ?></span></h1></div>
        <div class="">
            <?php echo $obj->description ?>
        </div>
        <?php

        $loop = new WP_Query(array('post_type' => 'hotels', 'posts_per_page' => 12, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1,'tax_query' => array(
                array(
                    'taxonomy' => 'category_hotel',
                    'field'    => 'slug',
                    'terms'    => $obj->slug,
                ),
            ),)
        );

        ?>
        <div id="content">
            <div class='listPost'>
                <?php
                while ($loop->have_posts()) : $loop->the_post();
                    $infor = get_post_meta($post->ID, 'wz_information_hotel', true);
                    include __DIR__.'/includes/item_hotel.php';
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
<?php
get_footer();
