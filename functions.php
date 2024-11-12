<?php
// Chargement des styles du thème
function mon_theme_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');

// Configuration du thème
function mon_theme_setup() {
    // Support du logo personnalisé
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Activation des miniatures d'articles
    add_theme_support('post-thumbnails');

    // Enregistrement du menu
    register_nav_menus(array(
        'header-menu' => __('Menu Principal', 'mon-theme'),
    ));
}
add_action('after_setup_theme', 'mon_theme_setup');
