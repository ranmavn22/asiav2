<?php
$url = get_stylesheet_directory_uri();
?>
<div id="mainMenu" class="mainMenu">
    <ul class="displayFlex alignCenter">
        <li class="vietnam_secret menu_parent hoverContent"><a href="<?php echo get_permalink(539) ?>" class="" title="VIETNAM SECRET"><?php _e('VIETNAM SECRET', 'wz') ?></a>
            <div class="sub_menu positionA hideContent">
                <div class="content_sub">
                    <?php $terms_secret = get_terms('category_vnsecret',['orderby' => 'id', 'order' => 'DESC',]); ?>
                    <div class="text_sub_menu">
                        Découvrez nos produits originaux " Vietnam Secret "
                    </div>
                    <div class="item_sub-menu">
                        <?php if($terms_secret){ foreach($terms_secret as $item){ ?>
                            <div class="item alignCenter">
                                <?php $category_feature_image = get_option('wz_taxonomy_option_feature_image'.$item->term_id); ?>
                                <div class="img_vietnam"><a href="<?php echo get_term_link($item->term_id); ?>" title="<?php echo $item->name; ?>"><?php echo wp_get_attachment_image( $category_feature_image,'thumbnail' )?></a></div>
                                <div class="name_secret"><a href="<?php echo get_term_link($item->term_id); ?>" title="<?php echo $item->name; ?>"><?php echo $item->name; ?></a></div>
                            </div>
                        <?php }}?>
                    </div>
                    <div class="alignright">
                        <a href="<?php echo get_permalink(553) ?>" class="see_more" title="Demandez un devis gratuit"><?php _e('Demandez un devis gratuit', 'wz') ?></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="nos_voyages menu_parent hoverContent"><a href="<?php echo get_permalink(130) ?>" class="" title="NOS VOYAGES"><?php _e('NOS VOYAGES', 'wz') ?></a>
            <div class="sub_menu positionA hideContent">
                <div class="content_sub">
                    <?php $terms_tour = get_terms('category_tour'); ?>
                    <div class="text_sub_menu">
                        " Chez nous, aucun voyage ne se ressemble, le vôtre sera unique et à votre mesure "
                    </div>
                    <div class="item_sub-menu">
                        <?php if($terms_tour){ foreach($terms_tour as $item){ ?>
                            <?php if(!get_option('wz_taxonomy_category_option_hiden'.$item->term_id)){?>
                                <div class="item">
                                    <?php $category_feature_image = get_option('wz_taxonomy_option_feature_image'.$item->term_id); ?>
                                    <div class="img_vietnam"><a href="<?php echo get_term_link($item->term_id); ?>" title="<?php echo $item->name; ?>"><?php echo wp_get_attachment_image( $category_feature_image,'thumbnail' )?></a></div>
                                    <div class="name_secret"><a href="<?php echo get_term_link($item->term_id); ?>" title="<?php echo $item->name; ?>"><?php echo $item->name; ?></a></div>
                                </div>
                            <?php }?>
                        <?php }}?>
                    </div>
                    <div class="alignright">
                    <a href="<?php echo get_permalink(553) ?>" class="see_more" title="Demandez un devis gratuit"><?php _e('Demandez un devis gratuit', 'wz') ?></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="notre_agence menu_parent "><a href="<?php echo get_permalink(480) ?>" title="NOTRE AGENCE"><?php _e('NOTRE AGENCE', 'wz') ?></a></li>
        <li class="site_a_decouvrir menu_parent hoverContent"><a href="<?php echo get_term_link(89); ?>"  class="" title="BLOG"><?php _e('BLOG', 'wz') ?></a></li>
    </ul>
</div>


























