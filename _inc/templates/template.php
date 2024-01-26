<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Yfitops</title>
    <link rel="stylesheet" href="./static/css/template.css">
</head>
<body>
    <header id="header">
        <div id="recherche">
            <h1><a href="./index.php">Yfitops</a></h1>
            <input type="text" placeholder="Rechercher...">
        </div>
        <div id="menu">
            <nav>
                <ul>
                    <li><a class="slide-line" href="#">Albums</a></li>
                    <li><a class="slide-line" href="#">Musiques</a></li>
                    <li><a class="slide-line" href="#">Artistes</a></li>
                    <li>
                        <?php 
                        if(!empty($_SESSION['pseudo'])){
                            echo '<a class="slide-line" href="./deconnexion.php">Déconnexion</a>';
                        }else{
                            echo '<a class="slide-line" href="./identification.php">Connexion</a>';
                        }
                        ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main id="main">
        <?php echo $content; ?>
    </main>
    <footer>
        <div id="footer">
            <div id="droit">
                <p>Yfitops &copy; 2024 - Tous droits réservés</p>
            </div>
            <div id="createur">
                <p>BRISSET Léo</p>
                <p>SEVELLEC Maxime</p>
                <p>OZOCAK Ibrahim</p>
            </div>
        </div>
    </footer>
</body>
</html>