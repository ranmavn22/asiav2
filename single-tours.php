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
$value_infor = get_post_meta($post->ID, 'infor_tour', true);
$tags = wp_get_post_terms($post->ID,'category_tour');
$value_time = get_post_meta($post->ID,'wz_infor_tour_jour',true);
$description_tour_price = get_post_meta($post->ID,'description_tour_price',true);
$value_banner = get_option('wz_taxonomy_option_banner'.$tags[0]->term_id);
?>

<?php
while (have_posts()) : the_post();
    $value = get_post_meta($post->ID,'wz_information_vnsecret',true); ?>
    <div class="bannerPage positionR">
        <?php echo wp_get_attachment_image( $value_banner,'full' )?>
        <div class="titlePage positionA">
            <h1><?php the_title() ?></h1>
            <p class="info">
                <?php
                if (!empty($value_infor)) {
                    ?>
                    <?php if ($value_infor["commencement"] != "") { ?>
                        <span>
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <?php _e('Commencement:','wz')?> <?php echo $value_infor["commencement"] ?>
                        </span>
                    <?php } ?>
                    <?php if ($value_infor["depart1"] != "") { ?>
                        <span>
                            <i class="fa fa-plane" aria-hidden="true"></i>
                            <?php _e('Depart:','wz')?> <?php echo $value_infor["depart1"] ?>
                        </span>
                    <?php } ?>
                    <?php if (!empty($value_time)) { ?>
                        <span>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php _e('Duree:','wz')?> <?php echo $value_time ?> <?php _e('Jours','wz')?>
                        </span>
                    <?php } ?>
                    <?php if ($value_infor["code"] != "") { ?>
                        <span>
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            <?php _e('CODE:','wz')?> <?php echo $value_infor["code"] ?>
                        </span>
                    <?php } ?>
                    <?php
                }
                ?>
            </p>
        </div>
    </div>
    <div class="wrapPage1">
        <div class="wrapPage2">
    <div class="grid-container">
        <div class="contentPage">
            <?php
            $value_esprit_carte = get_post_meta($post->ID, 'wz_esprit_carte', true);
            $value_carte = get_post_meta($post->ID, 'img_carte', true);
            $value_program = get_post_meta($post->ID, 'wz_program_detail', true);
            $loi_ich_editor = get_post_meta($post->ID, 'wz_editor_esprit_carte', true);
            ?>

            <div class="tabs_infor_tour tabControl displayFlex alignCenter">
                <span class="tab_tour tabs_tour_04 text-center item" data-el=".content_tabs_infor4"><?php _e('Demander un devis','wz')?></span>
                <span class="tab_tour tabs_tour_02 text-center item active" data-el=".content_tabs_infor2"><?php _e('Programme détaillé','wz')?></span>
                <span class="tab_tour tabs_tour_01 text-center item" data-el=".content_tabs_infor1"><?php _e('Carte & Photos','wz')?></span>
                <span class="tab_tour tabs_tour_03 text-center item" data-el=".content_tabs_infor3"><?php _e('Prestations & Prix','wz')?></span>
            </div>

            <div class="tabContent content_tabs_infor content_tabs_infor1">
                <div class="short_description displayFlex alignCenter">
                    <div class="content_description">
                        <p class="star_tour"><i class="fa fa-star" aria-hidden="true"></i> Centre d'intérêt:</p>
                        <?php echo $loi_ich_editor; ?>
                    </div>
                    <div class="carte">
                        <a class="carte_tour lightBox" href="<?php echo $value_carte ?>" title="<?php the_title()?>"><img src="<?php echo $value_carte ?>" alt="<?php the_title()?>"></a>
                    </div>
                </div>
                <div class="etape_tour">
                    <p  class="star_tour"><i class="fa fa-star" aria-hidden="true"></i> Itinéraire en bref:</p>
                    <?php if (!empty($value_esprit_carte)) {
                        $num_etape = 1;
                        foreach ($value_esprit_carte as $item) { ?>
                            <div class="item item-<?php echo $num_etape ?>">
                                <div class="list_etape">Étape <?php echo $num_etape ?></div>
                                <div class="content_etape">
                                    <div class="label_etape"><?php echo $item["label"] ?>
                                        <span class="icon_etape"><i class="fa fa-chevron-up show" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="detail">
                                        <p>Vous aimerez : </p>
                                        <?php if (!empty($item["lichtrinh"])) {
                                            echo "<ul>";
                                            foreach ($item["lichtrinh"] as $lichtrinh) { ?>
                                                <li><?php echo $lichtrinh ?></li>
                                            <?php }
                                            echo "</ul>";
                                        } ?>
                                    </div>
                                </div>
                                <?php if (!empty($item["img"])) { ?>
                                    <div class="img_tour_content">
                                        <?php foreach ($item["img"] as $img) {?>
                                            <div class="img_vietnam_secret_item img_vietnam_secret_big">
                                                <a href="<?php echo $img?>" class="group_img_tour lightBox" rel="group_img_<?php echo $num_etape ?>" title="<?php the_title() ?>"><img src="<?php echo $img ?>" alt="<?php the_title() ?>"></a>
                                            </div>
                                        <?php }?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php $num_etape++;}} ?>
                </div>
            </div>

            <div class="tabContent content_tabs_infor content_tabs_infor2 active">
                <?php if (!empty($value_program)) {
                    $num = 1;
                    foreach ($value_program as $item) { ?>
                        <div class="item item-<?php echo $num ?>">
                            <div class="list_etape">Jour <?php echo $num ?></div>
                            <div class="content_etape">
                                <div class="label_etape">
                                    <?php echo $item["label"] ?>
                                    <span class="icon_etape">
                                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="detail">
                                <?php if($item["content"] != ""){ ?>
                                    <div class="content_tour_jour">
                                        <p><?php echo nl2br($item["content"]) ?></p>
                                    </div>
                                <?php } ?>
                                <?php if($item["hotels"] != ""){ ?>
                                    <div class="content_hotel_jour">
                                        <?php $value_hotels = get_post_meta($item["hotels"], 'wz_information_hotel', true); ?>
                                        <p><span class="title_hotel"><?php echo get_the_title($item["hotels"])?></span>
                                            <span>
                                            <?php
                                            if ($value_hotels['assess'] != '') {
                                                $danhgia = $value_hotels['assess'];
                                                $nloop = floor($danhgia);
                                                for ($i = 0; $i < $nloop; $i++) {
                                                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                                }
                                                if (($danhgia - $nloop) != 0) {
                                                    echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                                                }
                                            }
                                            ?>
                                        </span>
                                        </p>
                                        <div class="displayFlex inforHotel">
                                            <p class="img_hotel"><a href="<?php echo get_permalink($item["hotels"]) ?>" title="<?php echo get_the_title($item["hotels"])?>"><?php echo get_the_post_thumbnail($item["hotels"],'feature_thumbnail')?></a></p>
                                            <p class="desc"><?php echo nl2br(get_the_excerpt($item["hotels"])) ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php $num++; }} ?>
            </div>
            <div class="tabContent content_tabs_infor content_tabs_infor3">
                <?php the_content()?>
            </div>
            <div class="tabContent content_tabs_infor content_tabs_infor4">
                <h3><?php _e('Demander un devis gratuit','wz')?></h3>
                <?php echo do_shortcode('[contact-form-7 id="13187" title="Tour chi tiết"]')?>
            </div>





            <?php $value_editor = get_post_meta($post->ID, 'wz_tour_vietnam', true);
            if(!empty($value_editor)){
                ?>
                <p class="border_top"><span></span></p>
                <div class="container_slider positionR">
                    <?php
                    $args = array(
                        'posts_per_page' => 5,
                        'post_type' => 'vietnam_secret',
                        'post_status' => 'publish',
                        'suppress_filters' => true,
                        'post__in' => $value_editor
                    );
                    $posts_array = get_posts($args);
                    include __DIR__.'/includes/slider_tour.php';
                    ?>
                </div>
            <?php } ?>

            <div class="addthis_inline_share_toolbox"></div>

            <div class="related_post archive_tour content_tour">
                <h3 class="title">Autres circuits</h3>
                <div class="listPost">
                    <?php
                    $tag_ids = array();
                    foreach ($tags as $tag) {
                        if ($tag->slug != "portrait" && $tag->slug != "landscape") {
                            $tag_ids[] = (int)$tag->term_id;
                        }
                    }
                    wp_reset_postdata();
                    $related_query = get_posts(
                        array(
                            'posts_per_page'   => -1,
                            'post_type' => 'tours',
                            'post__not_in' => array( get_the_ID()),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_tour',
                                    'field'    => 'id',
                                    'terms'    => $tag_ids,
                                ),
                            ),
                        ));
                    if (!empty($related_query)) {
                        foreach ($related_query as $post_tags) {
                            $tour = $post_tags->ID;
                            include __DIR__.'/includes/item_tour.php';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="back">
            <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i> <span><?php _e('AUTRES FORMULES','wz')?></span></a>
        </div>
    </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer();