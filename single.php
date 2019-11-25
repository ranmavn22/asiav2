<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header('blog'); ?>
    <div class="bannerPage positionR">
        <?php the_post_thumbnail( $value_banner,'full' )?>
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
                <h1><?php the_title() ?></h1>
                <?php the_content() ?>
                <div class="comments-area">
                    <?php comments_template(); ?>
                </div>

                <div class="related_post blockSection">
                    <div class="wrap_slideBlog">
                    <?php
                    $category = get_the_category($post->ID);
                    wp_reset_postdata();
                    $related_query = get_posts(
                        array(
                            'posts_per_page'   => 6,
                            'category_name' => $category[0]->slug,
                            'post_type' => 'post',
                            'orderby' => 'rand',
                            'post__not_in' => array($post->ID)
                        ));
                    if (!empty($related_query)) {
                        foreach ($related_query as $post) {
                            ?>
                            <div class="item">
                                <div class="img positionR">
                                    <a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title?>"><?php echo get_the_post_thumbnail($post->ID,'custom-medium', array( 'alt' => $post->post_title ))?>
                                        <span class="hover positionA"><img src="//asia-soleil-travel.com/wp-content/themes/generatepress-child/assets/images/hover-effect.png" alt=""></span>
                                    </a>
                                </div>
                                <div class="desc">
                                    <h3><a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo $post->post_title?>"><?php echo $post->post_title ?></a></h3>
                                </div>
                            </div>
                        <?php }} ?>
                    </div>
                </div>

            </div>
            <div class="mainSidebar">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                <?php endif; ?>
                <?php include_once __DIR__.'/includes/sidebar.php' ?>
            </div>
        </div>
    </div>

<?php
get_footer();
