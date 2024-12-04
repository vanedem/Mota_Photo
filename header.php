<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nathalie Mota - Photographe Freelance</title>
    <meta name="description" content="Site Photographe Freelance">
    <meta name="keywords" content="Photo Event">
    <meta name="author" content="Nathalie Mota">

    <!-- Fichiers CSS ici -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;,">

    <?php wp_head(); ?>
</head>

<body>
    <!-- Section d'en-tête -->
    <div class="container-header">
        <!-- Logo de l'en-tête -->
        <div class="header-logo">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            if ($custom_logo_id) {
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo esc_url($logo[0]); ?>" alt="Logo">
                </a>
            <?php } else { ?>
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Logo_Mota.png" alt="Logo">
                </a>
            <?php } ?>
        </div>

        <!-- Menu de l'en-tête -->
        <nav class="header-menu">
            <?php
            wp_nav_menu([
                'theme_location' => 'header-menu', // Assurez-vous d'enregistrer cette position dans votre functions.php
                'container'       => false,         // Aucun conteneur autour du menu
                'menu_class'      => 'header-menu', // Classe CSS du menu
            ]);
            ?>
        </nav>
        <!-- Bouton | Menu Mobile -->
        <div class="mobile-menu-button" id="open-fullscreen-menu-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>

    <?php wp_footer(); ?>

</body>

</html>