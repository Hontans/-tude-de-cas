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

<div class="wrap"  id="drop-zone">

    <header class="flex justify-between items-center relative">
        <div class="logo">
            <div class="glowing-cricle">
                <span></span>
                <span></span>
                <div class="header-logo">
                    <img src="./images/logo.png" alt="logo">
                </div>
            </div>
        </div>

            <h1 data-text="Sylclip">Sylclip</h1>

        <a href="#cloud" class="header-btn">Poster une video</a>
    </header>

    <main class="main">

        <p>Slyclip est un site qui vise à mettre en avant vos clips<br> vidéo et extraits des moments les plus drôles.</p>

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

        <div class="cloud--wraper" id="cloud">
            <div class="cloud-gb">
                <form class="upload" action="../back/upload.php" method="post" enctype="multipart/form-data" draggable="true">
                    <div class="upload-input">
                        <label for="video_uploads" ><img src="images/cloud.svg" alt="back">Poster ma video</label>
                        <input type="file" id="video_uploads" name="my_video"/>
                    </div>
                    <p class="no">Aucun fichier sélectionné pour le moment</p>
                    <p class="yes">Votre fichier a bien été sélectioner</p>
                    <div class="button-container">
                        <button class="upload-btn left" type="reset">Supprimer</button>
                        <button class="upload-btn right" type="submit" name="submit" value="Upload">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</div>
</body>
</html>