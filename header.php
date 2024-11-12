<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Navbar -->
    <nav class="navbar" role="navigation" aria-label="Menu principal">
        <div class="logo">
            <?php the_custom_logo(); ?>
        </div>

        <!-- Menu de navigation -->
        <?php
        wp_nav_menu(array(
            'theme_location' => 'header-menu', // Identifiant du menu
            'container' => false,
            'menu_class' => 'menuDesktop',
            'fallback_cb' => false, // Empêche l'affichage d'un menu par défaut si le menu n'est pas configuré
        ));
        ?>
    </nav>

    <!-- Header -->
    <header id="main-header">
        <h1>PHOTOGRAPHE EVENT</h1>
    </header>

    <!-- JavaScript pour afficher/fermer la modale -->

    <?php wp_footer(); ?>
</body>
</html>

