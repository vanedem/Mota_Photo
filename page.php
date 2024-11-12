<?php
/**
 * Le modèle pour afficher un article individuel
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mota
 */

get_header(); ?>

<!-- Début de la boucle -->
<?php while ( have_posts() ) : the_post(); ?>

    <!-- Inclusion du contenu de la page ou de l'article -->
    <?php get_template_part( 'template-parts/content/content-single' ); ?>

    <?php
    // Si les commentaires sont ouverts ou s'il y a des commentaires, charger le template des commentaires
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>

<?php endwhile; // Fin de la boucle ?>

<?php get_footer(); ?>
