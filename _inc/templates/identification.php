<link rel="stylesheet" href="./static/css/identification.css" />
<div id="identification">
    <form id="inscription" class="formulaire-identification" action="./identification.php" method="POST">
        <h2>Inscription</h2>
        <input type="text" id="inscription-input" name="inscription-input" value="inscription" hidden>
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
        <br>
        <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        <br>
        <button class="slide-line envoyer-formulaire" type="submit">S'inscrire</button>
        <p>Vous avez déjà un compte ? <a href="#" onclick="afficherConnexion()">Connectez-vous</a></p>
    </form>
    <form id="connexion" class="formulaire-identification" action="./identification.php" method="POST">
        <h2>Connexion</h2>
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
        <br>
        <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        <br>
        <button class="slide-line envoyer-formulaire" type="submit">Se connecter</button>
        <p>Vous n'avez pas de compte ? <a href="#" onclick="afficherInscription()">Inscrivez-vous</a></p>
    </form>
</div>

<script>

    var inscription = document.getElementById("inscription");
    var connexion = document.getElementById("connexion");

    function afficherInscription() {
        inscription.style.display = "block";
        connexion.style.display = "none";
    }

    function afficherConnexion() {
        inscription.style.display = "none";
        connexion.style.display = "block";
    }
    
    afficherConnexion();

</script>