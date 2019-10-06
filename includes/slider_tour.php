<h3 class="text-center">NOS COUPS DE COEUR</h3>
<p class="text-center">Ci-dessous, nos produits originaux et uniques crées par notre agence inclus dans chacun des circuits</p>
<p class="text-center">Découvrez un VIETNAM AUTREMENT !</p>
<div class="slide_vnsceret sliderItem" data-item="1" data-dots-enable="true" data-arrow-disable="true">
    <?php if(!empty($posts_array)){
        foreach ($posts_array as $post){
            ?>
            <div class="item">
                <div class="displayFlex">
                    <div class="content_infor">
                        <h3><a href="<?php echo get_permalink($post->ID)?>" title="<?php echo $post->post_title?>"><?php echo $post->post_title?></a></h3>
                        <p><?php echo wp_trim_words($post->post_content,40,'')?></p>
                        <p class="see_more"><a href="<?php echo get_permalink(539)?>" title="<?php echo $post->post_title?>">Tous nos produits originaux <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>                                    </div>
                    <div class="img">
                        <a href="<?php echo get_permalink($post->ID)?>" title="<?php echo $post->post_title?>" class="positionR"><?php echo get_the_post_thumbnail($post->ID,'custom-large')?><span class="positionA">UNIQUE</span></a>
                    </div>
                </div>
            </div>
            <?php
        }
    } ?>
</div>