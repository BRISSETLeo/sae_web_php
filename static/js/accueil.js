document.addEventListener('DOMContentLoaded', function () {
    var alogo = document.querySelector('.logo a');
    var imglogo = document.querySelector('.logo img[alt="Logo"]');
    var aaccueil = document.querySelector('.accueil a');
    var imgaccueil = document.querySelector('.accueil img[alt="Maison"]');
    var arecherche = document.querySelector('.recherche a');
    var imgrecherche = document.querySelector('.recherche img[alt="loupe"]');
    var aplaylist = document.querySelector('.lien-playlist');
    var imgplalist = document.querySelector('.playlist img[alt="playlist"]');

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

var buttonProfil = document.getElementById('button-profil');
var popupMenu = document.getElementById('popupMenu');
var spanProfil = document.getElementById('lettre-profil');

buttonProfil.addEventListener('click', function () {
    popupMenu.style.display = 'block';
    console.log('click');
});

document.addEventListener('click', function (event) {
    if (!popupMenu.contains(event.target) && event.target !== buttonProfil && event.target !== spanProfil) {
        popupMenu.style.display = 'none';
    }
});
