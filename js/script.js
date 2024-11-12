document.addEventListener('DOMContentLoaded', function () {
    const openModalBtn = document.getElementById('openContactModal'); // Bouton pour ouvrir la modale
    const modal = document.getElementById('contactModal'); // La modale elle-même
    const closeModal = document.getElementById('closeModal'); // Bouton de fermeture

    // Ouvrir la modale
    openModalBtn.addEventListener('click', function (event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        modal.classList.add('show'); // Affiche la modale
    });

    // Fermer la modale en cliquant sur le bouton de fermeture
    closeModal.addEventListener('click', function() {
        modal.classList.remove('show'); // Masque la modale
    });

    // Fermer la modale en cliquant en dehors du contenu de la modale
    modal.addEventListener('click', function(event) {
        if (event.target === modal) { // Vérifie que le clic est bien sur l'overlay de la modale
            modal.classList.remove('show'); // Masque la modale
        }
    });
});