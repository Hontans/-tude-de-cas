// Sélection des éléments nécessaires dans le DOM
const container = document.querySelector('.item');
const btn_next = document.querySelector('.btn_next');
const btn_back = document.querySelector('.btn_back');
const slides = document.querySelector('.item video');
const videos = document.querySelectorAll('.item video');

// Fonction pour arrêter toutes les vidéos
function stopAllVideos() {
    // Parcourir chaque vidéo
    videos.forEach(video => {
        // Mettre en pause la vidéo
        video.pause();
        // Réinitialiser le temps de la vidéo à 0
        video.currentTime = 0;
    });
}

// Ajout d'un écouteur d'événements au bouton suivant
btn_next.addEventListener('click', () => {
    // Arrêter toutes les vidéos
    stopAllVideos();
    // Faire défiler le conteneur vers la droite
    container.scrollLeft += slides.clientWidth;
})

// Ajout d'un écouteur d'événements au bouton précédent
btn_back.addEventListener('click', () => {
    // Arrêter toutes les vidéos
    stopAllVideos();
    // Faire défiler le conteneur vers la gauche
    container.scrollLeft -= slides.clientWidth;
})