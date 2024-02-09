<?php

if(isset($_SESSION['user'])) {
    header('Location: ./');
    exit();
}

?>

<link rel="stylesheet" type="text/css" href="_inc/static/css/connexion.css">

<div id="flash">
    <p id="message">Message</p>
</div>
<div id="default-connexion">
    <div id="connexion">
        <h2>Connectez-vous à iuT'Unes</h2>
        <div id="nom-user">
            <label for="nom-utilisateur">Nom d'utilisateur</label>
            <input onkeypress="connexion.pressButton(event)" type="text" id="nom-utilisateur" placeholder="Nom d'utilisateur">
        </div>
        <div id="mdp-user">
            <label for="mot-de-passe">Mot de passe</label>
            <input onkeypress="connexion.pressButton(event)" type="password" id="mot-de-passe" placeholder="Mot de passe">
        </div>
        <button autofocus onclick="connexion.sendData()" id="se-connecter">Se connecter</button>
        <p>Vous n'avez pas de compte ? <a id="inscription" href="?page=inscription">Inscrivez-vous.</a></p>
    </div>
    <div id="informations">
        <div id="premier-bloc">
            <p>iuT'Unes est une plateforme</p>
            <p>de musique où vous pourrez</p>
            <p>y retrouver toutes les musiques</p>
            <p>du moment.</p>
        </div>
        <p>Vous pourrez les écouter sans</p>
        <p>interruption et de manière</p>
        <p>totalement gratuite.</p>
    </div>
</div>

<script src="_inc/static/js/connexion.js"></script>