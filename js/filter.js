jQuery(document).ready(function ($) {
    function fetchPhotos() {
        const category = $('#filter-category').val();
        const format = $('#filter-format').val();
        const sortOrder = $('#sort-order').val();

        // Envoi de la requête Ajax
        $.ajax({
            url: ajaxurl, // Défini automatiquement par WordPress
            type: 'POST',
            data: {
                action: 'filter_photos', // Nom de l'action
                category: category,
                format: format,
                sort_order: sortOrder,
            },
            beforeSend: function () {
                $('#photo-list').html('<p>Chargement...</p>'); // Message temporaire
            },
            success: function (response) {
                $('#photo-list').html(response); // Affiche les photos
            },
            error: function () {
                $('#photo-list').html('<p>Une erreur est survenue.</p>');
            },
        });
    }

    // Déclencher la recherche lorsqu'un filtre change
    $('#filter-category, #filter-format, #sort-order').change(fetchPhotos);

    // Charger les photos initialement
    fetchPhotos();
});
