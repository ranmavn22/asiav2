<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

    <div class="bannerPage positionR">
        <?php echo get_the_post_thumbnail() ?>
        <div class="titlePage positionA"><h1>ASIA SOLEIL TRAVEL</h1></div>
    </div>
    <div class="grid-container">
        <div class="contentPage">
            <?php
            if ( have_posts() ) : ?>

    <div class="content_tour">
        <div class='listPost'>
                <?php while ( have_posts() ) : the_post();
                    $tour = $post->ID;
                    include __DIR__.'/includes/item_tour.php';
                endwhile; ?>
        </div>
    </div>
        <div id="wz_pagination">
            <div class="content_pagination">
                <?php
                global $wp_query;
                $big = 999999999; // need an unlikely integer
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format' => '?paged=%#%',
                    'mid_size' => 1,
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
                    'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>'),
                ));
                ?>
            </div>
        </div>
        <?php
            else : ?>
            <h1 class="text-center">No Result</h1>
            <?php
            endif;
            ?>
        </div>
    </div>
<?php
get_footer();
