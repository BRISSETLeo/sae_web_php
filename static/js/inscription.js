var nameInput = document.getElementById("name-user");
var nameErreur = document.getElementById("erreur-name-already-used");
var seIdentifier = document.getElementById("se-identifier");

nameInput.addEventListener("blur", function() {
    nameUserAlreadyExist();         
});

nameInput.addEventListener("change", function() {
    supprimerAlerte();
    supprimerAlerteName();
});


function nameUserAlreadyExist(){
    $.ajax({
        url: './identification.php',
        type: 'POST',
        data: {
            pseudo: nameInput.value
        },
        success: function(response){
            response = JSON.parse(response);
            if(response.isUser){
                alerterUtilisateurQuePseudoExiste();
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}

function alerterUtilisateurQuePseudoExiste(){
    nameErreur.style.display = "block";
    nameErreur.style.color = "red";
    seIdentifier.disabled = true;
}

function supprimerAlerte(){
    nameErreur.style.display = "none";
    seIdentifier.disabled = false;
}

var mdpInput = document.getElementById("mot-de-passe");
var mdpErreur = document.getElementById("erreur-mdp-not-same");

mdpInput.addEventListener("change", function() {
    supprimerAlerteMdp();
});

function alerterUtilisateurQueMdpNonRenseigne(){
    mdpErreur.style.display = "block";
    mdpErreur.style.color = "red";
}

function supprimerAlerteMdp(){
    mdpErreur.style.display = "none";
}

function alerterUtilisateurQueNameNonRenseigne(){
    var nameErreur = document.getElementById("erreur-name-not-same");
    nameErreur.style.display = "block";
    nameErreur.style.color = "red";
    supprimerAlerte();
}

function supprimerAlerteName(){
    var nameErreur = document.getElementById("erreur-name-not-same");
    nameErreur.style.display = "none";
}

function sInscrire(){
    if (nameInput.value.trim() === "" && !seIdentifier.disabled){
        alerterUtilisateurQueNameNonRenseigne();
    } else if(mdpInput.value.trim() === "" && !seIdentifier.disabled){
        alerterUtilisateurQueMdpNonRenseigne();
    }else{
        $.ajax({
            url: './identificationSucceful.php',
            type: 'POST',
            data: {
                pseudo: nameInput.value,
                password: mdpInput.value
            },
            success: function(response){
                response = JSON.parse(response);
                if(response.success){
                    window.location.href = "./";
                }else{
                    
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
};

mdpInput.addEventListener('keypress', keyEnterIsPressed);
nameInput.addEventListener('keypress', keyEnterIsPressed);

function keyEnterIsPressed(event) {
    if (event.key === 'Enter') {
        sInscrire();
    }
}