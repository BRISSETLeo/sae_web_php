var popupButton = document.getElementById('popupButton');
var popupMenu = document.getElementById('popupMenu');

popupButton.addEventListener('click', function () {
    popupMenu.style.display = 'block';
});

document.addEventListener('click', function (event) {
    if (!popupMenu.contains(event.target) && event.target !== popupButton) {
        popupMenu.style.display = 'none';
    }
});
