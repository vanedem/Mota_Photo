<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mota
 */

get_header(); ?>

<!-- Début de la boucle -->
<?php while ( have_posts() ) : the_post(); ?>

    <!-- Inclusion du contenu de l'article -->
    <?php get_template_part( 'template-parts/content/content-single' ); ?>

    <?php
    // Si c'est une pièce jointe, afficher la navigation du post parent
    if ( is_attachment() ) :
        the_post_navigation(
            array(
                'prev_text' => sprintf( __( '<span class="meta-nav">Publié dans</span><span class="post-title">%s</span>', 'mota' ), '%title' ),
            )
        );
    endif;

    // Si les commentaires sont ouverts ou si l'article a des commentaires, charger le template des commentaires
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

    // Navigation vers l'article précédent et suivant
    $mota_next = is_rtl() ? mota_get_icon_svg( 'ui', 'arrow_left' ) : mota_get_icon_svg( 'ui', 'arrow_right' );
    $mota_prev = is_rtl() ? mota_get_icon_svg( 'ui', 'arrow_right' ) : mota_get_icon_svg( 'ui', 'arrow_left' );

    $mota_next_label     = esc_html__( 'Article suivant', 'mota' );
    $mota_previous_label = esc_html__( 'Article précédent', 'mota' );

    the_post_navigation(
        array(
            'next_text' => '<p class="meta-nav">' . $mota_next_label . $mota_next . '</p><p class="post-title">%title</p>',
            'prev_text' => '<p class="meta-nav">' . $mota_prev . $mota_previous_label . '</p><p class="post-title">%title</p>',
        )
    );
    ?>

<?php endwhile; // Fin de la boucle ?>

<?php get_footer(); ?>
