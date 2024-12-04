<?php
get_header();
?>

<!-- Section | Image d'en-tête (Hero Image) -->
<div class="hero">
    <?php
    $args_related_photos = array(
        'post_type' => 'mota-photos',
        'posts_per_page' => 1,
        'orderby' => 'rand',
    );

    $related_photos_query = new WP_Query($args_related_photos);

    while ($related_photos_query->have_posts()) :
        $related_photos_query->the_post();
        $post_permalink = get_permalink();
        $thumbnail_url = get_the_post_thumbnail_url();
        if (!$thumbnail_url) {
            $thumbnail_url = esc_url(get_template_directory_uri() . '/assets/fallback-hero.png');
        }
    ?>
    <a href="<?php echo esc_url($post_permalink); ?>">
        <div class="hero-image" style="background-image: url('<?php echo $thumbnail_url; ?>');">
            <h1 class="hero-title">PHOTOGRAPHE EVENTS</h1>
        </div>
    </a>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>

<main>
<?php    
include_once('template-parts/filter.php'); ?>
    <!-- Section | Galerie de photos -->
    <section id="photo-list" class="gallery custom-size">
        <?php
        $args = [
            'post_type' => 'mota-photos',
            'posts_per_page' => 8,
        ];
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                <div class="thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        } else {
                            // Utiliser une image de fallback si aucune vignette n'est disponible
                            echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/fallback.png') . '" alt="Image par défaut">';
                        }
                        ?>
                    </a>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo '<p>Aucune photo disponible pour le moment.</p>';
        }
        ?>
    </section>

    <!-- Bouton de pagination infinie -->
    <?php if ($query->found_posts > 8): ?>
    <div id="load-more-container">
        <button id="load-more">Charger plus</button>
    </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
