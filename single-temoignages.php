<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

?>
    <div class="bannerPage positionR">
        <?php echo get_the_post_thumbnail(174) ?>
        <div class="titlePage positionA"><h1><?php echo get_the_title(174)?></h1></div>
    </div>
	<div class="breadcrumbs">
        <div class="grid-container">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
        </div>
    </div>
    <div class="grid-container">
        <?php
        if (have_posts()) :
            $value = get_post_meta($post->ID,'wz_infor_temoignages',true);
            while (have_posts()) : the_post();
                ?>
                <div class="wrap_temoignages displayFlex">
                    <div class="img_temoignages">
                        <?php the_post_thumbnail('medium') ?>
                    </div>
                    <div class="content_temoignages">
                        <h2><?php the_title()?></h2>
                        <?php if(!empty($value)): ?>
                            <div class="infor_temoignages">
                                <?php if($value["phone"] !=''):?>
                                    <span><i class="fa fa-phone" aria-hidden="true"></i>  Phone:  <?php echo $value["phone"] ?></span>
                                <?php endif;?>
                                <?php if($value["email"] !=''):?>
                                    <span><a href="mailto:<?php echo $value["email"] ?>" title=""><i class="fa fa-envelope" aria-hidden="true"></i> Email: <?php echo $value["email"] ?></a></span>
                                <?php endif;?>
                                <?php if($value["date"] !=''):?>
                                    <span class="infor_temoignages_date">Période: <?php echo $value["date"] ?></span>
                                <?php endif;?>
                                <?php if($value["country"] !=''):?>
                                    <span class="infor_temoignages_country"><?php echo $value["country"] ?></span>
                                <?php endif;?>
                            </div>
                        <?php endif;?>
                        <p><?php the_content()?></p>

                    </div>
                </div>
                <div class="clear"></div>


            <?php endwhile;
        endif;?>
        <div class="addthis_inline_share_toolbox"></div>
        <div id="back">
            <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i> <span><?php _e('AUTRES FORMULES','wz')?></span></a>
        </div>
        <!--end content-->
    </div><!-- close default .container_wrap element -->
<?php get_footer(); ?>