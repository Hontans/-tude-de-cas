<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sylclip</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

        <nav class="header__nav">
            <ul class="header__nav__ul">
                <li class="header__nav__ul__li">
                    <a class="header__nav__ul__li__a" href="#">Sylclip</a>
                </li>
            </ul>
        </nav>
        <button class="header__button">Commander en Ligne</button>
    </header>

    <main class="main">
        <p class="main__p">Slyclip est site qui vise à maitre en aven vau clip
            vidéo et extrait de vau moment les plus drôles.</p>
        <a class="main__a" href="view.php">UPLOAD</a>
        <?php if (isset($_GET['error'])) { ?>
        <p><?=$_GET['error']?></p>
        <?php } ?>
        
        <div class="main__container_of_cloud">
            <div class="main__container_of_cloud__video_area">
                <i class='bx bxs-cloud-upload icon'></i>
                <h1 class="main__container_of_cloud__video_area__h1">Poster ma video</h1>
                <p class="main__container_of_cloud__video_area__p">Video trop grose <span class="main__container_of_cloud__video_area__p__span">1G</span></p>
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