<?php

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Yfitops</title>
    <link rel="stylesheet" href="static/css/template.css">
</head>
<body>
    <div id="menu-gauche">
        <div id="menu-haut">
            <div class="logo">
                <img src="static/images/diamond.png" alt="Logo">
                <a href="./" target="_blank">iuT'Unes</a>
            </div>
            <div class="accueil">
                <img src="static/images/accueil.png" alt="Maison">
                <a href="./">Accueil</a>
            </div>
            <div class="recherche">
                <img src="static/images/rechercher.png" alt="loupe">
                <a href="#">Recherche</a>
            </div>
        </div>
        <div id="menu-corps">
            <div class="playlist">
                <img src="static/images/playlist.png" alt="playlist">
                <p class="lien-playlist">Playlists</p>
                <img class="plus" src="static/images/plus.png" alt="+">
                <img class="fleche" src="static/images/left-chevron.png" alt="fleche">
            </div>
            <?php
                if (!isset($_SESSION['pseudo']) || !$dataLoaderSQLite->userHasPlayList($_SESSION['pseudo'])) {
                    echo "<div class='creer-playlist'>";
                        echo "<p class='playlist-ligne-un'>Créez votre première playlist</p>";
                        echo "<p class='playlist-ligne-deux'>C'est simple, nous allons vous aider</p>";
                        echo "<a href='?action=connexion' class='btn-creer-playlist'>Créer une playlist</a>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    <main id="main">
        <header>
            <div id="header-buttons">
                <?php 
                    if(isset($_SESSION['pseudo'])){
                        echo "<button id='button-profil'><span id='lettre-profil'>".$_SESSION['pseudo'][0]."</span></button>";
                        echo "<div id='popupMenu'>";
                            echo "<ul>";
                                echo "<li><a href='?action=deconnexion'>Se déconnecter</a></li>";
                            echo "</ul>";
                        echo "</div>";
                        echo '<script src="static/js/connecter.js"></script>';
                    }else{
                        echo "<a href='?action=inscription' class='inscription'>S'inscrire</a>";
                        echo "<a href='?action=connexion' class='connexion'>Se connecter</a>";
                    }
                ?>
            </div>
        </header>
        <div id ="main-container"> <?php echo $content; ?></div>
    </main>
</body>
<!--<script src="./static/js/lancer_video.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="static/js/accueil.js"></script>
</html>

<!-- <video controls id="videoPlayer" class="hidden" width="640" height="30">
Your browser does not support the video tag.
</video> -->