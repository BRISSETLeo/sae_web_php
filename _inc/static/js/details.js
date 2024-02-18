document.addEventListener("DOMContentLoaded", function() {
    // Récupérer le bouton "modifier"
    var modifierBtn = document.querySelector(".modifier");
    // Récupérer le menu
    var menu = document.querySelector(".menu");

    // Ajouter un écouteur d'événements sur le bouton "modifier"
    modifierBtn.addEventListener("click", function() {
        // Afficher ou masquer le menu
        menu.classList.toggle("show-menu");
    });
});