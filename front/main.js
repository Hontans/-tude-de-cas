// Sélection des éléments nécessaires dans le DOM
const container = document.querySelector('.item');
const btn_next = document.querySelector('.btn_next');
const btn_back = document.querySelector('.btn_back');
const slides = document.querySelector('.item video');
const videos = document.querySelectorAll('.item video');
// Sélectionnez l'élément d'entrée de fichier et le paragraphe
const fileInput = document.getElementById('video_uploads');
const paragraph = document.querySelector('.no');
const paragraph2 = document.querySelector('.yes');


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


// Ajoutez un écouteur d'événements pour l'événement de changement sur l'élément d'entrée de fichier
fileInput.addEventListener('change', function() {
    // Si un fichier est sélectionné
    if (fileInput.files.length > 0) {
        // Cachez le paragraphe1
        paragraph.style.display = 'none';
        paragraph2.style.display = 'block';

    } else {
        // Sinon, affichez le paragraphe2
        paragraph.style.display = 'block';
        paragraph2.style.display = 'none';
    }
});