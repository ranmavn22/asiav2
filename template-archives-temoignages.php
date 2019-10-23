<?php
/*
	Template Name: Archives Temoignages
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
        <div class="contentPage"><?php the_content() ?></div>
        <?php
        $loop = new WP_Query(array('post_type' => 'temoignages', 'posts_per_page' => 6, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1)
        );
        echo "<div class='listPost'>";
        while ($loop->have_posts()) : $loop->the_post();
            $country = get_post_meta($post->ID,'wz_infor_temoignages',true);
            ?>
            <div class="item text-center">
                <div class="img_post">
                    <a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title?>"><?php echo get_the_post_thumbnail($post->ID,'custom-medium', array( 'alt' => $post->post_title ))?></a>
                </div>
                <h3 class="text-center"><a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title?>"><?php echo wp_trim_words($post->post_title,4) ?></a></h3>
                <p class="date text-center"><?php if($country["date"] !=''):?>
                        <span class="infor_temoignages_date">Période: <?php echo $country["date"] ?></span>
                    <?php endif;?>
                </p>
                <p class="text-center"><?php echo wp_trim_words($post->post_content,'25','')?></p>
                <?php if($country["country"] != ''){ ?>
                    <p class="country text-center"><?php echo $country["country"] ?></p>
                <?php }?>
            </div>
        <?php
        endwhile;
        echo "</div>";
        ?>
    <!-- chỉ mục trang -->
    <div id="wz_pagination">
        <div class="content_pagination">
            <?php
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '?paged=%#%',
                'mid_size' => 3,
                'current' => max(1, get_query_var('paged')),
                'total' => $loop->max_num_pages,
                'prev_text'          => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
                'next_text'          => __('<i class="fa fa-angle-right" aria-hidden="true"></i>'),
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