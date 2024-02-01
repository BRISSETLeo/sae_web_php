<?php

use classes\dataloadersqlite;
$sqlite = new dataloadersqlite();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Yfitops</title>
    <link rel="stylesheet" href="_inc/static/css/template.css">
</head>
<body>
    <div id="menu-gauche">
        <div id="menu-haut">
            <div class="acceuil">
                <img src="_inc/static/images/accueil.png" alt="Maison">
                <a href="#">Accueil</a>
            </div>
            <div class="recherche">
                <img src="_inc/static/images/rechercher.png" alt="loupe">
                <a href="#">Recherche</a>
            </div>
        </div>
        <div id="menu-corps">
            <div class="playlist">
                <img src="_inc/static/images/playlist.png" alt="playlist">
                <a href="#">Playlist</a>
                <img class="plus" src="_inc/static/images/plus.png" alt="+">
                <img class="fleche-droite" src="_inc/static/images/fleche-droite.png" alt="fleche vers la droite">
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
</html>