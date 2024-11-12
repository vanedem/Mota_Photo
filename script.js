document.addEventListener('DOMContentLoaded', function () {
    const openModalBtn = document.getElementById('openContactModal'); // Bouton pour ouvrir la modale
    const modal = document.getElementById('contactModal'); // La modale elle-même
    const closeModal = document.getElementById('closeModal'); // Sélectionner par id

    // Ouvrir la modale
    openModalBtn.addEventListener('click', function () {
        modal.classList.add('show'); // Affiche la modale avec animation
    });

    // Fermer la pop-up en cliquant sur le bouton de fermeture
    closeModal.addEventListener('click', function() {
        modal.classList.remove('show'); // Masque la modale
    });

    // Fermer la pop-up en cliquant en dehors du contenu de la pop-up
    modal.addEventListener('click', function(event) {
        if (event.target === modal) { // Vérifie que le clic est bien sur l'overlay de la modale
            modal.classList.remove('show'); // Masque la modale
        }
    });
});
