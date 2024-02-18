const rechercheInput = document.getElementById('search');

rechercheInput.addEventListener('input', recherche);

function recherche() {
    if (rechercheInput.value.trim().length == 0) {
        document.getElementById("container-accueil").style.display = "block";
        document.getElementById('research-container').innerHTML = '';
        return;
    } else {
        document.getElementById("container-accueil").style.display = "none";
    }
    const radioAll = document.getElementById('all');
    const radioAlbums = document.getElementById('albums');
    const radioMusiques = document.getElementById('musiques');
    const radioArtistes = document.getElementById('artistes');
    const radioPlaylist = document.getElementById('playlists');

    if (radioAll.checked) {
        $.ajax({
            type: 'POST',
            url: '_inc/methodes/mesRecherches.php',
            data: {
                type: 'all',
                recherche: rechercheInput.value
            },
            success: function (data) {
                data = JSON.parse(data);
                document.getElementById('research-container').innerHTML = '';
                afficherPlaylist(data.lesPlaylist);
                afficherAlbums(data.lesAlbums);
                afficherMusiques(data.lesSongs);
                afficherBand(data.lesArtistes);
            },
            error: function (data) {
                console.log(data);
            }
        });
    } else if (radioAlbums.checked) {
        $.ajax({
            type: 'POST',
            url: '_inc/methodes/mesRecherches.php',
            data: {
                type: 'albums',
                recherche: rechercheInput.value
            },
            success: function (data) {
                data = JSON.parse(data);
                document.getElementById('research-container').innerHTML = '';
                afficherAlbums(data.lesAlbums);
            },
            error: function (data) {
                console.log(data);
            }
        });
    } else if (radioMusiques.checked) {
        $.ajax({
            type: 'POST',
            url: '_inc/methodes/mesRecherches.php',
            data: {
                type: 'musiques',
                recherche: rechercheInput.value
            },
            success: function (data) {
                data = JSON.parse(data);
                document.getElementById('research-container').innerHTML = '';
                afficherMusiques(data.lesSongs);
            },
            error: function (data) {
                console.log(data);
            }
        });
    } else if (radioArtistes.checked) {
        $.ajax({
            type: 'POST',
            url: '_inc/methodes/mesRecherches.php',
            data: {
                type: 'artistes',
                recherche: rechercheInput.value
            },
            success: function (data) {
                data = JSON.parse(data);
                document.getElementById('research-container').innerHTML = '';
                afficherBand(data.lesArtistes);
            },
            error: function (data) {
                console.log(data);
            }
        });
    } else if (radioPlaylist.checked) {
        $.ajax({
            type: 'POST',
            url: '_inc/methodes/mesRecherches.php',
            data: {
                type: 'playlist',
                recherche: rechercheInput.value
            },
            success: function (data) {
                data = JSON.parse(data);
                document.getElementById('research-container').innerHTML = '';
                afficherPlaylist(data.lesPlaylist);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
    wait = setTimeout(ifSearchContainerEmpty, 100);
}

function afficherPlaylist(lesPlaylist) {
    if (lesPlaylist.length == 0) return;
    const container = document.createElement('div');
    container.innerHTML = '<h2>Playlist</h2>';
    container.id = 'research-container-playlist';

    var nb = 0;

    for (var key in lesPlaylist) {
        const playlist = lesPlaylist[key];
        const div = document.createElement('div');
        div.classList.add('container');
        div.classList.add('playlist');
        artistes = '';
        for (var key in playlist['artistes']) {
            artistes += playlist['artistes'][key]['name'] + ', ';
        }
        if (artistes.length == 0) continue;
        artistes = artistes.slice(0, -2);
        div.innerHTML = `
            <div class="playlist-cover">
                <img src="data:image/jpeg;base64,${playlist['image']}" alt="">
            </div>
            <div class="informations">
                <h3 class="titre">${playlist['name']}</h3>
                <p class="artistes">${artistes}</p>
            </div>
        `;
        container.appendChild(div);
        ++nb;
    }
    if (nb == 0) return;
    document.getElementById('research-container').appendChild(container);
}

function afficherAlbums(lesAlbums) {
    if (lesAlbums.length === 0) return;

    const container = document.createElement('div');
    container.id = 'research-container-albums';
    container.innerHTML = '<h2>Albums :</h2>';

    for (var key in lesAlbums) {
        const divContainer = document.createElement('div');
        divContainer.classList.add('container');
        divContainer.classList.add('no-hover');
        divContainer.classList.add('container');
        const a = document.createElement('a');
        a.href = `?page=details&type=album&id=${lesAlbums[key]['id']}`;
        a.classList.add('lien_details');
        const album = lesAlbums[key];
        const div = document.createElement('div');
        div.classList.add('container');
        div.classList.add('album');
        artistes = '';
        for (var key in album['artistes']) {
            artistes += album['artistes'][key]['name'] + ', ';
        }
        artistes = artistes.slice(0, -2);
        div.innerHTML = `
            <div class="album-cover">
                <img src="data:image/jpeg;base64,${album['image']}" alt="">
            </div>
            <div class="informations">
                <h3 class="titre">${album['title']}</h3>
                <p class="artistes">${artistes}</p>
            </div>
        `;
        a.appendChild(div);
        divContainer.appendChild(a);
        container.appendChild(divContainer);
    }

    document.getElementById('research-container').appendChild(container);
}

function afficherMusiques(lesMusiques) {
    if (lesMusiques.length === 0) return;

    const container = document.createElement('div');
    container.id = 'research-container-musiques';
    container.innerHTML = '<h2>Les meilleures musiques :</h2>';

    for (var key in lesMusiques) {
        const divContainer = document.createElement('div');
        divContainer.classList.add('container');
        divContainer.classList.add('no-hover');
        const a = document.createElement('a');
        a.classList.add('lien_details');
        const musique = lesMusiques[key];
        const div = document.createElement('div');
        div.classList.add('container');
        div.classList.add('musique');
        artistes = '';
        for (var key in musique['artistes']) {
            artistes += musique['artistes'][key]['name'] + ', ';
        }
        artistes = artistes.slice(0, -2);
        div.innerHTML = `
            <div class="musique-cover">
                <img src="data:image/jpeg;base64,${musique['image']}" alt="">
            </div>
            <div class="informations">
                <h3 class="titre">${musique['title']}</h3>
                <p class="artistes">${artistes}</p>
            </div>
        `;
        a.appendChild(div);
        divContainer.appendChild(a);
        container.appendChild(divContainer);
    }

    document.getElementById('research-container').appendChild(container);
}

function afficherBand(lesBand) {
    if (lesBand.length == 0) return;
    const container = document.createElement('div');
    container.innerHTML = '<h2>Artistes</h2>';
    container.id = 'research-container-artistes';

    for (var key in lesBand) {
        const divContainer = document.createElement('div');
        divContainer.classList.add('container');
        divContainer.classList.add('no-hover');
        const a = document.createElement('a');
        a.href = '?page=details&type=artiste&id='.concat(lesBand[key]['id']);
        a.classList.add('lien_details');
        const band = lesBand[key];
        const div = document.createElement('div');
        div.classList.add('container');
        div.classList.add('band');
        div.innerHTML = `
            <div class="band-cover">
                <img src="data:image/jpeg;base64,${band['image']}" alt="">
            </div>
            <div class="informations">
                <h3 class="titre">${band['name']}</h3>
            </div>
        `;
        a.appendChild(div);
        divContainer.appendChild(a);
        container.appendChild(divContainer);
    }

    document.getElementById('research-container').appendChild(container);
}

function ifSearchContainerEmpty() {
    var container = document.getElementById('research-container');
    if (container.innerHTML == '') {
        container.innerHTML = '<h2>Aucun résultat pour cette recherche.</h2>';
    }
}

var radioButtons = document.querySelectorAll('input[name="filter"]');
radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener('change', changement);
});

function changement() {
    recherche();
}