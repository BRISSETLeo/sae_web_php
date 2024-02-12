function afficherCreationPlaylist() {
    const creationPlaylist = document.getElementById('container-playlist');
    const playlist = document.getElementById('playlist');
    const nomInput = document.getElementById('nom-playlist');
    const visibilityInput = document.getElementById('public');
    const descriptionInput = document.getElementById('description-playlist');
    creationPlaylist.style.visibility = 'visible';
    creationPlaylist.style.opacity = '1';
    document.addEventListener('click', function (event) {
        if (event.target === creationPlaylist && event.target !== playlist) {
            creationPlaylist.style.visibility = 'hidden';
            creationPlaylist.style.opacity = '0';
            nomInput.value = '';
            visibilityInput.checked = false;
            descriptionInput.value = '';
            document.removeEventListener('click', function (event) {
                if (event.target === creationPlaylist && event.target !== playlist) {
                    creationPlaylist.style.visibility = 'hidden';
                    creationPlaylist.style.opacity = '0';
                    nomInput.value = '';
                    visibilityInput.checked = false;
                    descriptionInput.value = '';
                }
            });
        }
    });
}

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