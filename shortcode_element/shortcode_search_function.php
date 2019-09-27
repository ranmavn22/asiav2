<?php
if (!defined('ABSPATH')) {
    die();
}

$terms = get_terms("category_tour");

?>

<div class="search_function_main">

    <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
        <input type="hidden" name="post_type" value="tours"/>
        <select name="category_tour">
            <option value="">Type de voyages?</option>
            <?php if (!empty($terms)) {
                foreach ($terms as $term) {
                    ?>
                    <option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>
                    <?php
                }
            } ?>
        </select>
        <select name="meta_query">
            <option value=""><?php _e('Durée de voyages?', 'wz') ?></option>
            <option value="1-7"><?php _e('1 - 7 jours', 'wz') ?></option>
            <option value="8-14"><?php _e('8 - 14 jours', 'wz') ?></option>
            <option value="15"><?php _e('Plus de 15 jours', 'wz') ?></option>
        </select>
        <input type="text" placeholder="Mot de clé" name="s">
        <button type="submit" class="btn_submit_search" id="btn-search"><span><?php _e('235 Voyages', 'wz') ?></span> <i
                    class="fa fa-search"></i></button>
    </form>
</div>
