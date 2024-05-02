<?php

// Définir les informations de connexion à la base de données
$name = "localhost";
$username = "root";
$password = "root";
$db_name = "main";

// Essayer de se connecter à la base de données
try {
    $conn = new PDO("mysql:host=$name;dbname=$db_name", $username, $password);
    // Définir le mode d'erreur PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Si la connexion échoue, afficher le message d'erreur
    echo "Operation failed:" . $e->getMessage();
}