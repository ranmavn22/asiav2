<?php
if (!empty($tour)){
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
        <?php if($value_time){?>
            <span class="date_tour itemInfor"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $value_time?> Jours</span>
        <?php }?>
        <?php if( !empty($value_carte) ){?>
            <span class="map_tour itemInfor"><a class="lightBox" href="<?php echo $value_carte?>" title="<?php echo $title_post; ?>"><i class="fa fa-map" aria-hidden="true"></i> <?php _e('Carte','wz')?></a></span>
        <?php }?>
    </div>
</div>
<?php }