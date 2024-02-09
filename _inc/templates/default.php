<!DOCTYPE html>
<html>
<head>
    <title>My Site</title>
    <link rel="stylesheet" href="_inc/static/css/default.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header id="default-header">
        <h1><a href="./">iuT'Unes</a></h1>
        <div id="identification">
            <?php 
            if(isset($_SESSION['user'])) {
                echo "
                    <button id='button-profil'><span id='lettre-profil'>".$_SESSION['user'][0]."</span></button>
                    <div id='popupMenu'>
                        <a onclick='afficherCreationPlaylist()'>Playlist</a></li>
                        <a href='?page=deconnexion'>Déconnexion</a></li>
                    </div>
                    <script src='./_inc/static/js/mainMenu.js'></script>
                ";
            } else {
                echo '<div id="inscription-container">
                    <a href="?page=inscription" id="inscription">S\'inscrire</a>
                </div>
                <div id="connexion-container">
                    <a href="?page=connexion" id="connexion">Se connecter</a>
                </div>';
            }
            ?>
        </div>
    </header>
    <main id="default-main">
        <?php echo $content; ?>
    </main>
    <script src="_inc/static/js/default.js"></script>
</body>
</html>