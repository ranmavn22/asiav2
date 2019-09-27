<?php
if (!defined('ABSPATH')) {
    die();
}
global $post;
$loop = new WP_Query(array('post_type' => 'attachment',
        'posts_per_page' => 12,
        'post_status' => 'inherit',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'media_category',
                'field' => 'slug',
                'terms' => 'galery',
            ),
        ),
    )
);
echo "<div class='archive_secret'><div class='wz_container'>";
while ($loop->have_posts()) : $loop->the_post();

    ?>
    <div class="item">
        <a class="galery_page" href="<?php echo $post->guid ?>">
            <?php
            $image = wp_get_attachment_image_src($post->ID, "custom-medium");
            ?>
            <img class="size-custom-medium" data-original="<?php echo $image[0] ?>" alt="">
        </a>
    </div>
<?php
endwhile;
echo "</div>";
?>
</div>
<div id="wz_pagination">
    <div class="content_pagination">
        <?php
        $big = 999999999; // need an unlikely integer
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'mid_size' => 1,
            'current' => max(1, get_query_var('paged')),
            'total' => $loop->max_num_pages,
            'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
            'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>'),
        ));
        ?>
    </div>
</div>
</div>