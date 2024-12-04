// Modale de contact
document.addEventListener('DOMContentLoaded', function () {
    console.log('Le script est chargé et prêt !');

    // Récupérer les éléments nécessaires
    const modal = document.getElementById("contact-modal");
    const closeButton = document.querySelector(".close");
    const contactLinks = document.querySelectorAll('.open-modal'); // Gérer plusieurs liens

    // Vérifier si la modale existe avant de manipuler
    if (modal) {
        // Ouvrir la modale lorsque le lien "Contact" est cliqué
        contactLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                // modal.style.display = "block";
                modal.classList.remove('hidden')

                // Donner le focus au premier champ de la modale
                const firstFocusableElement = modal.querySelector('input, button, textarea');
                if (firstFocusableElement) {
                    firstFocusableElement.focus();
                }
            });
        });

        // Fermer la modale lorsque l'utilisateur clique sur <span> (x)
        if (closeButton) {
            closeButton.addEventListener('click', function () {
                modal.style.display = "none";
            });
        }

        // Fermer la modale lorsque l'utilisateur clique à l'extérieur
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    } else {
        console.warn('Modale introuvable dans le DOM.');
    }

    // Pagination infinie avec Ajax
    const loadMoreButton = document.getElementById('load-more');
    let page = 2;

    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function () {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/wp-admin/admin-ajax.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const photoList = document.getElementById('photo-list');
                    if (photoList) {
                        photoList.innerHTML += xhr.responseText;
                        page++;
                    } else {
                        console.error('Élément #photo-list introuvable.');
                    }
                } else {
                    console.error('Erreur lors du chargement des photos :', xhr.statusText);
                }
            };

            xhr.onerror = function () {
                console.error('Une erreur réseau s\'est produite.');
            };

            xhr.send('action=load_more_photos&page=' + page);
        });
    } else {
        console.warn('Bouton #load-more introuvable dans le DOM.');
    }
});

