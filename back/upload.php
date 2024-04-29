<?php
include 'utills.php';
include "db_conn.php";
if (isset($_POST['submit']) && isset($_FILES['my_video'])) {
    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];
    var_dump($video_name);

    if ($error){
        var_dump($error);
        die;
    }

    if ($error === 0) {
        $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);
        $video_ex_lc = strtolower($video_ex);

        $allowed_exs = array("mp4", 'webm', 'flv');

        if (in_array($video_ex_lc, $allowed_exs)) {
            $id = uuidv4();
            $video_upload_path = '../uploads/' . $id . '.' . $video_ex_lc;
            move_uploaded_file($tmp_name, $video_upload_path);
            $sql = "INSERT INTO upload_video (`id`, `like`, `date_creation`, `extension`) VALUES ('$id', 0, NOW(), '$video_ex_lc')";
            $conn->exec($sql);
            header("Location: ../front/index.php");
        }else {
            $em = "You can't upload files of this type";
            header("Location: ../front/index.php?error=$em");
        }
    }
}