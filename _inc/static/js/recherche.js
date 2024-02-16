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
            <div class="playlist-infos">
                <h3>${playlist['name']}</h3>
                <p>${artistes}</p>
            </div>
        `;
        container.appendChild(div);
        ++nb;
    }
    if (nb == 0) return;
    document.getElementById('research-container').appendChild(container);
}

function afficherAlbums(lesAlbums) {
    if (lesAlbums.length == 0) return;
    const container = document.createElement('div');
    container.innerHTML = '<h2>Albums</h2>';
    container.id = 'research-container-albums';

    for (var key in lesAlbums) {
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
        container.appendChild(div);
    }
    document.getElementById('research-container').appendChild(container);
}

function afficherMusiques(lesSongs) {
    if (lesSongs.length == 0) return;
    const container = document.createElement('div');
    container.innerHTML = '<h2>Musiques</h2>';
    container.id = 'research-container-musiques';

    for (var key in lesSongs) {
        const song = lesSongs[key];
        const div = document.createElement('div');
        div.classList.add('container');
        div.classList.add('song');
        artistes = '';
        for (var key in song['artistes']) {
            artistes += song['artistes'][key]['name'] + ', ';
        }
        artistes = artistes.slice(0, -2);
        div.innerHTML = `
            <div class="song-cover">
                <img src="data:image/jpeg;base64,${song['image']}" alt="">
            </div>
            <div class="song-infos">
                <h3>${song['title']}</h3>
                <p>${artistes}</p>
            </div>
        `;
        container.appendChild(div);
    }
    document.getElementById('research-container').appendChild(container);
}

function afficherBand(lesBand) {
    if (lesBand.length == 0) return;
    const container = document.createElement('div');
    container.innerHTML = '<h2>Artistes</h2>';
    container.id = 'research-container-artistes';

    for (var key in lesBand) {
        const band = lesBand[key];
        const div = document.createElement('div');
        div.classList.add('container');
        div.classList.add('band');
        div.innerHTML = `
            <div class="band-cover">
                <img src="data:image/jpeg;base64,${band['image']}" alt="">
            </div>
            <div class="band-infos">
                <h3>${band['id']}</h3>
                <p>${band['name']}</p>
            </div>
        `;
        container.appendChild(div);
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