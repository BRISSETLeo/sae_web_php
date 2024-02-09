const monInput = document.getElementById('search-query');
monInput.addEventListener('input', function () {
    console.log(monInput.value);
    $.ajax({
        url: './getRecherche.php',
        type: 'POST',
        data: {
            recherche: monInput.value
        },
        dataType: 'json',
        success: function (data) {
            console.log("test", data);
            document.getElementById('container-recherche').innerHTML = "";
            for (var key in data) {
                afficherRecherche(data[key]);
            }
        }
        
    });
});

function afficherRecherche(recherche) {
    var div = document.createElement('div');
    div.innerHTML = `
    <h6>${recherche["name"]}</h6>
    `;
    document.getElementById('container-recherche').appendChild(div);
}