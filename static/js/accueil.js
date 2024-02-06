document.addEventListener('DOMContentLoaded', function () {
    var alogo = document.querySelector('.logo a');
    var imglogo = document.querySelector('.logo img[alt="Logo"]');
    var aaccueil = document.querySelector('.accueil a');
    var imgaccueil = document.querySelector('.accueil img[alt="Maison"]');
    var arecherche = document.querySelector('.recherche a');
    var imgrecherche = document.querySelector('.recherche img[alt="loupe"]');
    var aplaylist = document.querySelector('.lien-playlist');
    var imgplalist = document.querySelector('.playlist img[alt="playlist"]');

    var minimenugauche = document.querySelector('#mini-menu-gauche');
    var headerbtn = document.querySelector('.header-buttons');
    var header = document.querySelector('header');
    var minifleche = document.querySelector('img[alt="miniFleche"]');
    var menugauche = document.querySelector('#menu-gauche');
    var imgfleche = document.querySelector('img[alt="fleche"]');

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
        menugauche.style.display = 'none';
        minimenugauche.style.display = 'flex';
        header.style.margin = '0.6% 0.7% 0.6% 0.2%';
        headerbtn.style.margin = '0 6.6% 0 0';
    });

    minifleche.addEventListener('mouseover', function () {
        minimenugauche.style.backgroundColor = '#191919';
    });

    minifleche.addEventListener('mouseout', function () {
        minimenugauche.style.backgroundColor = '#121212';
    });

    minifleche.addEventListener('click', function () {
        menugauche.style.display = 'flex';
        minimenugauche.style.display = 'none';
        header.style.margin = '0.7% 0.8% 0.6% 0.2%';
        headerbtn.style.margin = '0 9% 0 0';
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
    aplaylist.addEventListener('mouseover', function () { handleHover(aplaylist, imgplalist); });
    aplaylist.addEventListener('mouseout', function () { handleMouseOut(aplaylist, imgplalist); });
    imgplalist.addEventListener('mouseover', function () { handleHover(aplaylist, imgplalist); });
    imgplalist.addEventListener('mouseout', function () { handleMouseOut(aplaylist, imgplalist) });
    imgplalist.addEventListener('click', function () { handleClick(aplaylist) });
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
    <h6>${album[1]}</h6>
    <p>${album[0]}</p>
    `;
    document.getElementById('container-albums').appendChild(div);
}

function onclickAlbum(id_album) {
    window.location.href = `?action=album&id=${id_album}`;
}
