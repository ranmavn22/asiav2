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

<?php wp_footer(); ?>

</body>
</html>
