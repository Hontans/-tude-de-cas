// Sélection des éléments nécessaires dans le DOM
const conteneur = document.querySelector('.item');
const btn_suivant = document.querySelector('.btn_next');
const btn_precedent = document.querySelector('.btn_back');
const diapositives = document.querySelector('.item video');
const videos = document.querySelectorAll('.item video');
const inputFichier = document.getElementById('video_uploads');
const paragraphe1 = document.querySelector('.no');
const paragraphe2 = document.querySelector('.yes');
const zoneDepot = document.getElementById('drop-zone');
const boutonSupprimer = document.querySelector('.upload-btn.left');

// Fonction pour arrêter toutes les vidéos
function arreterToutesLesVideos() {
    // Parcourir chaque vidéo
    videos.forEach(video => {
        // Mettre en pause la vidéo
        video.pause();
        // Réinitialiser le temps de la vidéo à 0
        video.currentTime = 0;
    });
}

// Ajout d'un écouteur d'événements au bouton suivant
btn_suivant.addEventListener('click', () => {
    // Arrêter toutes les vidéos
    arreterToutesLesVideos();
    // Faire défiler le conteneur vers la droite
    conteneur.scrollLeft += diapositives.clientWidth;
})

// Ajout d'un écouteur d'événements au bouton précédent
btn_precedent.addEventListener('click', () => {
    // Arrêter toutes les vidéos
    arreterToutesLesVideos();
    // Faire défiler le conteneur vers la gauche
    conteneur.scrollLeft -= diapositives.clientWidth;
})

// Ajoutez un écouteur d'événements pour l'événement de changement sur l'élément d'entrée de fichier
inputFichier.addEventListener('change', function() {
    // Si un fichier est sélectionné
    if (inputFichier.files.length > 0) {
        // Cachez le paragraphe1
        paragraphe1.style.display = 'none';
        paragraphe2.style.display = 'block';

    } else {
        // Sinon, affichez le paragraphe2
        paragraphe1.style.display = 'block';
        paragraphe2.style.display = 'none';
    }
});

// Ajoutez un écouteur d'événements pour l'événement de glissement sur la zone de dépôt
zoneDepot.addEventListener('dragover', function(event) {
    // Empêcher le comportement par défaut pour permettre le dépôt
    event.preventDefault();
});

// Ajoutez un écouteur d'événements pour l'événement de dépôt sur la zone de dépôt
zoneDepot.addEventListener('drop', function(event) {
    // Empêcher le comportement par défaut
    event.preventDefault();

    // Obtenir les fichiers de l'événement
    const fichiers = event.dataTransfer.files;

    // Définir les fichiers comme la valeur de l'entrée de fichier
    inputFichier.files = fichiers;

    // Déclencher l'événement de changement
    inputFichier.dispatchEvent(new Event('change'));
});

// Ajoutez un écouteur d'événements pour l'événement click sur le bouton Supprimer
boutonSupprimer.addEventListener('click', function() {
    // Réinitialisez l'élément d'entrée de fichier
    inputFichier.value = '';
    // Réinitialisez le paragraphe
    paragraphe1.style.display = 'block';
    paragraphe2.style.display = 'none';
});