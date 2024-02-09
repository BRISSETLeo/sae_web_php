const buttonProfil = document.getElementById('button-profil');
const popupMenu = document.getElementById('popupMenu');
const spanProfil = document.getElementById('lettre-profil');
const playlist = document.querySelector('#popupMenu a');

buttonProfil.addEventListener('click', function () {
    if (popupMenu.style.display === 'flex') {
        popupMenu.style.display = 'none';
        return;
    }
    popupMenu.style.display = 'flex';
});

document.addEventListener('click', function (event) {
    if (!popupMenu.contains(event.target) && event.target !== buttonProfil && event.target !== spanProfil || event.target === playlist) {
        popupMenu.style.display = 'none';
    }
});