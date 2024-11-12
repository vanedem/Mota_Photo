<?php if (is_page(13)) : ?>
    <!-- Lien pour ouvrir la modale -->
    <a href="#" id="openContactModal">Contact</a>

    <!-- Structure de la modale -->
    <div id="contactModal" class="modal" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-content">
            <!-- Bouton pour fermer la modale -->
            <button id="closeModal" class="close-btn" aria-label="Fermer">&times;</button>

            <!-- Image d'en-tête pour la modale -->
            <img src="<?php echo get_template_directory_uri(); ?>/img/contact_header.png" alt="Image pour la modale de contact">

            <!-- Formulaire de contact -->
            <?php echo do_shortcode('[wpforms id="48"]'); ?>
        </div>
    </div> <!-- Fermeture de la div pour #contactModal -->
<?php endif; ?>