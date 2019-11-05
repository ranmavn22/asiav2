<?php
/**
 * The template for displaying the footer.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

</div><!-- #page -->

<footer>
    <div class="sectionFooter1">
        <div class="grid-container displayFlex">
            <div class="leftColumn">
                <?php
                if (is_active_sidebar('footer-1')) :
                    dynamic_sidebar('footer-1');
                endif;
                ?>
            </div>
            <div class="rightColumn">
                <?php
                if (is_active_sidebar('footer-2')) :
                    dynamic_sidebar('footer-2');
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="sectionFooter2">
        <div class="tabs_country displayFlex alignCenter">
            <p class="item_country country_vietnam active positionR" data-class="country_vietnam"><?php _e('Vietnam','wz')?><span></span></p>
            <p class="item_country country_cambodge" data-class="country_cambodge"><?php _e('Cambodge','wz')?><span></span></p>
            <p class="item_country country_laos" data-class="country_laos"><?php _e('Laos','wz')?><span></span></p>
        </div>
        <div class="grid-container">
            <div class="area_footer_country">
                <div class="country_vietnam displayFlex">
                    <div class="item_location location_hanoi">
                        <ul>
                            <li><h3>SIÈGE SOCIAL À HANOI</h3></li>
                            <li><i class="fa fa-home" aria-hidden="true"></i><?php _e('2402, Buiding Hancorp plaza, 72 rue Tran Dang Ninh, Cau Giay, Hanoi, Vietnam','wz')?></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><?php _e('Tél: (+84) 243 75 86 448','wz')?></li>
                            <li><a href="mailto:info@asia-soleil-travel.com"><i class="fa fa-envelope" aria-hidden="true"></i>info@asia-soleil-travel.com</a></li>
                        </ul>
                    </div>
                    <div class="item_location location_hcm">
                        <ul>
                            <li><h3><?php _e('BUREAU À SAIGON','wz')?></h3></li>
                            <li><i class="fa fa-home" aria-hidden="true"></i><?php _e('30A, Pham Ngu Lao, Quan 1','wz')?></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><?php _e('Tél: (+84) 985 830 955','wz')?></li>
                            <li><a href="mailto:danieldat@asia-soleil-travel.com"><i class="fa fa-envelope" aria-hidden="true"></i>danieldat@asia-soleil-travel.com</a></li>
                        </ul>
                    </div>
                    <div class="item_location location_france">
                        <ul>
                            <li><h3><?php _e('CONSEILLER EN FRANCE','wz')?></h3></li>
                            <li><i class="fa fa-home" aria-hidden="true"></i><?php _e('14, boulevard Alsace - Lorraine 91170, Viry Chatinllon','wz')?></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><?php _e('Tél: 06 09 10 67 55','wz')?></li>
                            <li><a href="mailto:bich-thuy@asia-soleil-travel.com"><i class="fa fa-envelope" aria-hidden="true"></i>bich-thuy@asia-soleil-travel.com</a></li>
                        </ul>
                    </div>
                    <div class="item_location location_france">
                        <ul>
                            <li><h3><?php _e('BUREAU à VIENTIANE','wz')?></h3></li>
                            <li><i class="fa fa-home" aria-hidden="true"></i><?php _e('Thongphathong, Sisattanak District, Vientiane, Laos','wz')?></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><?php _e('Tel : +856 21 951 150','wz')?></li>
                        </ul>
                    </div>
                    <div class="item_location location_france">
                        <ul>
                            <li><h3><?php _e('BUREAU à SIEMREAP','wz')?></h3></li>
                            <li><i class="fa fa-home" aria-hidden="true"></i><?php _e('Banteay Chas, Siem Reap Kingdom of Cambodia','wz')?></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><?php _e('Tel : +855 12726939','wz')?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="menu_socket">
                <div class="addthis_inline_share_toolbox"></div>
                <?php wp_nav_menu(array('menu' => 93)); ?>
                <div class="kkstart">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="area_support">
        <a href="<?php echo get_page_link(553) ?>" class="btn_contact_home" title="Devis gratuit"><?php _e('Devis gratuit', 'wz') ?></a>
            <div class="wz_support">
                <div class="content_suport">
                    <h3>Besoin de conseil d’un expert ?</h3>
                    <img src="<?php echo get_site_url() ?>/wp-content/themes/enfold-child/dist/images/img_beautyful.png" alt="Mr.Dat">
                    <p>Hotline: M.DAT: +84 (0) 98 58 30 955</p>
                    <span><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                </div>
                <a href="<?php echo get_page_link(553) ?>" title="demander un devis">demander un devis</a>
            </div>
</div>
<div class="contact_mobile displayFlex alignCenter">
    <a href="<?php echo get_page_link(335)?>" title="CONTACTEZ-NOUS"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?php _e('CONTACTEZ-NOUS' , 'wz')?> </a>
    <a href="<?php echo get_page_link(342)?>" title="RAPPEL GRATUIT"><i class="fa fa-phone" aria-hidden="true"></i> <?php _e('RAPPEL GRATUIT' , 'wz')?> </a>
</div>
<?php wp_footer(); ?>
<!-- Subiz -->
<script>
    (function(s, u, b, i, z){
        u[i]=u[i]||function(){
            u[i].t=+new Date();
            (u[i].q=u[i].q||[]).push(arguments);
        };
        z=s.createElement('script');
        var zz=s.getElementsByTagName('script')[0];
        z.async=1; z.src=b; z.id='subiz-script';
        zz.parentNode.insertBefore(z,zz);
    })(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');
    subiz('setAccount', 'acqkswfbdgipoeiwefou');
</script>
<!-- End Subiz -->
</body>
</html>
