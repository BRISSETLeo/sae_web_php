<?php

if(isset($_SESSION['pseudo'])){
    header('Location: ./');
    exit;
}

?>

<title>Inscription - iuT'Unes</title>
<div id="main-identification-center">
    <div id="identification-container">
        <div id="identification-container-center-2">
            <h1>Je n'ai pas de compte iuT'Unes</h1>   
            <div id="identification">
                <div id="nameuser">
                    <label for="name-user">Nom d'utilisateur</label>
                    <input type="text" id="name-user" name="name-user" placeholder="Nom d'utilisateur"> 
                    <p id="erreur-name-already-used">Ce pseudo est déjà lié à un compte existant. Pour continuer, <a href="?action=connexion">connectez-vous</a>.</p>
                    <p id="erreur-name-not-same">Aucun nom d'utilisateur n'a été renseigné.</p>
                </div>
                <div id="mdp">
                    <label for="mot-de-passe">Mot de passe</label>
                    <input type="password" id="mot-de-passe" name="mot-de-passe" placeholder="Mot de passe">
                    <p id="erreur-mdp-not-same">Aucun mot de passe n'a été renseigné.</p>
                </div>
                <button id="se-identifier">S'inscrire</button>
                <div id="mdp-oublie">
                    <a id="mot-de-passe-oublie" href="#">Mot de passe oublié ?</a>
                </div>
                <p>Vous avez déjà un compte ? <a id="creer-un-compte" href="?action=connexion">J'ai iuT'Unes</a></p>
            </div>
        </div>
    </div>
</div>
<script src="./static/js/inscription.js"></script>