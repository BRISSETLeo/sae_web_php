function resizePlaylist() {
    const defaultMain = document.getElementById("default-main");
    const playlistList = document.getElementById("playlist-list");
    const imageChevron = document.getElementById("chevron");

    if (defaultMain.classList.contains("default-main")) {
        defaultMain.classList.remove("default-main");
        defaultMain.classList.add("resize-default-main");
        playlistList.classList.remove("default-playlist-list")
        playlistList.classList.add("resize-playlist-list");
        imageChevron.src = "_inc/static/images/previous.png";
    } else {
        defaultMain.classList.add("default-main");
        defaultMain.classList.remove("resize-default-main");
        playlistList.classList.add("default-playlist-list")
        playlistList.classList.remove("resize-playlist-list");
        imageChevron.src = "_inc/static/images/next.png";
    }

}

function retrecir() {
    const defaultMain = document.getElementById("default-main");
    const playlistList = document.getElementById("playlist-list");
    const resizable = document.getElementById("resizable");

    const repositionnement = document.querySelectorAll(".repositionnement");

    if (defaultMain.classList.contains("default-main") || defaultMain.classList.contains("resize-default-main")) {
        resizable.style.display = "none";
        defaultMain.classList.add("resize-default-main-2");
        playlistList.classList.add("resize-playlist-list-2");
        defaultMain.classList.remove("default-main");
        defaultMain.classList.remove("resize-default-main");
        playlistList.classList.remove("default-playlist-list")
        playlistList.classList.remove("resize-playlist-list");
        for (var i = 0; i < repositionnement.length; ++i) {
            repositionnement[i].style.display = "none";
        }
    } else {
        resizable.style.display = "block";
        defaultMain.classList.add("default-main");
        playlistList.classList.add("default-playlist-list")
        defaultMain.classList.remove("resize-default-main-2");
        playlistList.classList.remove("resize-playlist-list-2");
        for (var i = 0; i < repositionnement.length; ++i) {
            repositionnement[i].style.display = "block";
        }
    }
}