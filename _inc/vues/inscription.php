<?php

if(isset($_SESSION['user'])) {
    header('Location: ./');
    exit();
}

?>

<link rel="stylesheet" type="text/css" href="_inc/static/css/inscription.css">

<div id="flash">
    <p id="message">Message</p>
</div>
<div id="default-inscription">
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
    <div id="inscription">
        <h2>Inscrivez-vous à iuT'Unes</h2>
        <div id="nom-user">
            <label for="nom-utilisateur">Nom d'utilisateur</label>
            <input onkeypress="inscription.pressButton(event)" type="text" id="nom-utilisateur" placeholder="Nom d'utilisateur">
        </div>
        <div id="mdp-user">
            <label for="mot-de-passe">Mot de passe</label>
            <input onkeypress="inscription.pressButton(event)" type="password" id="mot-de-passe" placeholder="Mot de passe">
        </div>
        <button id="se-inscrire" onclick="inscription.sendData()">S'inscrire</button>
        <p>Vous avez déjà un compte ? <a id="connexion" href="?page=connexion">Connectez-vous.</a></p>
    </div>
</div>

<script src="_inc/static/js/inscription.js"></script>