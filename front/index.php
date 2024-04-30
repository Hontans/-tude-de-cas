<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sylclip</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.1.5/build/spline-viewer.js"></script>
    <script defer src="./main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
</head>
<body>

<div class="container_mais_pas_de_tailwind">

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

            <h1 data-text="Sylclip" class="header__h1">Sylclip</h1>

        <a href="#cloud" class="header__button">Poster une video</a>
    </header>

    <main class="main">

        <p class="main__p">Slyclip est un site qui vise à mettre en avant vos clips<br> vidéo et extraits des moments les plus drôles.</p>

        <div id="carousel">
            

            <button class="btn_next">
                <img src="images/next.svg" alt="next">
            </button>

            <div class="item">
                <?php
                include "../back/db_conn.php";
                $sql = "SELECT * FROM upload_video ORDER BY `like` DESC LIMIT 20";
                $stmt = $conn->query($sql);

                if ($stmt->rowCount() > 0) {
                    while ($video = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <video src="../uploads/<?=$video['id'] . '.' . $video['extension']?>"
                               controls>

                        </video>

                        <?php
                    }
                }
                ?>
            </div>

            <button class="btn_back">
                <img src="images/back.svg" alt="back">
            </button>

        </div>
            
        <?php if (isset($_GET['error'])) { ?>
        <p><?=$_GET['error']?></p>
        <?php } ?>

        <div class="main__container_of_cloud" id="cloud">
            <div class="main__container_of_cloud__video_area">
                <h1 class="main__container_of_cloud__video_area__h1">Poster ma video</h1>
                <form class="main__container_of_cloud__video_area__form" action="../back/upload.php" method="post" enctype="multipart/form-data">
                    <div>
<!--                        <label class="main__container_of_cloud__video_area__label" for="video_uploads">Sélectionne ta video</label>-->
                        <input type="file" id="video_uploads" name="my_video"/>
                    </div>
<!--                    <p class="main__container_of_cloud__video_area__form__preview__p">Aucun fichier sélectionné pour le moment</p>-->
                    <button class="main__container_of_cloud__video_area__form__submit" type="submit" name="submit" value="Upload">Envoyer</button>
                </form>
            </div>
        </div>
    </main>

</div>
</body>
</html>