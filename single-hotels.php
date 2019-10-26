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

get_header();
$tags = wp_get_post_terms($post->ID, 'category_vnsecret');
$value_banner = get_option('wz_taxonomy_option_banner' . $tags[0]->term_id);
?>

<?php
while (have_posts()) : the_post();
    $value = get_post_meta($post->ID, 'wz_information_vnsecret', true); ?>
    <div class="bannerPage positionR">
        <?php echo wp_get_attachment_image($value_banner, 'full') ?>
        <div class="titlePage positionA"><h1><?php the_title() ?></h1></div>
    </div>
    <div class="grid-container">
        <div class="contentPage">
            <?php
            $value = get_post_meta($post->ID, 'wz_information_hotel', true);
            $value_editor = get_post_meta($post->ID, 'wz_demande', true);
            ?>
            <div class="top_infor">
                <h4><?php the_title() ?></h4>
                <?php
                if (!empty($value)) {
                    if ($value['assess'] != '') {
                        $danhgia = $value['assess'];
                        $nloop = floor($danhgia);
                        echo '<div class="wz_danhgia">';
                        for ($i = 0; $i < $nloop; $i++) {
                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                        }
                        if (($danhgia - $nloop) != 0) {
                            echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                        }
                        echo '</div>';
                    }
                    if ($value['address'] != '') {
                        echo '<div class="wz_adress_hotel"><span><i class="fa fa-circle" aria-hidden="true"></i> ' . __('Adresse:', 'wz') . ' </span>' . $value['address'] . '</div>';
                    }
                    if ($value['city'] != '') {
                        echo '<div class="wz_city_hotel"><span><i class="fa fa-circle" aria-hidden="true"></i> ' . __('City:', 'wz') . ' </span>' . $value['city'] . '</div>';
                    }
                    if ($value['country'] != '') {
                        echo '<div class="wz_country_hotel"><span><i class="fa fa-circle" aria-hidden="true"></i> ' . __('Country:', 'wz') . ' </span>' . $value['country'] . '</div>';
                    }

                    if ($value['img'] != '') {
                        echo '<div class="slide_img_hotels">';
                        echo '<div class="slide_big_hotels">';
                        foreach ($value["img"] as $img) {
                            if ($img != '') {
                                echo '<div class="slide_big_hotels"><img src="' . $img . '"></div>';
                            }
                        }
                        echo '</div>';
                        echo '<div class="slide_thumbnail_hotels">';
                        foreach ($value["img"] as $img) {
                            if ($img != '') {
                                echo '<div class="item"><img src="' . $img . '"></div>';
                            }
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="tabs_hotel">
                <a class="tabs_singer_hotel active" href="#" data-class="information_detail"><i
                            class="fa fa-info-circle" aria-hidden="true"></i> <?php _e('Informations', 'wz') ?></a>
                <a class="tabs_singer_hotel" href="#" data-class="demande_detail"><i
                            class="fa fa-pencil-square-o"
                            aria-hidden="true"></i> <?php _e('Demande Prix Détaillé', 'wz') ?></a>
            </div>
            <div class="wz_tabs_content information_detail show">
                <?php the_content(); ?>
            </div>
            <div class="wz_tabs_content demande_detail">
                <?php
                if ($value['city'] != '') {
                    echo '<input type="hidden" name="wz_name_hotel" class="wz_name_hotel" value="' . $value['name_hotel'] . '">';
                }
                ?>
                <h3>DEMANDE DEVIS DÉTAILÉ</h3>
                <?php echo do_shortcode("[ninja_form id=2]"); ?>
            </div>
            <?php
            wp_reset_postdata();
            $tag_ids = array();
            $tags = get_the_terms(get_the_ID(), 'tags_hotel');
            if ($tags) {
                //print_r($tags);
                foreach ($tags as $tag) {
                    $tag_ids[] = (int)$tag->term_id;
                }
            }
            $args = array(
                'posts_per_page' => 6,
                'post_type' => 'hotels',
                'orderby' => 'rand',
                'post__not_in' => array(get_the_ID()),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tags_hotel',
                        'field' => 'id',
                        'terms' => $tag_ids,
                    )/*,
                                array(
                                    'taxonomy' => 'category_hotel',
                                    'field'    => 'id',
                                    'terms'    => array(19,20,21),
                                    'operator' => 'NOT IN'
                                ),*/
                ),
            );
            $posts_array = get_posts($args);

            ?>
            <div class="related_posts">
                <div class="content_related_posts">
                    <?php
                    if ($posts_array) {
                        foreach ($posts_array as $post) {
                            $value = get_post_meta($post->ID, 'wz_information', true);
                            ?>
                            <div class="item">
                                <div class="img_related_posts"><a
                                            href="<?php echo get_permalink($post->ID) ?>"><?php echo get_the_post_thumbnail($post->ID, 'custom-medium') ?></a>
                                </div>
                                <div class="infor_related_posts">
                                    <h3><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?>
                                    </h3>
                                    <?php
                                    if ($value['assess'] != '') {
                                        $danhgia = $value['assess'];
                                        $nloop = floor($danhgia);
                                        echo '<div class="wz_danhgia">';
                                        for ($i = 0; $i < $nloop; $i++) {
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        if (($danhgia - $nloop) != 0) {
                                            echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                                        }
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="clear"></div>
                                <a href="<?php echo get_permalink($post->ID) ?>"
                                   class="hotel_detail seemore"><?php _e('Voir la suite', 'wz') ?></a>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
            <?php
            wp_reset_postdata(); ?>
        </div>

        <div id="back">
            <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i>
                <span><?php _e('AUTRES FORMULES', 'wz') ?></span></a>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer();