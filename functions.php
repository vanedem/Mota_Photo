<?php
// Charger la feuille de style et le scripts
function enqueue_theme_scripts() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', [], '1.0.0');
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/js/scripts.js', ['jquery'], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

// Activer les menus
function nathalie_mota_register_menus() {
    register_nav_menus(array(
        'header-menu' => __('Menu Header', 'nathalie_mota'),
        'footer-menu' => __('Menu Footer', 'nathalie_mota'),
    ));
}
add_action('after_setup_theme', 'nathalie_mota_register_menus');

// Fonction pour obtenir une image aléatoire
function get_random_hero_image() {
    $args = [
        'post_type'      => 'mota-photos',
        'posts_per_page' => 1,
        'orderby'        => 'rand',
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        wp_reset_postdata();
        return $image_url;
    }

    wp_reset_postdata();
    return null;
}

// Pagination infinie avec Ajax
function nathalie_mota_load_more_photos() {
    check_ajax_referer('load_more_photos_nonce', 'nonce');

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $args = [
        'post_type'      => 'mota-photos',
        'posts_per_page' => 8,
        'paged'          => $paged,
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <article class="photo-item">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium'); ?>
                    <h2><?php the_title(); ?></h2>
                </a>
            </article>
            <?php
        }
    } else {
        echo '<p>Aucune autre photo à charger.</p>';
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_load_more_photos', 'nathalie_mota_load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'nathalie_mota_load_more_photos');

// Fonction pour récupérer et afficher les photos filtrées
function filter_photos() {
    $category = $_POST['category'] ?? '';
    $format = $_POST['format'] ?? '';
    $sort_order = $_POST['sort_order'] ?? 'date_desc';

    // Arguments de la requête WP_Query
    $args = [
        'post_type' => 'mota-photos',
        'posts_per_page' => -1,
    ];

    // Ajouter les filtres par taxonomies
    $tax_query = [];
    if (!empty($category)) {
        $tax_query[] = [
            'taxonomy' => 'categorie-photo',
            'field' => 'slug',
            'terms' => $category,
        ];
    }
    if (!empty($format)) {
        $tax_query[] = [
            'taxonomy' => 'format_photo',
            'field' => 'slug',
            'terms' => $format,
        ];
    }
    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    // Ajouter le tri
    if ($sort_order === 'date_asc') {
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';
    } elseif ($sort_order === 'date_desc') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    } elseif ($sort_order === 'title_asc') {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    } elseif ($sort_order === 'title_desc') {
        $args['orderby'] = 'title';
        $args['order'] = 'DESC';
    }

    // Requête WP_Query
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="photo-item">';
            the_post_thumbnail('medium');
            echo '<h3>' . get_the_title() . '</h3>';
            echo '</div>';
        }
    } else {
        echo '<p>Aucune photo trouvée.</p>';
    }

    wp_reset_postdata();
    wp_die(); // Nécessaire pour terminer une requête Ajax dans WordPress
}

// Enregistrer les actions Ajax
add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos'); // Pour les utilisateurs non connectés

// Enregistrer et inclure les scripts dans le thème
function enqueue_filter_scripts() {
    wp_enqueue_script('filters', get_template_directory_uri() . '/js/filters.js', ['jquery'], null, true);

    // Passer la variable Ajax à JavaScript
    wp_localize_script('filters', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'enqueue_filter_scripts');
