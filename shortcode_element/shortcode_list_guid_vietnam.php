<?php
if (!defined('ABSPATH')) {
    die();
}
$args = array(
    'posts_per_page' => 6,
    'offset' => 0,
    'category_name' => 'guide',
    'post_type' => 'post',
    'post_status' => 'publish'
);
$loop = new WP_Query($args);
global $post;
?>


<div class="list_guide">
    <div class="list_item_guide">
        <?php
        if (!empty($loop)) {
            while ($loop->have_posts()) : $loop->the_post();
                $image = get_the_post_thumbnail_url($post->ID, "medium");
                ?>
                <div class="item">
                    <div class="img_guide"><img class="wz_lazyload" data-original="<?php echo $image ?>" alt=""></div>
                    <div class="content_guide">
                        <h3><a href="<?php echo get_permalink() ?>"><?php echo the_title() ?></a></h3>
                        <p><?php echo wp_trim_words(get_the_content(), 30, '') ?></p>
                    </div>
                </div>
            <?php
            endwhile;
        }
        ?>
    </div>
    <div class="nav_list_guide">
        <p>
            <?php
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '',
                'current' => max(1, get_query_var('paged')),
                'mid_size' => 2,
                'end_size' => 2,
                'total' => $loop->max_num_pages,
                'prev_text' => __('<i class="fa fa-caret-left" aria-hidden="true"></i>'),
                'next_text' => __('<i class="fa fa-caret-right" aria-hidden="true"></i>'),
            ));
            ?>
        </p>
    </div>
</div>