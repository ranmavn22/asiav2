<?php

$args = array(
    'name'          => __( 'Menu Sites À  Découvrir - Left ' ),
    'id'            => 'menu-sites-dcouvrir-left',    // ID should be LOWERCASE  ! ! !
    'description'   => '',
    'class'         => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' );
register_sidebar( $args );

$args2 = array(
    'name'          => __( 'Menu Sites À  Découvrir - right ' ),
    'id'            => 'menu-sites-dcouvrir-right',    // ID should be LOWERCASE  ! ! !
    'description'   => '',
    'class'         => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' );
register_sidebar( $args2 );