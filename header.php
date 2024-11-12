<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <navbar>
        <!-- Logo personnalisé -->
        <div class="logo">
            <?php the_custom_logo(); ?>
        </div>

        <!-- Menu de navigation -->
        <nav class="menu" role="navigation">
            <?php
            // Affichage du menu
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => false,
                'menu_class' => 'menuDesktop'
            ));
            ?>
        </nav>
    </navbar>
<!-- Header avec le texte "PHOTOGRAPHE EVENT" -->
<header id="main-header">
        <h1>PHOTOGRAPHE EVENT</h1>
    </header>
    
    <?php if (is_page(13)) : ?>
        <!-- Structure de la modale -->
        <div id="contactModal" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
            <div class="modal-content">
                <span id="closeModal" class="close-btn" aria-label="Fermer">&times;</span>
                <img src="<?php echo get_template_directory_uri(); ?>/img/contact_header.png" alt="Image pour la modal de contact">
                <?php echo do_shortcode('[wpforms id="48"]'); ?>
            </div>
        </div> <!-- Fermeture de la div pour #contactModal -->
    <?php endif; ?>

    <?php wp_footer(); ?>
</body>

</html>
