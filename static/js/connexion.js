var erreurConnexion = document.getElementById('erreur-connexion');
var nameInput = document.getElementById('name-user');
var mdpInput = document.getElementById('mot-de-passe');

function afficherErreurConnexion(text) {
    erreurConnexion.style.display = 'block';
    erreurConnexion.style.color = 'red';
    erreurConnexion.innerHTML = text;
}

function cacherErreurConnexion() {
    erreurConnexion.style.display = 'none';
}

mdpInput.addEventListener('focus', cacherErreurConnexion);
nameInput.addEventListener('focus', cacherErreurConnexion);

function seConnecter(){
    
    if(nameInput.value.trim() === ''){
        afficherErreurConnexion('Veuillez renseigner votre pseudo');
        return;
    }else if(mdpInput.value.trim() === ''){
        afficherErreurConnexion('Veuillez renseigner votre mot de passe');
        return;
    }

    $.ajax({
        url: './connexionSucceful.php',
        type: 'POST',
        data: {
            pseudo: nameInput.value,
            password: mdpInput.value
        },
        success: function(response){
            response = JSON.parse(response);
            if(response.success){
                window.location.href = './';
            } else {
                afficherErreurConnexion(response.message);
            }
        }
    });
}