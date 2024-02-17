const popupMenu = document.getElementById('popupMenu');

function afficherMenu() {
    if (popupMenu.style.display === 'flex') {
        popupMenu.style.display = 'none';
    } else {
        popupMenu.style.display = 'flex';
    }
}

const buttonProfil = document.getElementById('button-profil');
const spanProfil = document.getElementById('lettre-profil');

document.addEventListener('click', function (event) {
    if (popupMenu !== null && !popupMenu.contains(event.target) && event.target !== buttonProfil && event.target !== spanProfil) {
        popupMenu.style.display = 'none';
    }
});