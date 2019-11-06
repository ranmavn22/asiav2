<?php
/**
 * Template Name: About
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<?php
while (have_posts()) : the_post(); ?>

    <div class="bannerPage positionR">
        <?php echo get_the_post_thumbnail() ?>
        <div class="titlePage positionA"><h1><?php the_title() ?></h1></div>
    </div>
    <div class="wrapPage1">
        <div class="wrapPage2">
    <div class="grid-container">
        <?php the_content() ?>
    </div>
    <div class="listVideo">
        <div class="grid-container">
            <h3>Nos récentes vidéos</h3>
            <div class="displayFlex">
                <div class="item">
                    <a class="lightBox" href="https://www.youtube.com/embed/LimQllboF8s" title="10 ANS D’ASIA SOLEIL TRAVEL">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/10-ans-Asia-Soleil-Travel_02-495x400.jpg" alt="10 ANS D’ASIA SOLEIL TRAVEL">
                        <span class="bgPlay"><img src="//asia-soleil-travel.com/wp-content/uploads/2017/10/icon_play.png" alt="Play"></span>
                    </a>
                    <h4>
                        <a class="lightBox iframe" href="https://www.youtube.com/embed/LimQllboF8s" title="10 ANS D’ASIA SOLEIL TRAVEL">
                            10 ANS D’ASIA SOLEIL TRAVEL
                        </a>
                    </h4>
                </div>
                <div class="item">
                    <a class="lightBox iframe" href="https://www.youtube.com/embed/EEm3zBtDwrE" title="Des conseillers de voyage proches du terrain">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/Labourage1-495x400.jpg" alt="Des conseillers de voyage proches du terrain">
                        <span class="bgPlay"><img src="//asia-soleil-travel.com/wp-content/uploads/2017/10/icon_play.png" alt="Play"></span>
                    </a>
                    <h4>
                        <a class="lightBox iframe" href="https://www.youtube.com/embed/EEm3zBtDwrE" title="Des conseillers de voyage proches du terrain">
                            Des conseillers de voyage proches du terrain
                        </a>
                    </h4>
                </div>
                <div class="item">
                    <a class="lightBox" href="https://www.youtube.com/embed/GtwiS73eNqc" title="ASIA SOLEIL TRAVELC’EST QUI ET QUOI ?">
                        <img src="https://asia-soleil-travel.com/wp-content/uploads/2017/10/ASIA-SOLEIL-TRAVEL-CEST-QUI-ET-QUOI-495x400.jpg" alt="ASIA SOLEIL TRAVELC’EST QUI ET QUOI ?">
                        <span class="bgPlay"><img src="//asia-soleil-travel.com/wp-content/uploads/2017/10/icon_play.png" alt="Play"></span>
                    </a>
                    <h4>
                        <a class="lightBox iframe" href="https://www.youtube.com/embed/GtwiS73eNqc" title="ASIA SOLEIL TRAVELC’EST QUI ET QUOI ?">
                            ASIA SOLEIL TRAVELC’EST QUI ET QUOI ?
                        </a>
                    </h4>
                </div>
                <div class="item">
                    <a class="lightBox iframe" href="https://www.youtube.com/embed/LreJAGHyweU" title="UNE JOURNÉE D’EXPÉRIENCE AVEC NOTRE GUIDE LOCAL">
                        <img src="https://asia-soleil-travel.com/wp-content/uploads/2017/10/Circuit-hors-des-sentiers-bauttus-495x400.jpg" alt="UNE JOURNÉE D’EXPÉRIENCE AVEC NOTRE GUIDE LOCAL">
                        <span class="bgPlay"><img src="//asia-soleil-travel.com/wp-content/uploads/2017/10/icon_play.png" alt="Play"></span>
                    </a>
                    <h4>
                        <a class="lightBox" href="https://www.youtube.com/embed/LreJAGHyweU" title="UNE JOURNÉE D’EXPÉRIENCE AVEC NOTRE GUIDE LOCAL">
                            UNE JOURNÉE D’EXPÉRIENCE AVEC NOTRE GUIDE LOCAL
                        </a>
                    </h4>
                </div>
            </div>
            <div class="textRight"><a href="//www.youtube.com/channel/UC1IPRVri-Bbmyij3_vXCWyw/videos?shelf_id=0&view=0&sort=dd" class="see_more" title="Toutes les vidéos">Toutes les vidéos</a></div>
        </div>
    </div>
    <div class="listLink">
        <div class="grid-container">
            <div class="topLink">
                <div class="item">
                    <a href="<?php echo get_permalink(13210)?>" title="MOT DU FONDATEUR"><img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/directeur-asia-soleil-travel-180x180.jpg" alt="MOT DU FONDATEUR"></a>
                    <h4><a href="<?php echo get_permalink(13210)?>" title="MOT DU FONDATEUR">MOT DU FONDATEUR</a></h4>
                </div>
            </div>
            <div class="linkMain displayFlex">
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13218)?>" title="Notre équipe">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/Notre-equipe-180x180.jpg" alt="Notre équipe">
                    </a>
                    <h4><a href="<?php echo get_permalink(13218)?>" title="Notre équipe">Notre équipe</a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13222)?>" title="Nos bureaux">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/Bureaux-1-180x180.jpg" alt="Nos bureaux">
                    </a>
                    <h4><a href="<?php echo get_permalink(13222)?>" title="Nos bureaux">Nos bureaux</a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13243)?>" title="NOS EXPLORATEURS ET NOS GUIDES">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/IMG_0683-180x180.jpg" alt="NOS EXPLORATEURS ET NOS GUIDES">
                    </a>
                    <h4><a href="<?php echo get_permalink(13243)?>" title="NOS EXPLORATEURS ET NOS GUIDES">NOS EXPLORATEURS ET NOS GUIDES</a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13251)?>" title="VOYAGE RESPONSABLE">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/08/tourisme-solidaire-vietnam-180x180.jpg" alt="NOS EXPLORATEURS ET NOS GUIDES">
                    </a>
                    <h4><a href="<?php echo get_permalink(13251)?>" title="VOYAGE RESPONSABLE">VOYAGE RESPONSABLE</a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(1904)?>" title="Galerie entre nous">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/10/Boittier-SophieJPG01-x-180x180.jpg" alt="Galerie entre nous">
                    </a>
                    <h4><a href="<?php echo get_permalink(1904)?>" title="Galerie entre nous">Galerie entre nous</a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13255)?>" title="10 BONNES RAISONS POUR PARTIR AVEC AST">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/Raison1-180x180.jpg" alt="10 BONNES RAISONS POUR PARTIR AVEC AST">
                    </a>
                    <h4><a href="<?php echo get_permalink(13255)?>" title="10 BONNES RAISONS POUR PARTIR AVEC AST">10 BONNES RAISONS POUR PARTIR AVEC AST</a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(174)?>" title="ILS NOUS ONT FAIT CONFIANCE">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/Raison6-180x180.jpg" alt="ILS NOUS ONT FAIT CONFIANCE">
                    </a>
                    <h4><a href="<?php echo get_permalink(174)?>" title="ILS NOUS ONT FAIT CONFIANCE">ILS NOUS ONT FAIT CONFIANCE</a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13260)?>" title="Notre modalité & Condition">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/Raison4-180x180.jpg" alt="Notre modalité & Condition">
                    </a>
                    <h4><a href="<?php echo get_permalink(13260)?>" title="Notre modalité & Condition">Notre modalité & Condition</a></h4>
                    </div>
                </div>
                <div class="item displayFlex alignCenter">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13263)?>" title="Thai Binh Garden, Propriété d’ASIA SOLEIL TRAVEL">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/06/Thai-Binh-Garden-180x180.jpg" alt="Thai Binh Garden, Propriété d’ASIA SOLEIL TRAVEL">
                    </a>
                    <h4><a href="<?php echo get_permalink(13263)?>" title="Thai Binh Garden, Propriété d’ASIA SOLEIL TRAVEL">Thai Binh Garden, Propriété d’ASIA SOLEIL TRAVEL</a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13268)?>" title="Notre partenaire en France ">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/Partenaire-180x180.jpg" alt="Notre partenaire en France ">
                    </a>
                    <h4><a href="<?php echo get_permalink(13268)?>" title="Notre partenaire en France ">Notre partenaire en France </a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13272)?>" title="Salon du tourisme à Paris">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/salontourisme-paris-180x180.jpg" alt="Salon du tourisme à Paris">
                    </a>
                    <h4><a href="<?php echo get_permalink(13272)?>" title="Salon du tourisme à Paris">Salon du tourisme à Paris</a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(13270)?>" title="LES AVANTAGES AVEC UNE AGENCE LOCALE ">
                        <img src="//asia-soleil-travel.com/wp-content/uploads/2017/05/IMG_0680-180x180.jpg" alt="LES AVANTAGES AVEC UNE AGENCE LOCALE ">
                    </a>
                    <h4><a href="<?php echo get_permalink(13270)?>" title="LES AVANTAGES AVEC UNE AGENCE LOCALE ">LES AVANTAGES AVEC UNE AGENCE LOCALE </a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(6611)?>" title="NOS QUATRE GARANTIES ">
                        <img src="https://asia-soleil-travel.com/wp-content/uploads/2017/05/IMG_9861-180x180.jpg" alt="NOS QUATRE GARANTIES ">
                    </a>
                    <h4><a href="<?php echo get_permalink(6611)?>" title="NOS QUATRE GARANTIES ">NOS QUATRE GARANTIES </a></h4>
                    </div>
                </div>
                <div class="item">
                    <div class="content displayFlex alignCenter">
                    <a href="<?php echo get_permalink(6613)?>" title="SUCCÈS AUPRÈS DES PRESCRIPTEURS RESPECTÉS ">
                        <img src="https://asia-soleil-travel.com/wp-content/uploads/2017/05/IMG_0639-180x180.jpg" alt="SUCCÈS AUPRÈS DES PRESCRIPTEURS RESPECTÉS ">
                    </a>
                    <h4><a href="<?php echo get_permalink(6613)?>" title="SUCCÈS AUPRÈS DES PRESCRIPTEURS RESPECTÉS ">SUCCÈS AUPRÈS DES PRESCRIPTEURS RESPECTÉS </a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div id="back">
            <a href="#" title="AUTRES FORMULES"><i class="fa fa-chevron-circle-left"></i>
                <span><?php _e('AUTRES FORMULES', 'wz') ?></span></a>
        </div>
    </div>
        </div>
    </div>
<?php endwhile; ?>
<?php
get_footer();
