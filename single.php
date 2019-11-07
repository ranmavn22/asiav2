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
