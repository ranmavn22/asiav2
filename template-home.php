<?php
/**
 * Template Name: Home page
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
                <img src="<?php echo get_site_url() ?>/wp-content/themes/generatepress-child/assets/images/icon_1.png"
                     alt="">
                <?php echo do_shortcode('[main_menu]') ?>
                <img src="<?php echo get_site_url() ?>/wp-content/themes/generatepress-child/assets/images/icon_2.png"
                     alt="">
                <div class="listFavourite">
                    <a href="<?php echo get_page_link(672) ?>" title="VOTRE LISTE D'ENVIES">
                        <span>Votre liste</span>
                        <span>d'envies</span>
                        <span class="number_tour positionA"><?php echo $_COOKIE["toursID_asia_count"] ? $_COOKIE["toursID_asia_count"] : 0 ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="search">
        <div class="grid-container">
            <?php echo do_shortcode("[search_form]") ?>
        </div>
    </div>
    <div class="listTourHome listTourStyle1">
        <div class="grid-container">
            <h2><span>Inspirez-vous de</span> nos idées de voyage</h2>
            <?php echo do_shortcode("[tour_feature]") ?>
            <div class="btnSeemore">
                <a href="<?php get_permalink(2792) ?>" title="Tous nos circuits">Tous nos circuits <i
                            class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!--<div class="listGuid">
        <div class="titleSection">
            <h2><span>Tout savoir avant de</span> voyager au vietnam</h2>
        </div>
        <div class="contentList">
            <div class="grid-container">
                <?php /*echo do_shortcode("[list_guid]") */?>
                <div class="linkGuide displayFlex alignCenter">
                    <p>
                        <a href="<?php /*get_term_link(15) */?>" title="Guide culturel">Guide culturel <i
                                    class="fa fa-caret-right"></i></a></p>
                    <p>
                        <a href="<?php /*get_term_link(16) */?>" title="Guide de voyage">Guide de voyage <i
                                    class="fa fa-caret-right"></i></a>
                    </p>
                    <p>
                        <a href="<?php /*get_term_link(17) */?>" title="Destinations à découvrir">Destinations à découvrir
                            <i class="fa fa-caret-right"></i></a>
                    </p>
                    <p>
                        <a href="<?php /*get_term_link(3) */?>" title="Guide pratique">Guide pratique <i
                                    class="fa fa-caret-right"></a></i>
                    </p>
                </div>
            </div>
        </div>
    </div>-->
    <div class="titleSection">
        <h2><span>À propos </span> de nous</h2>
    </div>
    <div class="aboutUs">
        <div class="grid-container">
            <div class="contentSection">
                <div class="contentPage">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                    <div class="btnSeemore">
                        <a href="<?php get_permalink(480) ?>" title="En savoir plus">En savoir plus <i
                                    class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="titleSection">
        <h2><span>Témoi </span> gnages</h2>
        <p>Déjà 25.386 voyageurs et 97% de satisfaction</p>
    </div>
    <div class="reviewsSection">
        <div class="grid-container">
            <div class="contentSection">
                <?php echo do_shortcode("[list_reviews]") ?>
            </div>
            <div class="btnSeemore">
                <a href="<?php get_permalink(174) ?>" title="En savoir plus">En savoir plus <i
                            class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    <div class="videoSection">
        <div class="grid-container">
            <!--<div class="contentSection displayFlex">
                <div class="leftContent">
                    <h3>VIETNAM SECRET</h3>
                    <h3>Découvrez nos produits originaux</h3>
                    <ul>
                        <li><a href="" title="Coin de charme">Coin de charme</a></li>
                        <li><a href="" title="Perles du Vietnam">Perles du Vietnam</a></li>
                        <li><a href="" title="Plongée dans la vie locale">Plongée dans la vie locale</a></li>
                    </ul>
                    <div class="btnSeemore">
                        <a href="<?php /*get_permalink(174) */?>" title="Vous aimerez ">Vous aimerez <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="rightContent">
                    <video width="627" height="455" preload="yes" id="video" loop="" autoplay="" controls="true"
                           muted="" src="//localhost/asia/voyage_vietnam_sur_mesure.mp4" type="video/mp4"
                           poster="//asia-soleil-travel.com/wp-content/uploads/2019/08/poster.png">Your browser does not
                        support the video tag.
                    </video>
                </div>
            </div>-->
            <h2 class="text-center">Nos récentes vidéos</h2>
            <p class="text-center">Notre collection de vidéos effectuées par notre équipe de terrain, sur les activités authentiques lors des missions de repérage et aussi sur les activités de notre équipe, les expériences de nos voyageurs.</p>
            <div class="displayFlex">
                <div class="leftContent">
                    <a href="#" class="positionR" title="">
                        <img src="http://localhost/asia/wp-content/uploads/2019/11/asia.jpg" alt="">
                        <span class="iconPlay positionA"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/iconvideo.png" alt="play"></span>
                    </a>
                </div>
                <div class="rightContent">
                    <div class="item displayFlex">
                        <a class="positionR" title="Promenade à vélo jusqu’au marché local" href="#"><img src="http://localhost/asia/wp-content/uploads/2019/11/asia2-1.jpg" alt="Promenade à vélo jusqu’au marché local">
                        <span class="iconPlay positionA"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/iconvideo.png" alt="play"></span>
                        </a>
                        <p><a href="#" title="Promenade à vélo jusqu’au marché local">Promenade à vélo jusqu’au marché local</a></p>
                    </div>
                    <div class="item displayFlex">
                        <a href="#" class="positionR" title="Célébration des 10 ans d’ASIA SOLEIL TRAVEL"><img src="http://localhost/asia/wp-content/uploads/2019/11/asia3.jpg" alt="Célébration des 10 ans d’ASIA SOLEIL TRAVEL">
                            <span class="iconPlay positionA"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/iconvideo.png" alt="play"></span>
                        </a>
                        <p><a href="#" class="positionR" title="Célébration des 10 ans d’ASIA SOLEIL TRAVEL">Célébration des 10 ans d’ASIA SOLEIL TRAVEL</a></p>
                    </div>
                    <div class="item displayFlex">
                        <a href="#" class="positionR" title="Séance de pêche dans la campagne du Vietnam"><img src="http://localhost/asia/wp-content/uploads/2019/11/asia4.jpg" alt="Séance de pêche dans la campagne du Vietnam">
                            <span class="iconPlay positionA"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/iconvideo.png" alt="play"></span>
                        </a>
                        <p><a href="#" title="Séance de pêche dans la campagne du Vietnam">Séance de pêche dans la campagne du Vietnam</a></p>
                    </div>
                    <div class="item displayFlex">
                        <a href="#" class="positionR" title="Satisfaction de Voyageur d'Asia Soleil Travel"><img src="http://localhost/asia/wp-content/uploads/2019/11/asia5.jpg" alt="Satisfaction de Voyageur d'Asia Soleil Travel">
                            <span class="iconPlay positionA"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/iconvideo.png" alt="play"></span>
                        </a>
                        <p><a href="#" title="Satisfaction de Voyageur d'Asia Soleil Travel">Satisfaction de Voyageur d'Asia Soleil Travel</a></p>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="blockSection">
        <div class="grid-container">
            <div class="contentSection">
                <?php echo do_shortcode("[slider_blog]") ?>
            </div>
        </div>
    </div>

    <div class="countSection">
        <div class="grid-container">
            <div class="contentSection displayFlex alignCenter">
                <div class="item">
                    <div class="counter counter0" data-count="25386">0</div>
                    <p>Voyageurs nous ont fait confiance</p>
                </div>
                <div class="item">
                    <div class="counter counter1" data-count="743">0</div>
                    <p>Avis de voyageurs</p>
                </div>
                <div class="item">
                    <div class="counter counter2" data-count="52">0</div>
                    <p>Produits originaux et uniques</p>
                </div>
                <div class="item">
                    <div class="counter counter3" data-count="7">0</div>
                    <p>Projets solidaire</p>
                </div>
                <div class="item">
                    <div class="counter counter4" data-count="5">0</div>
                    <p>Bureaux au Vietnam, Laos, Cambodge et France</p>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
