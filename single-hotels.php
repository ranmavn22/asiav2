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

get_header('blog');

?>

<?php
while (have_posts()) : the_post();
    $tags = wp_get_post_terms(get_the_ID(), 'category_hotel');
    $value_banner = get_option('wz_taxonomy_option_banner' . $tags[0]->term_id);
    $value = get_post_meta($post->ID, 'wz_information_vnsecret', true); ?>
    <div class="bannerPage positionR">
        <?php echo wp_get_attachment_image($value_banner, 'full',false,['alt' => get_the_title()]) ?>
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
        <div class="contentPage mainContent">
            <?php
            $value = get_post_meta($post->ID, 'wz_information_hotel', true);
            $value_editor = get_post_meta($post->ID, 'wz_demande', true);
            ?>
            <div class="top_infor">
                <h1><?php the_title() ?></h1>
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
                        echo '<div class="slider-for">';
                        foreach ($value["img"] as $img) {
                            if ($img != '') {
                                echo '<div class="item"><img src="' . $img . '" alt="slider"></div>';
                            }
                        }
                        echo '</div>';
                        echo '<div class="slider-nav">';
                        foreach ($value["img"] as $img) {
                            if ($img != '') {
                                echo '<div class="item"><img src="' . $img . '" alt="slider"></div>';
                            }
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="information_detail">
                <?php the_content(); ?>
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
<?php endwhile; ?>
<?php get_footer();