<!-- Section | Filtre par catégories -->
<?php
// Récupération des catégories (taxonomy 'categorie-photo')
$categories = get_terms([
    'taxonomy' => 'categorie-photo',
    'hide_empty' => false, // Afficher toutes les catégories, même vides
]);

// Récupération des formats (taxonomy 'format_photo')
$formats = get_terms([
    'taxonomy' => 'format_photo',
    'hide_empty' => false, // Afficher tous les formats, même vides
]);
?>

<section id="filter-container">
    <!-- Section | Filtre par catégories -->
    <select id="filter-category">
        <option value="">CATÉGORIES</option>
        <?php
        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                echo "<option value='{$category->slug}'>{$category->name}</option>";
            }
        }
        ?>
    </select>

    <!-- Section | Filtre par formats -->
    <select id="filter-format">
        <option value="">FORMATS</option>
        <?php
        if (!empty($formats) && !is_wp_error($formats)) {
            foreach ($formats as $format) {
                echo "<option value='{$format->slug}'>{$format->name}</option>";
            }
        }
        ?>
    </select>

    <!-- Étiquette pour le tri -->
    <div class="right-filters">
        <select id="order">
            <option value="">TRIER PAR</option>
            <option value="date_desc">À partir des plus récentes</option>
            <option value="date_asc">À partir des plus anciennes</option>
        </select>
    </div>

</section>