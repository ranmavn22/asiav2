<div class="item">
<div class="contentItem">
    <div class="img_post">
        <a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo get_the_title($post->ID) ?>">
            <?php echo get_the_post_thumbnail($post->ID, 'custom-medium', array('alt' => $post->post_title)) ?>
        </a>
    </div>
    <div class="content_post content_item">
        <h4>
            <a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo get_the_title($post->ID) ?>">
                <?php echo get_the_title($post->ID) ?>
            </a>
        </h4>
        <span class="date_time">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <?php echo get_the_time(get_option('date_format')) ?>
        </span>
        <p><?php echo wp_trim_words($post->post_content, '35', '') ?></p>
        <a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo get_the_title($post->ID) ?>"
           class="see_more">Voir la suite <img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/icon_seemore.png" alt="Detail">
        </a>
    </div>
</div>
</div>