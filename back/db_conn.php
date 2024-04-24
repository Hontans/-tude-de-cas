
<?php

$sql = "SELECT * FROM videos";

    $sname = "localhost";
    $uname = "root";
    $password = "";

    $db_name = "main";

    try {
        $conn = new PDO("mysql:host=$sname;dbname=$db_name", $uname, $password);

        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Column 'publication_date' added successfully";
    } catch(PDOException $e) {
        echo "Operation failed: " . $e->getMessage();
}