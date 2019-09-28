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

<div class="header">
    <div class="container grid-container positionR">
        <div class="contentHeader">
            <div class="logo positionA">
                <?php generate_construct_logo()?>
            </div>
            <div class="menu">
                <?php echo do_shortcode('[main_menu]')?>
            </div>
            <div class="listFavourite positionA">
                <a href="<?php echo get_page_link(672)?>" title="VOTRE LISTE D'ENVIES">
                    <span>VOTRE LISTE</span>
                    <span>D'ENVIES</span>
                    <span class="number_tour positionA">0</span>
                </a>
            </div>
        </div>
        <div class="positionR hoverContent menuMobile">
           <button type="button" class="btnShowMenu positionR"><i class="fa fa-bars" aria-hidden="true"></i></button>
           <?php wp_nav_menu( ['menu_id' => 2,'menu_class'=> '', 'container_class'=> 'positionA hideContent topUL'] ) ?>
        </div>
    </div>
</div>
<div id="page" class="hfeed site grid-container container grid-parent">
    <div id="content" class="site-content">
<?php
/**
 * generate_inside_container hook.
 *
 * @since 0.1
 */
do_action('generate_inside_container');
