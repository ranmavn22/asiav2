<?php
if (!defined('ABSPATH')) {
    die();
}
$value = $_COOKIE["toursID_asia"];
$posts = explode(',', $value);


$args = array(
	'posts_per_page' => -1,
    'post_type' => array('tours','vietnam_secret'),
    'post__in' => $posts
);

$posts = get_posts($args);
?>
<div class="container_tour_order">
    <?php if(!empty($posts)){ foreach ($posts as $item){ ?>
    <div class="item" data-id="<?php echo $item->ID?>">
        <input type="hidden" value="<?php echo get_the_title($item->ID)?>" class="name_tour_order">
        <a href="<?php the_permalink($item->ID)?>"><?php echo get_the_post_thumbnail($item->ID,'custom-medium')?></a>
        <h4><a href="<?php the_permalink($item->ID)?>"><?php echo get_the_title($item->ID)?></a></h4>
        <a href="#" class="move_item"><?php _e('Presonnaleser ce programme','wz') ?> <i class="fa fa-times" aria-hidden="true"></i></a>
    </div>
    <?php }}?>
</div>
<?php
