const videoPlayer = document.getElementById("video-player");

const advertisement = document.createElement("video");
advertisement.src = advertisementVideo;
advertisement.id = "advertisement";

const video = document.createElement("iframe");
video.id = "video";
video.src = `https://www.youtube.com/embed/${yotubeVideo.split("=")[1]}`;

const skipButton = document.createElement("button");
skipButton.id = "skip-button";
skipButton.innerText = "⏭︎";

const playButton = document.createElement("button");
playButton.id = "play-button";
playButton.innerText = "⏯︎";

videoPlayer.appendChild(advertisement);
videoPlayer.appendChild(playButton);

let time = 1;
const handelTimeUpdate = () => {
  time++;
  console.log(time);
  if (time >= 10) {
    videoPlayer.appendChild(skipButton);
    advertisement.removeEventListener("timeupdate", handelTimeUpdate);
  }
};

const handelPlayButton = () => {
  advertisement.play();
  playButton.removeEventListener("click", handelPlayButton);
  videoPlayer.removeChild(playButton);
};

const handelSkipButtonClick = () => {
  videoPlayer.removeChild(advertisement);
  videoPlayer.appendChild(video);
  skipButton.removeEventListener("click", handelSkipButtonClick);
  videoPlayer.removeChild(skipButton);
};

advertisement.addEventListener("timeupdate", handelTimeUpdate);
skipButton.addEventListener("click", handelSkipButtonClick);
playButton.addEventListener("click", handelPlayButton);
