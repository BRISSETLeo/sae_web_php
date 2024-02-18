<!DOCTYPE html>
<html>
<head>
    <title>My Site</title>
    <link rel="stylesheet" href="_inc/static/css/default.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header id="default-header">
        <h1 id="logo-h1"><a href="./">iuT'Unes</a></h1>
        <div id="identification">
            <?php 
            use classes\DataLoaderSQLite;
            $dl = new DataLoaderSQLite();
            if(isset($_SESSION['user'])) {
                echo "
                    <button onclick='afficherMenu()' id='button-profil'><span id='lettre-profil'>".$_SESSION['user'][0]."</span></button>
                    <div id='popupMenu'>
                        ";
                if($dl->isAdminRole($_SESSION['user'])){
                    echo "<a href='?page=creerAlbum'>Ajouter un album</a></li>";
                    echo "<a href='?page=creerMusique'>Ajouter une musique</a></li>";
                    echo "<a href='?page=creerBand'>Ajouter un artiste/groupe</a></li>";
                }
                echo "
                        <a href='?page=deconnexion'>Déconnexion</a></li>
                    </div>
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
    
    
    <?php if(isset($playlist)) echo $playlist; ?>
    <main id="default-main" class="default-main">
        <?php echo $content; ?>
    </main>

    <script src="_inc/static/js/default.js"></script>
</body>
</html>