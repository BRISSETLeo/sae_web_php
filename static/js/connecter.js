var buttonProfil = document.getElementById('button-profil');
var popupMenu = document.getElementById('popupMenu');
var spanProfil = document.getElementById('lettre-profil');

buttonProfil.addEventListener('click', function () {
    if(popupMenu.style.display === 'block'){
        popupMenu.style.display = 'none';
        return;
    }
    popupMenu.style.display = 'block';
});

document.addEventListener('click', function (event) {
    if (!popupMenu.contains(event.target) && event.target !== buttonProfil && event.target !== spanProfil) {
        popupMenu.style.display = 'none';
    }
});