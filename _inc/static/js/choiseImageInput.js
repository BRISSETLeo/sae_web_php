document.getElementById("image_playlist").addEventListener("change", function () {
    var fileInput = document.getElementById("image_playlist");
    var file = fileInput.files[0];
    var msg = document.getElementById("message_playlist");

    var img = document.getElementById("image_playlist_preview");

    if (file) {
        img.src = URL.createObjectURL(file);
        msg.style.display = "none";
    } else {
        img.src = "";
        msg.style.display = "block";
    }
});