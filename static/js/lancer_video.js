async function fetchAndPlayVideo() {
    try {
        const response = await fetch('./data/video.mp3');
        const videoData = await response.blob();
        const videoBlob = new Blob([videoData], { type: 'video/mp3' });

        const videoPlayer = document.getElementById('videoPlayer');
        const videoURL = URL.createObjectURL(videoBlob);

        videoPlayer.src = videoURL;
    } catch (error) {
        console.error('Error fetching or playing the video:', error);
    }
}