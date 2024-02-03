<?php

use classes\dataloadersqlite;
$sqlite = new dataloadersqlite();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Yfitops</title>
    <link rel="stylesheet" href="static/css/template.css">
    <link rel="stylesheet" href="static/css/accueil.css">
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
                <a href="#">Playlists</a>
                <img class="plus" src="static/images/plus.png" alt="+">
                <img class="fleche-droite" src="static/images/fleche-droite.png" alt="fleche vers la droite">
            </div>
        </div>
    </div>
    <main id="main">
        <header>
            <div class="header-buttons">
                <a href="?action=inscription" class="inscription">S'inscrire</a>
                <a href="?action=connexion" class="connexion">Se connecter</a>
            </div>
        </header>
        <div> <?php echo $content; ?></div>
    </main>
</body>
<script src="static/js/accueil.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>