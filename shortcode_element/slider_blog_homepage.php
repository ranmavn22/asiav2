<?php
if (!defined('ABSPATH')) {
    die();
}
$args = array(
    'posts_per_page' => 8,
    'offset' => 0,
    'category_name' => 'blog-voyage-vietnam',
    'post_type' => 'post',
    'post_status' => 'publish',
);
$posts = get_posts($args);
if (!empty($posts)) {
    ?>
    <div class="title">
        <h3>LES ARTICLES RÉCENTS DE NOTRE BLOG</h3>
        <p>Vous souhaitez connaître les secrets du Vietnam, en savoir plus sur le pays? Les bons plans mais aussi les informations essentielles pour un séjour réussi ? Les articles
            de notre blog sont là pour répondre à toutes les questions que vous vous posez !</p>
    </div>
    <div class="wrap_slideBlog sliderItem" data-item="4" data-arrow-disable="1" data-dots-enable="1">
        <?php
        foreach ($posts as $post) { ?>
            <div class="item">
                <div class="img positionR">
                    <a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo get_the_title($post->ID) ?>"><?php echo get_the_post_thumbnail($post->ID, 'custom-medium') ?>
                        <span class="hover positionA"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/hover-effect.png" alt=""></span>
                    </a>
                </div>
                <div class="desc">
                    <h3><a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo get_the_title($post->ID) ?>"><?php echo get_the_title($post->ID) ?></a></h3>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="linkToBlog">
        <a href="<?php echo get_category_link(89) ?>">Visiter notre blog</a>
    </div>
    <?php
}
