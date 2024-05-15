<?php
// Inclure les fichiers nécessaires
include 'utills.php';
include "db_conn.php";

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Vérifier si un fichier a été téléchargé
    if (empty($_FILES['my_video']['size'])) {
        // Rediriger l'utilisateur vers la page d'accueil avec un message d'erreur
        $em = "Aucun fichier sélectionné";
        header("Location: ../front/index.php?error=$em");
        die;
    }

    // Récupérer les informations du fichier téléchargé
    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];

//    // Afficher le nom du fichier
//    var_dump($video_name);

//    // Si une erreur s'est produite lors du téléchargement du fichier, afficher l'erreur et arrêter l'exécution du script
//    if ($error){
//        var_dump($error);
//        die;
//    }

    // Si aucune erreur ne s'est produite lors du téléchargement du fichier
    if ($error === 0) {
        // Récupérer l'extension du fichier
        $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);
        $video_ex_lc = strtolower($video_ex);

        // Définir les extensions de fichier autorisées
        $allowed_exs = array("mp4", 'webm', 'flv');

        // Vérifier si l'extension du fichier est autorisée
        if (in_array($video_ex_lc, $allowed_exs)) {
            // Générer un identifiant unique pour le fichier
            $id = uuidv4();
            // Définir le chemin d'upload du fichier
            $video_upload_path = '../uploads/' . $id . '.' . $video_ex_lc;
            // Déplacer le fichier téléchargé vers le chemin d'upload
            move_uploaded_file($tmp_name, $video_upload_path);

            // Insérer les informations du fichier dans la base de données
            $sql = "INSERT INTO upload_video (`id`, `like`, `date_creation`, `extension`) VALUES ('$id', 0, NOW(), '$video_ex_lc')";
            $conn->exec($sql);

            // Rediriger l'utilisateur vers la page d'accueil
            header("Location: ../front/index.php");
        } else {
            // Si l'extension du fichier n'est pas autorisée, rediriger l'utilisateur vers la page d'accueil avec un message d'erreur
            $em = "You can't upload files of this type";
            header("Location: ../front/index.php?error=$em");
        }
    }
}