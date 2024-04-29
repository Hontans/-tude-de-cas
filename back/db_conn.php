<?php

$name = "localhost";
$username = "root";
$password = "";
$db_name = "sylclip";
try {
    $conn = new PDO("mysql:host=$name;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Operation failed:" . $e->getMessage();
}