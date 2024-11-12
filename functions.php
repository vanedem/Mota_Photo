<?php
// Chargement des styles du thème
function mon_theme_enqueue_styles() {
    // Charge le fichier CSS principal
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

// Enregistrer et charger le fichier JavaScript
function my_theme_scripts() {
    // Charger le fichier JavaScript principal
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');
