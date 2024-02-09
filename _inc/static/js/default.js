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
        }
    });
}
