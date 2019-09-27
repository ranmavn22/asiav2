<?php
if (!defined('ABSPATH')) {
    die();
}
$loop = new WP_Query(array('post_type' => 'attachment', 'posts_per_page' => 20, 'post_status' => 'inherit', 'paged' => get_query_var('paged') ? get_query_var('paged') : 1, 'tax_query' => array(
        array(
            'taxonomy' => 'media_category',
            'field' => 'slug',
            'terms' => 'gallery-thanh-vien',
        ),
    ),
    )
);
echo "<div class='wz_container gallery_slider owl-carousel owl-theme'>";
while ($loop->have_posts()) : $loop->the_post();
    global $post;
    ?>

    <div class="item">

        <?php
        $image = wp_get_attachment_image_src($post->ID, "custom-medium");
        ?>

        <a class="galery_page" href="<?php echo $post->guid ?>">

            <img class="size-custom-medium" src="<?php echo $image[0] ?>" alt="">
        </a>
    </div>
<?php
endwhile;
echo "</div>";
?>
						