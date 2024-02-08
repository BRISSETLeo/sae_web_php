document.addEventListener('DOMContentLoaded', function () {
    var alogo = document.querySelector('.logo a');
    var imglogo = document.querySelector('.logo img[alt="Logo"]');
    var aaccueil = document.querySelector('.accueil a');
    var imgaccueil = document.querySelector('.accueil img[alt="Maison"]');
    var arecherche = document.querySelector('.recherche a');
    var imgrecherche = document.querySelector('.recherche img[alt="loupe"]');
    var aplaylist = document.querySelector('.lien-playlist');
    var imgplaylist = document.querySelector('.playlist img[alt="playlist"]');
    var plus = document.querySelector('.plus');
    var headerbtn = document.querySelector('.header-buttons');
    var header = document.querySelector('header');
    var menugauche = document.querySelector('#menu-gauche');
    var menuhaut = document.querySelector('#menu-haut');
    var menucorps = document.querySelector('#menu-corps');
    var imgfleche = document.querySelector('img[alt="fleche"]');
    var blockcreerplaylist = document.querySelector('.creer-playlist');

    var listeImg = [imglogo, imgaccueil, imgrecherche, imgplaylist];

    // Fonctions de gestion des événements
    function handleHover(a, img) {
        img.style.opacity = a.style.opacity = 1;
    }

    function handleMouseOut(a, img) {
        img.style.opacity = a.style.opacity = 0.7;
    }

    // Vérifiez si ça marche
    function handleClick(a) {
        // Redirigez vers l'URL du lien a
        window.location.href = a.href;
    }

    imgfleche.addEventListener('click', function () {
        imgplaylist.classList.add("img-hover");
        imgplaylist.classList.add("low-opacity");
        imgplaylist.style.cursor = "pointer";
        alogo.style.display = 'none';
        aaccueil.style.display = 'none';
        arecherche.style.display = 'none';
        aplaylist.style.display = 'none';
        blockcreerplaylist.style.display = 'none';
        plus.style.display = 'none';
        imgfleche.style.display = 'none';
        //menucorps.style.margin = '0% 7% 7% 7%';
        menugauche.style.width = '8%';
        //menuhaut.style.margin = "7%";
        imglogo.style.margin = "12.4% 0% 12.4% 20%";
        imgaccueil.style.margin = '7.5% 0% 10.7% 20%';
        imgrecherche.style.margin = '9% 0% 12% 20%'
        imgplaylist.style.margin = '18.5% 0% 10.7% 20%';
        
        // for ( img of listeImg){
        //     img.style.margin = '10.7% 0% 10.7% 20%';
        // }
        //header.style.margin = '0.6% 0.7% 0.6% 0.2%';
        //headerbtn.style.margin = '0 6.6% 0 0';
    });

    imgplaylist.addEventListener('click', function () {
        imgplaylist.style.cursor = "default";
        imgplaylist.classList.remove("low-opacity");
        imgplaylist.classList.remove("img-hover")
        alogo.style.display = 'block';
        aaccueil.style.display = 'block';
        arecherche.style.display = 'block';
        aplaylist.style.display = 'block';
        blockcreerplaylist.style.display = 'block';
        plus.style.display = 'block';
        imgfleche.style.display = 'block';
        //menuhaut.style.margin = '2%';
        //menucorps.style.margin = '0% 2% 2% 2%';
        menugauche.style.width = '34%';
        for ( img of listeImg){
            img.style.margin = '0%';
        }
        //header.style.margin = '0.7% 0.8% 0.6% 0.2%';
        //headerbtn.style.margin = '0 9% 0 0';
    });
    
    // Event listeners sur la div logo
    imglogo.addEventListener("click", function () { handleClick(alogo) });

    // Event listeners sur la div accueil
    aaccueil.addEventListener('mouseover', function () { handleHover(aaccueil, imgaccueil); });
    aaccueil.addEventListener('mouseout', function () { handleMouseOut(aaccueil, imgaccueil); });
    imgaccueil.addEventListener('mouseover', function () { handleHover(aaccueil, imgaccueil); });
    imgaccueil.addEventListener('mouseout', function () { handleMouseOut(aaccueil, imgaccueil) });
    imgaccueil.addEventListener('click', function () { handleClick(aaccueil) });

    // Event listeners sur la div recherche
    arecherche.addEventListener('mouseover', function () { handleHover(arecherche, imgrecherche); });
    arecherche.addEventListener('mouseout', function () { handleMouseOut(arecherche, imgrecherche); });
    imgrecherche.addEventListener('mouseover', function () { handleHover(arecherche, imgrecherche); });
    imgrecherche.addEventListener('mouseout', function () { handleMouseOut(arecherche, imgrecherche) });
    imgrecherche.addEventListener('click', function () { handleClick(arecherche) });

    // Event listeners sur la div playlist
    //aplaylist.addEventListener('mouseover', function () { handleHover(aplaylist, imgplaylist); });
    //aplaylist.addEventListener('mouseout', function () { handleMouseOut(aplaylist, imgplaylist); });
    //imgplaylist.addEventListener('mouseover', function () { handleHover(aplaylist, imgplaylist); });
    //imgplaylist.addEventListener('mouseout', function () { handleMouseOut(aplaylist, imgplaylist) });
    //imgplaylist.addEventListener('click', function () { handleClick(aplaylist) });
});

$.ajax({
    url: './getAlbums.php',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
        for (var key in data) {
            afficherAlbum(data[key]);
        }
    },
    error: function (xhr, status, error) {
        console.log("Erreur de requête Ajax:", status, error);
    }
});

function afficherAlbum(album) {
    var div = document.createElement('div');
    div.onclick = function () {
        onclickAlbum(album[0]);
    }
    div.className = 'album';
    div.innerHTML = `
    <img src="data:image/jpeg;base64,${album[2]}" alt="${album[1]}">
    <h3>${album[1]}</h3>
    <p>${album[0]}</p>
    `;
    document.getElementById('container-albums').appendChild(div);
}

function onclickAlbum(id_album) {
    window.location.href = `?action=album&id=${id_album}`;
}
