<footer>
    <nav class="footer-menu">
        <?php
        wp_nav_menu([
            'theme_location' => 'footer-menu', // L'emplacement du menu
            'container'       => false,        // Aucun conteneur autour du menu
            'menu_class'      => 'footer-links', // Classe CSS du menu (mise à jour ici)
        ]);
        ?>
    </nav>
</footer>

<?php wp_footer(); ?>
<?php get_template_part('template-parts/modal-contact'); ?>
</body>
</html>