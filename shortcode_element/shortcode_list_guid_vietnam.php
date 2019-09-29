<?php
if (!defined('ABSPATH')) {
    die();
}

$page = !empty($page) ? $page : 1;
$offset = !empty($page) ? ($page - 1)*6 : 0;
$args = array(
    'posts_per_page' => 6,
    'offset' => $offset,
    'category_name' => 'guide-de-voyage-vietnam',
    'post_type' => 'post',
    'post_status' => 'publish'
);
$loop = new WP_Query($args);

?>

<div class="list_guide">
    <div class="list_item_guide displayFlex">
        <?php
        if (!empty($loop)) {
            while ($loop->have_posts()) : $loop->the_post();
                ?>
                <div class="item displayFlex alignCenter">
                    <div class="img_guide"><a href="<?php echo get_permalink($post->id) ?>" title="<?php echo the_title() ?>"><?php echo get_the_post_thumbnail($post->id,'thumbnail')?></a></div>
                    <div class="content_guide">
                        <h3><a href="<?php echo get_permalink() ?>" title="<?php echo the_title() ?>"><?php echo the_title() ?></a></h3>
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
                'current' => $page,
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