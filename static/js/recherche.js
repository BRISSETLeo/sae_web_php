// Sélection du champ de recherche
const searchInput = document.getElementById('search-input');
// Sélection du conteneur des résultats de recherche
const resultsContainer = document.getElementById('results-container');

// Écouteur d'événement pour déclencher la recherche lors de la saisie
searchInput.addEventListener('input', function() {
    // Récupérer la valeur du champ de recherche
    const query = searchInput.value;

    // Vérifier si la valeur de la recherche est vide
    if (query.trim() === '') {
        // Si la recherche est vide, effacer les résultats de recherche précédents
        resultsContainer.innerHTML = '';
        return;
    }

    // Effectuer une recherche AJAX
    fetch('recherche.php?query=' + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
            // Afficher les résultats de la recherche
            displaySearchResults(data);
        })
        .catch(error => {
            console.error('Erreur lors de la recherche:', error);
        });
});

// Fonction pour afficher les résultats de la recherche
function displaySearchResults(results) {
    // Effacer les résultats de recherche précédents
    resultsContainer.innerHTML = '';

    // Vérifier s'il y a des résultats de recherche
    if (results.length === 0) {
        // Si aucun résultat trouvé, afficher un message
        resultsContainer.innerHTML = '<p>Aucun résultat trouvé.</p>';
        return;
    }

    // Créer des éléments HTML pour chaque résultat de recherche et les ajouter au conteneur des résultats
    results.forEach(result => {
        const resultItem = document.createElement('div');
        resultItem.classList.add('result-item');
        resultItem.innerHTML = `
            <h3>${result.title}</h3>
            <p>Artiste: ${result.artist}</p>
            <!-- Ajoutez d'autres informations sur le résultat ici -->
        `;
        resultsContainer.appendChild(resultItem);
    });
}