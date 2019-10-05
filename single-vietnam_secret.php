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
$tags = wp_get_post_terms($post->ID,'category_vnsecret');
$value_banner = get_option('wz_taxonomy_option_banner'.$tags[0]->term_id);
?>

<?php
while (have_posts()) : the_post();
    $value = get_post_meta($post->ID,'wz_information_vnsecret',true);
    ?>
    <div class="bannerPage positionR">
        <?php echo wp_get_attachment_image( $value_banner,'full' )?>
        <div class="titlePage positionA"><h1><?php the_title() ?></h1></div>
    </div>
    <div class="grid-container">
        <div class="contentPage"><?php the_content() ?></div>


            <?php $index = 0; if(!empty($value) && !empty($value["img"])){ ?>

        <div class="imgStyle1">
            <?php
                foreach ($value["img"] as $img) {
                $num = $index++;
                if($num == 0){
                    ?>
                    <div class="img_item img_big">
                        <a rel="lightBox" href="<?php echo $value["img"][$num]?>" class="lightBox" title="<?php the_title() ?>"><img src="<?php echo $value["img"][$num] ?>" alt="<?php the_title() ?>"></a>
                    </div>
                <?php }else if($num > 0 && $num <= 3){?>
                    <div class="img_item img_small">
                        <a rel="lightBox" href="<?php echo $value["img"][$num]?>" class="lightBox" title="<?php the_title() ?>"><img src="<?php echo $value["img"][$num] ?>" alt="<?php the_title() ?>"></a>
                    </div>
                <?php }else if( $num > 3){?>
                    <a rel="lightBox" href="<?php echo $value["img"][$num]?>" class="img_hiden lightBox" title="<?php the_title() ?>"><img src="<?php echo $value["img"][$num] ?>" alt="<?php the_title() ?>"></a>
                <?php }?>
            <?php } ?>
        </div>
                <p class="see_more_img_colorbox"><a rel="lightBox" href="<?php if($value["img"][5] != ""){ echo $value["img"][5]; }else{ echo $value["img"][0];} ?>" class="lightBox" title="<?php the_title() ?>">Plus de photo</a></p>
            <?php }?>


        <div class="content_contact displayFlex alignCenter">
            <input type="hidden" disabled value="<?php echo $post->ID?>" class="data_tour_ID">
            <span class="title_contact"><?php _e('CELA VOUS AIMEZ ?','wz')?></span>
            <span class="link_contact"><a href="<?php echo get_page_link(335 )?>" title="Nous Contacter"><?php _e('Nous Contacter','wz')?></a></span>
            <span class="wisth_list"><a href="<?php echo get_page_link(672 )?>" class="add_like_post" title="AJOUTER AU PANIER"><?php _e('AJOUTER AU PANIER','wz')?></a></a></span>
        </div>
        <div class="addthis_inline_share_toolbox"></div>
        <div class="content_tour">
                <?php
                if(!empty($value)){
                    if($value["tour"] != ""){
                        echo "<h2>LES VOYAGES INCLUANT CE VIETNAM SECRET</h2>";
                        echo '<div class="listPost">';
                        foreach ($value["tour"] as $tour){
                            $value_time = get_post_meta($tour,'wz_infor_tour_jour',true);
                            $value_carte = get_post_meta($tour, 'img_carte', true);
                            $title_post = get_the_title($tour);
                            $content_post = wp_trim_words(get_the_excerpt($tour),30,'...');
                            ?>
                            <div class="item">
                                <a href="<?php echo get_permalink($tour)?>" title="<?php echo $title_post; ?>" class="positionR"><?php echo get_the_post_thumbnail($tour,"custom-medium") ?>
                                    <div class="excerpt_tour_pc positionA"><span><?php echo $content_post ?></span></div>
                                </a>
                                <h3><a href="<?php echo get_permalink($tour)?>" title="<?php echo $title_post; ?>"><?php echo $title_post; ?></a></h3>
                                <div class="excerpt_tour"><span><?php echo $content_post ?></span></div>
                                <div class="infor_tour displayFlex alignCenter">
                                    <?php if($value_time) ?>
                                        <span class="date_tour itemInfor"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $value_time?> Jours</span>
                                    <?php if( $value_carte )?>
                                        <span class="map_tour itemInfor"><a class="lightBox" href="<?php echo $value_carte?>" title="<?php echo $title_post; ?>"><i class="fa fa-map" aria-hidden="true"></i> <?php _e('Carte','wz')?></a></span>
                                </div>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    }
                }
                ?>
        </div>
        <div id="back">
            <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i> <span><?php _e('AUTRES FORMULES','wz')?></span></a>
        </div>
    </div>
<?php endwhile; ?>
<?php
get_footer();
