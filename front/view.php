<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div>

    <header class="header">
        <div class="header__logo">
            <img src="./images/logo.png" alt="logo">
        </div>
            <nav class="header__vav">
                <ul class="header__vav__ul">
                    <li class="header__vav__ul__li"><a href="#">Accueil</a></li>
                    <li class="header__vav__ul__li"><a href="#">Suivi de commande</a></li>
                    <li class="header__vav__ul__li"><a href="#">Contact</a></li>
                </ul>
            </nav>
        <button class="header__button">Commander en Ligne</button>
    </header>

    <main>
        <a href="index.php">UPLOAD</a>
        <div class="alb">
            <?php
            include "../back/db_conn.php";
            $sql = "SELECT * FROM upload_video ORDER BY id ";
            $stmt = $conn->query($sql);

            if ($stmt->rowCount() > 0) {
                while ($video = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <video src="../uploads/<?=$video['video_url']?>"
                        controls>

                    </video>

                    <?php
                }
            }else {
                echo "<h1>Empty</h1>";
            }
            ?>
        </div>

        <div class="container_of_cloud">
            <div class="img_area">
                <i class='bx bxs-cloud-upload icon'></i>
                <h3>Poster ma video</h3>
                <p>Video trop grose <span>1G</span></p>
                <img src="" alt="">
            </div>

            <form action="../back/upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="my_video" class="select_image">
                <input type="submit" name="submit" value="Upload" class="plublier_image">
            </form>

        </div>

    </main>

</div>
</body>
</html>