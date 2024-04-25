<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sylclip</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.1.5/build/spline-viewer.js"></script>
</head>
<body>

<div class="container">

    <header class="header">
        <div class="all-in-one_logo">
            <div class="glowing-cricle">
                <span></span>
                <span></span>
                <div class="header__logo">
                    <img src="./images/logo.png" alt="logo">
                </div>
            </div>
        </div>

        <div class="titre">
            <h1 class="header__h1">Sylclip</h1>
        </div>

        <button class="header__button">Poster une video</button>
    </header>

    <main class="main">

        <p class="main__p">Slyclip est un site qui vise à mettre en avant vos clips<br> vidéo et extraits des moments les plus drôles.</p>
        
        <div class="video_view">
            
            <div class="next">
                <button class="btn_next">
                    <img src="images/next.png" alt="next">
                </button>
            </div>
                
            <video id="video" controls>
                <source src="../uploads/test.mp4">
            </video>

            <div class="back">
                <button class="btn_back">
                    <img src="images/back.png" alt="back">
                </button>
            </div>

        </div>
            
        <?php /*if (isset($_GET['error'])) { ?>
        <p><?=$_GET['error']?></p>
        <?php } ?>
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
            }*/
            ?>
        </div>
        <div class="main__container_of_cloud">
            <div class="main__container_of_cloud__video_area">
                <i class='bx bxs-cloud-upload icon'></i>
                <h1 class="main__container_of_cloud__video_area__h1">Poster ma video</h1>
                <form class="main__container_of_cloud__video_area__form" action="../back/upload.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label class="main__container_of_cloud__video_area__label" for="video_uploads">Sélectionne ta video</label>
                        <input type="file" id="video_uploads" name="my_video"/>
                    </div>
                    <div class="main__container_of_cloud__video_area__form__preview">
                        <p class="main__container_of_cloud__video_area__form__preview__p">Aucun fichier sélectionné pour le moment</p>
                    </div>
                    <button class="main__container_of_cloud__video_area__form__submit" type="submit" name="submit" value="Upload">Envoyer</button>
                </form>
            </div>
        </div>
    </main>

</div>
<script src="./js/upload.js"></script>
</body>
</html>