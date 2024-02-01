<?php

use classes\DataLoaderSQLite;
$dataLoaderSQLite = new DataLoaderSQLite();

?>

<title>Connexion - iuT'Unes</title>
<div id="main-identification-center">
    <div id="identification-container">
        <div id="identification-container-center-2">
            <h1>J'ai un compte iuT'Unes</h1>   
            <div id="identification">
                <div id="nameuser">
                    <label for="name-user">Adresse e-mail ou nom d'utilisateur</label>
                    <input type="text" id="name-user" name="name-user" placeholder="Adresse e-mail ou nom d'utilisateur"> 
                </div>
                <div id="mdp">
                    <label for="mot-de-passe">Mot de passe</label>
                    <input type="password" id="mot-de-passe" name="mot-de-passe" placeholder="Mot de passe">
                </div>
                <a id="se-identifier" href="#">Se connecter</a>
                <div id="mdp-oublie">
                    <a id="mot-de-passe-oublie" href="#">Mot de passe oublié ?</a>
                </div>
                <p>Vous n'avez pas de compte ? <a id="creer-un-compte" href="?action=inscription">Je n'ai pas iuT'Unes</a></p>
            </div>
        </div>
    </div>
</div>
