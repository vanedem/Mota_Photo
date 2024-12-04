<!-- Modale de contact -->
<div id="contact-modal" class="modal hidden">
    <div class="modal-content">

        <!-- Image en haut du formulaire -->
        <img src="<?php echo get_template_directory_uri(); ?>/assets/contact_header.png"
            alt="Contactez-nous" class="modal-image">

        <!-- Formulaire -->
        <?php echo do_shortcode('[wpforms id="48"]'); ?>
    </div>
</div>