<?php

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>iuT'Unes</title>
        <link rel="stylesheet" href="./static/css/template.css">
    </head>
    <body>
        <div id="menu-gauche">
            <div id="menu-haut">
                <div class="logo">
                    <a href="#">iuT'Unes</a>
                </div>
                <div class="acceuil">
                    <img src="./static/images/accueil.png" alt="Maison">
                    <a href="#">Accueil</a>
                </div>
                <div class="recherche">
                    <img src="./static/images/rechercher.png" alt="loupe">
                    <a href="#">Recherche</a>
                </div>
            </div>
            <div id="menu-corps">
                <div class="playlist">
                    <img src="./static/images/playlist.png" alt="playlist">
                    <a href="#">Playlist</a>
                    <img class="plus" src="./static/images/plus.png" alt="+">
                    <img class="fleche-droite" src="./static/images/fleche-droite.png" alt="fleche vers la droite">
                </div>
            </div>
        </div>
        <main id="main">
            <header>
                <div class="header-buttons">
                    <a href="#" class="header-button">Inscription</a>
                    <a href="#" class="header-button">Connexion</a>
                </div>
            </header>
            <div> <?php echo $content; ?></div>
        </main>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>