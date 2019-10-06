<?php
/**
 * Template Name: Tour
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
        <div class="grid-container">
            <div class="contentPage">
                <div class="hidePart">
                    <?php the_content() ?>
                </div>
                <p class="seeMoreContentPage text-center"><a href="#" class="" title="VOIR LA SUITE"><span>VOIR LA SUITE</span></a></p>
                <div class="listTourStyle1">
                    <?php
                    $terms_tour = get_terms('category_tour', array(
                        'hide_empty' => false,
                    ));
                    echo '<div class="listPost">';
                    foreach ($terms_tour as $term) {
                        $value_hiden = get_option('wz_taxonomy_category_option_hiden'.$term->term_id);
                        if($value_hiden != "on"){
                            $category_feature_image = get_option('wz_taxonomy_option_feature_image'.$term->term_id);
                    ?>
                            <div class="item_tour positionR">
                                <a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name;?>" class="positionR">
                                    <?php echo wp_get_attachment_image( $category_feature_image,'feature_thumbnail' )?>
                                    <span class="positionA"><?php echo $term->name;?></span>
                                </a>
                            </div>
                    <?php } }
                    echo '</div>';
                    ?>
                </div>
                <div class="listOtherTour"></div>
                <div class="listTourStyle1">
                    <div class="listPost">
                    <?php
                    foreach ($terms_tour as $term) {
                        $value_hiden = get_option('wz_taxonomy_category_option_hiden'.$term->term_id);
                        if($value_hiden == "on"){
                            $category_feature_image = get_option('wz_taxonomy_option_feature_image'.$term->term_id);
                            ?>
                            <div class="item_tour positionR">
                                <a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name;?>" class="positionR">
                                    <?php echo wp_get_attachment_image( $category_feature_image,'feature_thumbnail' )?>
                                    <span class="positionA"><?php echo $term->name;?></span>
                                </a>
                            </div>
                        <?php } }
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
        <?php endwhile; ?>
<?php
get_footer();
