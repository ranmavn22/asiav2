<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php generate_do_microdata('body'); ?>>

<div class="header headerHome">
    <div class="container grid-container">
        <div class="contentHeader displayFlex">
            <div class="leftHeader">
                <span class="paysOther positionR hoverContent">PAYS <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <ul class="positionA hideContent topUL">
                        <li><a href="//laos.asia-soleil-travel.com/" title="Laos">Laos <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        <li><a href="//cambodge.asia-soleil-travel.com/" title="Cambodge">Cambodge <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        <li><a  href="//birmanie.asia-soleil-travel.com/" title="Birmanie">Birmanie <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    </ul>
                </span>
                <span>VIETNAM <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                <ul class="country_flats">
                    <li><a href="https://asia-soleil-travel.com/" title=""><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/flats_vn.jpg" alt=""></a></li>
                    <li><a href="//laos.asia-soleil-travel.com/" title=""><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/laos_flat.jpg" alt=""></a></li>
                    <li><a href="//cambodge.asia-soleil-travel.com/" title=""><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/cambodia_flat.jpg" alt=""></a></li>
                    <li><a href="//birmanie.asia-soleil-travel.com/" title=""><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/myanmar_flats.jpg" alt=""></a></li>
                </ul>
            </div>
            <div class="rightHeader">
                <span><a href="<?php echo get_page_link(335)?>" title="" class="alignCenter"><i class="fa fa-paper-plane" aria-hidden="true"></i>CONTACTEZ-NOUS </a></span>
                <span><a href="<?php echo get_page_link(342)?>" class="alignCenter"><i class="fa fa-phone" aria-hidden="true"></i> RAPPEL GRATUIT</a></span>
                <span class="positionR hoverContent">
                    <button type="button" class="btnShowMenu positionR"><i class="fa fa-bars" aria-hidden="true"></i></button>
                    <?php wp_nav_menu( ['menu_id' => 2,'menu_class'=> '', 'container_class'=> 'positionA hideContent topUL'] ) ?>
                </span>
            </div>
        </div>
    </div>
</div>
<div id="page" class="hfeed site grid-parent">
    <div id="content" class="">
<?php
/**
 * generate_inside_container hook.
 *
 * @since 0.1
 */
do_action('generate_inside_container');
