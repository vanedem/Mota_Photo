<?php get_header(); ?>

<main class="single-photo">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="photo-header">
                <h1><?php the_title(); ?></h1>
            </header>
            <div class="photo-content">
                <?php the_post_thumbnail('large', ['class' => 'photo-image']); ?>
                <div class="photo-details">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="photo-meta">
                <p><strong>Catégorie :</strong> <?php echo get_the_term_list(get_the_ID(), 'category', '', ', '); ?></p>
                <p><strong>Photographe :</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'photographe', true)); ?></p>
            </div>
            <button id="contact-popup" data-photo-id="<?php the_ID(); ?>">Contact</button>

            <nav class="photo-navigation">
                <div class="nav-previous"><?php previous_post_link('%link', '&larr; Précédent'); ?></div>
                <div class="nav-next"><?php next_post_link('%link', 'Suivant &rarr;'); ?></div>
            </nav>

            <div class="related-photos">
                <h2>Photos apparentées</h2>
                <div class="photo-list">
                    <?php
                    $categories = wp_get_post_terms(get_the_ID(), 'category', ['fields' => 'ids']);
                    $related_query = new WP_Query([
                        'post_type' => 'mota-photos',
                        'posts_per_page' => 4,
                        'post__not_in' => [get_the_ID()],
                        'tax_query' => [
                            [
                                'taxonomy' => 'category',
                                'terms' => $categories,
                            ],
                        ],
                    ]);

                    if ($related_query->have_posts()) :
                        while ($related_query->have_posts()) : $related_query->the_post();
                            get_template_part('template_parts/photo_block');
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>