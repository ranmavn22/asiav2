<?php
if (!defined('ABSPATH')) {
    die();
}
?>
<div class="wrap_about">
    <div class="item">
        <div class="img_avartar"><a
                    href="<?php echo get_permalink(809) ?>"><?php echo get_the_post_thumbnail(809, 'custom-medium') ?></a>
        </div>
        <h3><a href="<?php echo get_permalink(809) ?>"><?php echo get_the_title(809) ?></a></h3>
    </div>
    <div class="item">
        <div class="img_avartar"><a
                    href="<?php echo get_permalink(803) ?>"><?php echo get_the_post_thumbnail(803, 'custom-medium') ?></a>
        </div>
        <h3><a href="<?php echo get_permalink(803) ?>"><?php echo get_the_title(803) ?></a></h3>
    </div>
    <div class="item">
        <div class="img_avartar"><a
                    href="<?php echo get_permalink(493) ?>"><?php echo get_the_post_thumbnail(493, 'custom-medium') ?></a>
        </div>
        <h3><a href="<?php echo get_permalink(493) ?>"><?php echo get_the_title(493) ?></a></h3>
    </div>
    <div class="item">
        <div class="img_avartar"><a
                    href="<?php echo get_page_link(1904) ?>"><?php echo get_the_post_thumbnail(1904, 'custom-medium') ?></a>
        </div>
        <h3><a href="<?php echo get_page_link(1904) ?>"><?php echo get_the_title(1904) ?></a></h3>
    </div>
</div>