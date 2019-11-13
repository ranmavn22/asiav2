<?php
/**
 * The template for displaying Archive pages.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$obj = get_queried_object();
$value_banner = get_option('wz_taxonomy_option_banner'.$obj->term_id);
if(empty($value_banner)) $value_banner = get_option('wz_taxonomy_option_banner89');
get_header('blog'); ?>

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
    <div class="grid-container blogTemplate">
        <div id="content" class="displayFlex">
            <div class="mainContent">
				<h1><?php if(!$obj->description) echo $obj->name;?></h1>
                <?php echo wpautop($obj->description) ?>
                <?php
                $loop = new WP_Query(
                        array('post_type' => 'post',
                            'posts_per_page' => 12,
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                            'category_name' => $obj->slug)
                );

                ?>
                <div class='listPost'>
                    <?php
                    while ($loop->have_posts()) : $loop->the_post();
                        include __DIR__.'/includes/item_post.php';
                    endwhile; ?>
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
            <div class="mainSidebar">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                <?php endif; ?>
                <?php
                include_once __DIR__.'/includes/sidebar.php'
                ?>
            </div>
        </div>
    </div>

<?php
get_footer();
