@extends('layouts.web')
@section('content')
    @php
    $advertisementImage1 = asset('storage/advertisementsImages/' . ($advertisements[0] ?? null));
    $advertisementImage2 = asset('storage/advertisementsImages/' . ($advertisements[1] ?? null));
    $advertisementImage3 = asset('storage/advertisementsImages/' . ($advertisements[2] ?? null));
    @endphp
    @if ($advertisementImage1)
        <img src={{ $advertisementImage1 }} alt="" class="card-img-top">
    @endif
    @if ($advertisementVideo != '')
        <script defer>
            setTimeout(init, 1000);

            function init() {

                const videoPlayer = document.getElementById("video-player");

                const advertisement = document.createElement("video");
                advertisement.src = "{{ asset('storage/advertisementsVideos/' . $advertisementVideo) }}";
                advertisement.id = "advertisement";

                const video = document.createElement("iframe");
                video.id = "video";
                const yotubeVideo = "{{ $videoUrl }}";
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
            }
        </script>
        <div id="video-player"></div>
    @endif

    <div class="article-section">{{ $section1 }}</div>
    @if ($advertisementImage2)
        <img src={{ $advertisementImage2 }} alt="" class="card-img-top">
    @endif
    <div class="article-section">{{ $section2 }}</div>
    @if ($advertisementImage3)
        <img src={{ $advertisementImage3 }} alt="" class="card-img-top">
    @endif
    <div class="article-section">{{ $section3 }}</div>
@endsection
