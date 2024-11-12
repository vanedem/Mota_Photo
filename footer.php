<footer>
    <a href="https://votre-lien-mentions-legales.com" target="_blank">Mentions légales</a>
    <a href="https://votre-lien-vie-privee.com" target="_blank">Vie privée</a>
    <a href="https://votre-lien-tous-droits-reserves.com" target="_blank">Tous droits réservés</a>
</footer>

<?php wp_footer(); ?>

<!-- Inclure le script JS -->
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

<!-- Modale de contact -->
<?php get_template_part('template_part/contact-modal'); ?> 

</body>
</html>
