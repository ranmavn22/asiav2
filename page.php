<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header('home'); ?>
    <div class="banner">
        <div class="sliderItem homeSlider">
            <div class="item positionR">
                <img src="https://asia-soleil-travel.com/wp-content/uploads/2017/07/1.jpg" alt="ASIA SOLEIL TRAVEL">
                <div class="slogan positionA displayFlex alignCenter">
                    <div class="logo"><?php generate_construct_logo() ?></div>
                    <div class="text">
                        <p>Agence locale, Créateur de voyage sur mesure</p>
                        <p>au Vietnam, Laos & Cambodge</p>
                        <p>" Chez nous, aucun voyage ne se ressemble, le vôtre sera unique et à votre mesure "</p>
                    </div>
                </div>
                <div class="inforTour positionA">
                    <p>VIETNAM ÉTONNANT</p>
                    <p>À partir de: 749</p>
                    <p><a class="" href="//asia-soleil-travel.com/circuit-vietnam/vietnam-etonnant/"
                          title="En savoir plus">En savoir plus</a></p>
                </div>
            </div>
            <div class="item positionR">
                <img src="https://asia-soleil-travel.com/wp-content/uploads/2017/07/1.jpg" alt="ASIA SOLEIL TRAVEL">
                <div class="slogan positionA displayFlex alignCenter">
                    <div class="logo"><?php generate_construct_logo() ?></div>
                    <div class="text">
                        <p>Agence locale, Créateur de voyage sur mesure</p>
                        <p>au Vietnam, Laos & Cambodge</p>
                        <p>" Chez nous, aucun voyage ne se ressemble, le vôtre sera unique et à votre mesure "</p>
                    </div>
                </div>
                <div class="inforTour positionA">
                    <p>VIETNAM ÉTONNANT</p>
                    <p>À partir de: 749</p>
                    <p><a class="" href="//asia-soleil-travel.com/circuit-vietnam/vietnam-etonnant/"
                          title="En savoir plus">En savoir plus</a></p>
                </div>
            </div>
            <div class="item positionR">
                <img src="https://asia-soleil-travel.com/wp-content/uploads/2017/07/1.jpg" alt="ASIA SOLEIL TRAVEL">
                <div class="slogan positionA displayFlex alignCenter">
                    <div class="logo"><?php generate_construct_logo() ?></div>
                    <div class="text">
                        <p>Agence locale, Créateur de voyage sur mesure</p>
                        <p>au Vietnam, Laos & Cambodge</p>
                        <p>" Chez nous, aucun voyage ne se ressemble, le vôtre sera unique et à votre mesure "</p>
                    </div>
                </div>
                <div class="inforTour positionA">
                    <p>VIETNAM ÉTONNANT</p>
                    <p>À partir de: 749</p>
                    <p><a class="" href="//asia-soleil-travel.com/circuit-vietnam/vietnam-etonnant/"
                          title="En savoir plus">En savoir plus</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="mainMenuHome">
        <div class="grid-container">
            <div class="contentMenu positionR displayFlex alignCenter">
                <img src="<?php echo get_site_url() ?>/wp-content/themes/generatepress-child/assets/images/icon_1.png" alt="">
                <?php echo do_shortcode('[main_menu]') ?>
                <img src="<?php echo get_site_url() ?>/wp-content/themes/generatepress-child/assets/images/icon_2.png" alt="">
                <div class="listFavourite">
                    <a href="<?php echo get_page_link(672)?>" title="VOTRE LISTE D'ENVIES">
                        <span>Votre liste</span>
                        <span>d'envies</span>
                        <span class="number_tour positionA">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="search">
        <div class="grid-container">
            <?php echo do_shortcode("[search_form]")?>
        </div>
    </div>
    <div class="listTourHome">
        <div class="grid-container">
            <?php echo do_shortcode("[tour_feature]")?>
        </div>
    </div>
<?php
get_footer();
