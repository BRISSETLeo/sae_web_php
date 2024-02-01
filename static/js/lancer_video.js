async function fetchAndPlayVideo() {
    try {
        const response = await fetch('./data/video.mp3');
        const videoData = await response.blob();
        const videoBlob = new Blob([videoData], { type: 'video/mp3' });

        const videoPlayer = document.getElementById('videoPlayer');
        const videoURL = URL.createObjectURL(videoBlob);

        videoPlayer.src = videoURL;
<<<<<<< HEAD
        document.getElementById('videoPlayer').classList.remove('hidden');
    } catch (error) {
        console.error('Error fetching or playing the video:', error);
    }
}

async function fetchAlbums() {
    try {
        const response = await fetch('./getAlbums.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        });
        const albums = await response.json();
        console.log(albums);
        
        const albums = await response.json();        
        return albums;
    } catch (error) {
        console.error('Erreur lors de la récupération des albums:', error);
        throw error;
    }
}

async function displayAlbums(albums) {
    try {
        const container = document.getElementById('container');

        // Itérer sur chaque album et créer la structure HTML appropriée
        albums.albums.forEach(async (album, index) => {
            const divElement = document.createElement('div');
            divElement.classList.add('top');

            // Créer la balise img pour l'image de l'album
            const imageURL = 'data:image/png;base64,' + album.imageBlob;
            const imgElement = document.createElement('img');
            imgElement.src = imageURL;
            imgElement.alt = `Image de l'album ${index + 1}`;
            divElement.appendChild(imgElement);

            // Créer la balise img pour le bouton "Jouer"
            const playImgElement = document.createElement('img');
            playImgElement.src = './static/images/play.png';
            playImgElement.addEventListener('click', fetchAndPlayVideo);
            playImgElement.alt = `Jouer l'album ${index + 1}`;
            playImgElement.classList.add('play');
            divElement.appendChild(playImgElement);

            // Créer la section d'informations de l'album
            const infoDiv = document.createElement('div');
            infoDiv.classList.add('informations');

            const titleElement = document.createElement('h3');
            titleElement.textContent = album.titre;
            infoDiv.appendChild(titleElement);

            const descriptionElement = document.createElement('p');
            descriptionElement.textContent = album.description;
            infoDiv.appendChild(descriptionElement);

            const noteElement = document.createElement('p');
            noteElement.textContent = `Note : ${album.note}`;
            infoDiv.appendChild(noteElement);

            divElement.appendChild(infoDiv);

            // Ajouter la div au conteneur principal
            container.appendChild(divElement);
        });
    } catch (error) {
        console.error('Error displaying albums:', error);
    }
}

// Appel des fonctions pour récupérer et afficher les albums
fetchAlbums()
.then(albums => displayAlbums(albums))
.catch(error => console.error('Erreur lors de l\'affichage des albums:', error));
=======
    } catch (error) {
        console.error('Error fetching or playing the video:', error);
    }
}
>>>>>>> 82d9f49 (pr)
