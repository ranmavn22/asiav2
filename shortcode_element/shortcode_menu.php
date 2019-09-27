<?php
if (!defined('ABSPATH')) {
    die();
}
$url = get_stylesheet_directory_uri();
?>
<div id="menu_content_home">
    <div class="main_menu_txt">
        <ul>
            <li class="vietnam_secret menu_parent active"><a href="<?php echo get_permalink(539) ?>"><?php _e('VIETNAM SECRET', 'wz') ?></a>
                <div class="sub_menu">
                    <div class="content_sub">
                        <?php
                        $terms_secret = get_terms('category_vnsecret');
                        ?>
                        <div class="text_sub_menu">
                            <?php
                            if (is_active_sidebar('menu-vietnam-secret')) :
                                dynamic_sidebar('menu-vietnam-secret');
                            endif;
                            ?>
                        </div>
                        <div class="item_sub-menu">
                            <div class="item">
                                <div class="img_vietnam"><a href="<?php echo get_term_link(31); ?>"><img
                                                src="<?php echo z_taxonomy_image_url(31); ?>"/></a></div>
                                <div class="name_secret"><a
                                            href="<?php echo get_term_link(31); ?>"><?php $term_data = get_term_by('id', 31, 'category_vnsecret');
                                        echo $term_data->name;
                                        ?></a></div>
                            </div>
                            <div class="item">
                                <div class="img_vietnam"><a href="<?php echo get_term_link(30); ?>"><img
                                                src="<?php echo z_taxonomy_image_url(30); ?>"/></a></div>
                                <div class="name_secret"><a
                                            href="<?php echo get_term_link(30); ?>"><?php $term_data = get_term_by('id', 30, 'category_vnsecret');
                                        echo $term_data->name;
                                        ?></a></div>
                            </div>
                            <div class="item">
                                <div class="img_vietnam"><a href="<?php echo get_term_link(29); ?>"><img
                                                src="<?php echo z_taxonomy_image_url(29); ?>"/></a></div>
                                <div class="name_secret"><a
                                            href="<?php echo get_term_link(29); ?>"><?php $term_data = get_term_by('id', 29, 'category_vnsecret');
                                        echo $term_data->name;
                                        ?></a></div>
                            </div>
                            <a href="<?php echo get_permalink(553) ?>"
                               class="see_more"><?php _e('Demandez un devis gratuit', 'wz') ?></a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nos_voyages menu_parent "><a
                        href="<?php echo get_permalink(130) ?>"><?php _e('NOS VOYAGES', 'wz') ?></a>
                <div class="sub_menu">
                    <div class="content_sub">
                        <?php
                        $terms_tour = get_terms('category_tour');
                        ?>
                        <div class="text_sub_menu">
                            <?php
                            if (is_active_sidebar('menu-nos-voyages-left')):
                                dynamic_sidebar('menu-nos-voyages-left');
                            endif;
                            ?>
                        </div>
                        <div class="item_sub-menu">

                            <?php if (term_exists(36, 'category_tour')) { ?>
                                <div class="item">
                                    <div class="img_vietnam"><a href="<?php echo get_term_link(36); ?>"><img
                                                    src="<?php echo z_taxonomy_image_url(36); ?>"/></a></div>
                                    <div class="name_secret"><a
                                                href="<?php echo get_term_link(36); ?>"><?php $term_data = get_term_by('id', 36, 'category_tour');
                                            echo $term_data->name;
                                            ?></a></div>
                                </div>
                            <?php } ?>
                            <?php if (term_exists(38, 'category_tour')) { ?>
                                <div class="item">
                                    <div class="img_vietnam"><a href="<?php echo get_term_link(38); ?>"><img
                                                    src="<?php echo z_taxonomy_image_url(38); ?>"/></a></div>
                                    <div class="name_secret"><a
                                                href="<?php echo get_term_link(38); ?>"><?php $term_data = get_term_by('id', 38, 'category_tour');
                                            echo $term_data->name;
                                            ?></a></div>
                                </div>
                            <?php } ?>
                            <?php if (term_exists(33, 'category_tour')) { ?>
                                <div class="item">
                                    <div class="img_vietnam"><a href="<?php echo get_term_link(33); ?>"><img
                                                    src="<?php echo z_taxonomy_image_url(33); ?>"/></a></div>
                                    <div class="name_secret"><a
                                                href="<?php echo get_term_link(33); ?>"><?php $term_data = get_term_by('id', 33, 'category_tour');
                                            echo $term_data->name;
                                            ?></a></div>
                                </div>
                            <?php } ?>
                            <?php if (term_exists(37, 'category_tour')) { ?>
                                <div class="item">
                                    <div class="img_vietnam"><a href="<?php echo get_term_link(37); ?>"><img
                                                    src="<?php echo z_taxonomy_image_url(37); ?>"/></a></div>
                                    <div class="name_secret"><a
                                                href="<?php echo get_term_link(37); ?>"><?php $term_data = get_term_by('id', 37, 'category_tour');
                                            echo $term_data->name;
                                            ?></a></div>
                                </div>
                            <?php } ?>
                            <?php if (term_exists(35, 'category_tour')) { ?>
                                <div class="item">
                                    <div class="img_vietnam"><a href="<?php echo get_term_link(35); ?>"><img
                                                    src="<?php echo z_taxonomy_image_url(35); ?>"/></a></div>
                                    <div class="name_secret"><a
                                                href="<?php echo get_term_link(35); ?>"><?php $term_data = get_term_by('id', 35, 'category_tour');
                                            echo $term_data->name;
                                            ?></a></div>
                                </div>
                            <?php } ?>
                            <?php if (term_exists(34, 'category_tour')) { ?>
                                <div class="item">
                                    <div class="img_vietnam"><a href="<?php echo get_term_link(34); ?>"><img
                                                    src="<?php echo z_taxonomy_image_url(34); ?>"/></a></div>
                                    <div class="name_secret"><a
                                                href="<?php echo get_term_link(34); ?>"><?php $term_data = get_term_by('id', 34, 'category_tour');
                                            echo $term_data->name;
                                            ?></a></div>
                                </div>
                            <?php } ?>
                            <?php if (term_exists(39, 'category_tour')) { ?>
                                <div class="item">
                                    <div class="img_vietnam"><a href="<?php echo get_term_link(39); ?>"><img
                                                    src="<?php echo z_taxonomy_image_url(39); ?>"/></a></div>
                                    <div class="name_secret"><a
                                                href="<?php echo get_term_link(39); ?>"><?php $term_data = get_term_by('id', 39, 'category_tour');
                                            echo $term_data->name;
                                            ?></a></div>
                                </div>
                            <?php } ?>
                            <?php if (term_exists(88, 'category_tour')) { ?>
                                <div class="item">
                                    <div class="img_vietnam"><a href="<?php echo get_term_link(88); ?>"><img
                                                    src="<?php echo z_taxonomy_image_url(88); ?>"/></a></div>
                                    <div class="name_secret"><a
                                                href="<?php echo get_term_link(88); ?>"><?php $term_data = get_term_by('id', 88, 'category_tour');
                                            echo $term_data->name;
                                            ?></a></div>
                                </div>
                            <?php } ?>
                            <div class="item">
                                <div class="img_vietnam"><a href="<?php echo get_permalink(7704); ?>"><img
                                                src="<?php echo z_taxonomy_image_url(40); ?>"/></a></div>
                                <div class="name_secret"><a
                                            href="<?php echo get_permalink(7704); ?>"><?php echo get_the_title(7704) ?></a>
                                </div>
                            </div>

                            <a href="<?php echo get_permalink(553) ?>"
                               class="see_more"><?php _e('Demandez un devis gratuit', 'wz') ?></a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="site_a_decouvrir menu_parent "><a
                        href="<?php echo get_term_link(17); ?>"><?php _e('SITES À DÉCOUVRIR', 'wz') ?></a>
                <div class="sub_menu">
                    <div class="content_sub">
                        <div class="text_sub_menu">
                            <?php
                            if (is_active_sidebar('menu-sites-dcouvrir-left')) :
                                dynamic_sidebar('menu-sites-dcouvrir-left');
                            endif;
                            ?>
                        </div>
                        <div class="item_sub-menu">
                            <?php
                            if (is_active_sidebar('menu-sites-dcouvrir-right')) :
                                dynamic_sidebar('menu-sites-dcouvrir-right');
                            endif;
                            ?>
                            <a href="<?php echo get_permalink(553) ?>"
                               class="see_more"><?php _e('Demandez un devis gratuit', 'wz') ?></a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="notre_agence menu_parent "><a
                        href="<?php echo get_permalink(480) ?>"><?php _e('NOTRE AGENCE', 'wz') ?></a>

            </li>
        </ul>
    </div>
</div>


























