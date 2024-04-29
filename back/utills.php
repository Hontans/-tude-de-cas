<?php

// Fonction pour générer un identifiant unique de version 4
function uuidv4($data = null) {

    // Si aucune donnée n'est fournie, générer 16 octets aléatoires
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Modifier certains bits de certains octets pour indiquer que c'est un identifiant de version 4
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Retourner l'identifiant sous forme de chaîne hexadécimale
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}