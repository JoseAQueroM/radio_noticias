<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Titulo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.5/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<style>
    * {
        font-family: "PT Sans", sans-serif !important;
    }

    .page-wrapper {
        width: 100%;
    }

    .full-width {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .wide-container {
        padding-left: 10rem !important;
        padding-right: 10rem !important;
    }

    .zoom-image-container {
        display: inline-block;
        overflow: hidden;
        border-radius: 8px;
    }

    .zoom-image {
        transition: transform 0.3s ease;
        will-change: transform;
    }

    .zoom-image-container:hover .zoom-image {
        transform: scale(1.08);
    }

    .left-show {
        display: flex;
        gap: 1rem;
        min-height: 220px;
        align-items: flex-start;
    }

    .left-show img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 12px;
    }

    .left-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .right-show-small {
        margin-bottom: 15px;
    }

    #carouselExampleCaptions .carousel-item {
        height: 80vh;
        min-height: 400px;
    }

    #carouselExampleCaptions .carousel-item img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    #carouselExampleCaptions .carousel-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
        padding: 20px;
        border-radius: 8px;
        max-width: 800px;
    }

    .title-new {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .title-new a {
        color: inherit;
        transition: color 0.4s ease;
    }

    .title-new a:hover {
        color: rgb(209, 209, 209);
    }

    .subtitle-new {
        font-size: 1.2rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        margin-bottom: 1rem;
    }

    .play-button {
        width: 60px;
        height: 60px;
        background-color: #1db954;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 28px;
        transition: transform 0.2s ease, background-color 0.2s ease;
        cursor: pointer;
    }

    .play-button:hover {
        transform: scale(1.1);
    }

    .carousel-control-prev,
    .carousel-control-next {
        z-index: 10;
        pointer-events: auto;
    }

    .play-button-wrapper {
        margin-top: 1.5rem;
    }

    .play-text {
        color: white;
        font-size: 1.1rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    #episodeCarousel .carousel-item {
        height: auto;
        min-height: auto;
        padding-bottom: 20px;
    }

    #episodeCarousel .carousel-item img {
        height: 300px;
        width: 100%;
        object-fit: cover;
    }

    #episodeCarousel .carousel-inner {
        overflow: hidden;
    }

    .carousel-control-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: #e6e6e6;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 4px;
        transition: background-color 0.2s ease, transform 0.2s ease;
        padding: 0;
    }

    .carousel-control-btn:hover {
        background-color: #c0c0c0;
        transform: scale(1.1);
    }

    .carousel-control-btn i {
        font-size: 12px;
        color: #000000;
        margin-top: 1px;
    }

    .radio-player-container {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #000;
        color: white;
        padding: 15px 20px;
        display: none;
        align-items: center;
        justify-content: space-between;
        z-index: 1000;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
    }

    .radio-player-info {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        max-width: 60%;
    }

    .radio-player-title {
        font-weight: bold;
        font-size: 1.1rem;
        margin-bottom: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .radio-player-episode {
        font-size: 0.9rem;
        color: #aaa;
    }

    .radio-player-controls {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .radio-player-time {
        font-size: 0.9rem;
        color: #aaa;
        min-width: 80px;
        text-align: center;
    }

    .radio-player-progress {
        flex-grow: 1;
        height: 4px;
        background-color: #333;
        border-radius: 2px;
        margin: 0 10px;
        position: relative;
    }

    .radio-player-progress-bar {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background-color: #1db954;
        width: 25%;
        border-radius: 2px;
    }

    .radio-player-btn {
        background: none;
        border: none;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
        padding: 5px;
    }

    .radio-player-btn:hover {
        color: #1db954;
    }

    .radio-player-close {
        margin-left: 15px;
        font-size: 1.5rem;
    }

    @media (max-width: 768px) {
        .page-wrapper {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .wide-container {
            padding-left: 0.8rem !important;
            padding-right: 0.8rem !important;
        }

        .left-show {
            flex-direction: column;
        }

        .left-show img {
            width: 100% !important;
            height: 250px !important;
        }

        #carouselExampleCaptions .carousel-item {
            height: 60vh;
            min-height: 300px;
        }

        #carouselExampleCaptions .carousel-caption {
            padding: 15px;
            max-width: 90%;
        }

        .title-new {
            font-size: 1.5rem !important;
            margin-bottom: 0.5rem;
        }

        .subtitle-new {
            font-size: 1rem !important;
            margin-bottom: 0.5rem;
        }

        .play-button {
            width: 50px;
            height: 50px;
            font-size: 24px;
        }

        .play-text {
            font-size: 1rem;
        }

        #episodeCarousel .carousel-item .row {
            flex-wrap: wrap;
            overflow-x: hidden;
            margin-left: 0;
            margin-right: 0;
        }

        #episodeCarousel .carousel-item .col-12 {
            flex: 0 0 100%;
            padding-left: 0;
            padding-right: 0;
            margin-bottom: 15px;
        }

        #episodeCarousel .carousel-controls .btn {
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .radio-player-container {
            padding: 10px 15px;
        }

        .radio-player-info {
            max-width: 50%;
        }

        .radio-player-title {
            font-size: 0.9rem;
        }

        .radio-player-episode {
            font-size: 0.8rem;
        }

        .radio-player-controls {
            gap: 10px;
        }

        .radio-player-time {
            min-width: 60px;
            font-size: 0.8rem;
        }

        .radio-player-btn {
            font-size: 1rem;
        }
    }

    @media (min-width: 768px) and (max-width: 992px) {
        #episodeCarousel .carousel-item .col-sm-6 {
            flex: 0 0 50%;
        }
    }
</style>

<body>
    <!-- Contenedor principal -->
    <div class="page-wrapper">
        <!-- Header -->
        @include('layouts.partials.header')

        <!-- Sección del carrusel principal -->
        <div id="carouselExampleCaptions" class="carousel slide full-width">
            <div class="carousel-inner">
                @foreach ($randomCarouselNews as $key => $newsItem)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ $newsItem->image ? asset('storage/' . $newsItem->image) : 'https://via.placeholder.com/1200x800?text=Sin+Imagen' }}" class="d-block w-100" alt="{{ $newsItem->title }}">
                    <div class="carousel-caption">
                        <p class="subtitle-new fw-bold">{{ $newsItem->category->name ?? 'Sin categoría' }}</p>
                        <h1 class="title-new px-3 fw-bold">
                            <a href="{{ route('news.show', $newsItem->slug) }}" class="text-decoration-none">
                                {{ $newsItem->title }}
                            </a>
                        </h1>

                        <p class="subtitle-new">{{ $newsItem->publish_date->isoFormat('Y | MMMM d') }}</p>
                        <div class="d-inline-flex align-items-center gap-2 play-button-wrapper">
                            <audio class="audio-player" src="http://stream.srg-ssr.ch/m/rsj/mp3_128" type="audio/mpeg"></audio>
                            <div class="play-button">
                                <i class="bi bi-play-fill"></i>
                            </div>
                            <span class="play-text fw-bold">Escuchar ahora</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if ($randomCarouselNews->count() > 1)
            <a class="carousel-control-prev me-3" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                <i class="bi bi-play-circle-fill" style="transform: rotate(180deg); font-size: 1.6rem;"></i>
            </a>
            <a class="carousel-control-next ms-3" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                <i class="bi bi-play-circle-fill" style="font-size: 1.6rem;"></i>
            </a>
            @endif
        </div>

        <!-- Reproductor de radio fijo -->
        <div class="radio-player-container" id="radioPlayer">
            <div class="radio-player-info">
                <div class="radio-player-title">Radio A1TV</div>
            </div>
            
            <div class="radio-player-controls">
              
                <button class="radio-player-btn" id="radioPlayPause">
                    <i class="bi bi-pause-fill"></i>
                </button>
                
            </div>
            
            <div class="radio-player-time">
                <span id="radioCurrentTime">00:06</span> / <span id="radioDuration">02:47</span>
            </div>
            
            <div class="radio-player-progress">
                <div class="radio-player-progress-bar" id="radioProgressBar"></div>
            </div>
            
            <button class="radio-player-btn radio-player-close" id="radioClose">
                <i class="bi bi-x"></i>
            </button>
        </div>

        <!-- Sección de noticias -->
        <section class="py-4 bg-white">
            <div class="container px-3 wide-container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold m-0 section-title">Últimas noticias</h2>
                    <div class="carousel-controls">
                        <button class="carousel-control-btn" data-bs-target="#episodeCarousel" data-bs-slide="prev">
                            <i class="bi bi-caret-left-fill"></i>
                        </button>
                        <button class="carousel-control-btn" data-bs-target="#episodeCarousel" data-bs-slide="next">
                            <i class="bi bi-caret-right-fill"></i>
                        </button>
                    </div>
                </div>

                <div id="episodeCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($newsChunks as $key => $chunk)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $newsItem)
                                <div class="col-12 col-sm-6 col-md-4">
                                    <a href="{{ route('news.show', $newsItem->slug) }}" class="text-decoration-none card-hover-effect">
                                        <div class="card border-0 h-100">
                                            <div class="position-relative rounded overflow-hidden" style="height: 300px;">
                                                @if ($newsItem->image)
                                                <img src="{{ asset('storage/' . $newsItem->image) }}" class="w-100 h-100 object-fit-cover rounded" alt="{{ $newsItem->title }}">
                                                @else
                                                <img src="https://via.placeholder.com/500x250?text=Sin+Imagen" class="w-100 h-100 object-fit-cover rounded" alt="Sin Imagen">
                                                @endif
                                            </div>
                                            <div class="card-body text-dark p-3">
                                                <small style="color: #1ee062;" class=" d-block mb-1">
                                                    {{ $newsItem->category->name ?? 'Sin Categoría' }}
                                                </small>
                                                <h6 class="fw-bold mb-1 fs-4">{{ $newsItem->title }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de redes sociales -->
        <div class="social-section full-width">
            <h2 class="fw-bold text-center mb-4 title-social">Síguenos en nuestras redes:</h2>
            <div class="container">
                <!-- Versión móvil -->
                <div class="row g-3 d-flex d-md-none justify-content-center mb-3">
                    <div class="col-6 col-sm-5 text-center">
                        <a href="#" class="social-btn d-block mx-auto">
                            <i class="bi bi-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                    <div class="col-6 col-sm-5 text-center">
                        <a href="#" class="social-btn d-block mx-auto">
                            <i class="bi bi-facebook"></i>
                            <span>Facebook</span>
                        </a>
                    </div>
                </div>
                <div class="row g-3 d-flex d-md-none justify-content-center">
                    <div class="col-6 col-sm-5 text-center">
                        <a href="#" class="social-btn d-block mx-auto">
                            <i class="bi bi-twitter"></i>
                            <span>Twitter</span>
                        </a>
                    </div>
                    <div class="col-6 col-sm-5 text-center">
                        <a href="#" class="social-btn d-block mx-auto">
                            <i class="bi bi-spotify"></i>
                            <span>Spotify</span>
                        </a>
                    </div>
                </div>

                <!-- Versión para pc -->
                <div class="d-none d-md-flex justify-content-center flex-wrap gap-4">
                    <a href="#" class="social-btn">
                        <i class="bi bi-instagram"></i>
                        <span>Instagram</span>
                    </a>
                    <a href="#" class="social-btn">
                        <i class="bi bi-facebook"></i>
                        <span>Facebook</span>
                    </a>
                    <a href="#" class="social-btn">
                        <i class="bi bi-twitter"></i>
                        <span>Twitter</span>
                    </a>
                    <a href="#" class="social-btn">
                        <i class="bi bi-spotify"></i>
                        <span>Spotify</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Otras noticias -->
        <div class="container wide-container mt-5">
            <h2 class="fw-bold section-title">Otras noticias</h2>
            <a href="{{ route('news.index') }}" class="view-all mb-5 rf rf-triangle-right">Mostrar todas las noticias</a>
            <div class="news-block">
                <div class="row">
                    <div class="col-md-8">
                        <div class="left-show">
                            @if ($leftNews)
                            <a href="{{ route('news.show', $leftNews->slug) }}" class="zoom-image-container text-decoration-none">
                                <img src="{{ $leftNews->image ? asset('storage/' . $leftNews->image) : 'https://via.placeholder.com/500x250?text=Sin+Imagen' }}"
                                    class="img-fluid rounded zoom-image"
                                    alt="{{ $leftNews->title }}">
                            </a>
                            <div class="left-info">
                                <a href="{{ route('news.show', $leftNews->slug) }}" class="text-decoration-none text-dark">
                                    <div class="show-title-principal">{{ $leftNews->title }}</div>
                                    <div class="episode-count-principal mt-1">{{ $leftNews->category->name ?? 'Sin Categoría' }}</div>
                                    <div class="show-description mt-3">{{ Str::limit($leftNews->content, 200, '...') }}</div>
                                </a>
                            </div>
                            @else
                            <p>No hay noticias para mostrar aquí.</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        @if ($chunk->count() > 1)
                        @foreach ($chunk->skip(1)->take(3) as $newsItem)
                        <div class="right-show-small mb-3">
                            <a href="{{ route('news.show', $newsItem->slug) }}" class="d-flex text-decoration-none text-dark zoom-image-container">
                                @if ($newsItem->image)
                                <img src="{{ asset('storage/' . $newsItem->image) }}"
                                    class="img-fluid rounded zoom-image"
                                    alt="{{ $newsItem->title }}"
                                    style="width: 100px; height: 100px; object-fit: cover; transition: transform 0.3s ease;">
                                @else
                                <img src="https://via.placeholder.com/500x150?text=Sin+Imagen"
                                    class="img-fluid rounded zoom-image"
                                    alt="Sin Imagen"
                                    style="width: 100px; height: 100px; object-fit: cover; transition: transform 0.3s ease;">
                                @endif
                                <div class="small-info ms-3">
                                    <div class="show-title">{{ $newsItem->category->name ?? 'Sin Categoría' }}</div>
                                    <div class="episode-count">{{ Str::limit($newsItem->title, 50, '...') }}</div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('layouts.partials.footer')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radioPlayer = document.getElementById('radioPlayer');
            const radioPlayPauseBtn = document.getElementById('radioPlayPause');
            const radioCloseBtn = document.getElementById('radioClose');
            const radioBack15Btn = document.getElementById('radioBack15');
            const radioForward15Btn = document.getElementById('radioForward15');
            const radioProgressBar = document.getElementById('radioProgressBar');
            const radioCurrentTime = document.getElementById('radioCurrentTime');
            const radioDuration = document.getElementById('radioDuration');
            
            let currentAudioPlayer = null;
            let isPlaying = false;

            // Controlador para los botones de play/pause
            document.querySelectorAll('.play-button').forEach(button => {
                button.addEventListener('click', function() {
                    const carouselItem = this.closest('.carousel-item');
                    const audioPlayer = carouselItem.querySelector('.audio-player');
                    const icon = this.querySelector('i');
                    
                    // Si ya está reproduciendo y es el mismo, pausar
                    if (currentAudioPlayer === audioPlayer && !audioPlayer.paused) {
                        audioPlayer.pause();
                        icon.classList.replace('bi-pause-fill', 'bi-play-fill');
                        radioPlayPauseBtn.innerHTML = '<i class="bi bi-play-fill"></i>';
                        isPlaying = false;
                        return;
                    }
                    
                    document.querySelectorAll('.audio-player').forEach(player => {
                        if (player !== audioPlayer) {
                            player.pause();
                            // Actualizar iconos de otros botones
                            const otherButton = player.closest('.carousel-item').querySelector('.play-button');
                            if (otherButton) {
                                otherButton.querySelector('i').classList.replace('bi-pause-fill', 'bi-play-fill');
                            }
                        }
                    });

                    // Controlar el reproductor actual
                    if (audioPlayer.paused) {
                        audioPlayer.play()
                            .then(() => {
                                icon.classList.replace('bi-play-fill', 'bi-pause-fill');
                                radioPlayPauseBtn.innerHTML = '<i class="bi bi-pause-fill"></i>';
                                currentAudioPlayer = audioPlayer;
                                isPlaying = true;
                                radioPlayer.style.display = 'flex';
                                
                                // Actualizar tiempo y progreso
                                updatePlayerTime();
                                setInterval(updatePlayerTime, 1000);
                            })
                            .catch(e => {
                                console.error("Error al reproducir:", e);
                                alert("Error al conectar con la radio");
                            });
                    } else {
                        audioPlayer.pause();
                        icon.classList.replace('bi-pause-fill', 'bi-play-fill');
                        radioPlayPauseBtn.innerHTML = '<i class="bi bi-play-fill"></i>';
                        isPlaying = false;
                    }
                });
            });

            // Controlador para el botón de play/pause del reproductor fijo
            radioPlayPauseBtn.addEventListener('click', function() {
                if (currentAudioPlayer) {
                    if (isPlaying) {
                        currentAudioPlayer.pause();
                        this.innerHTML = '<i class="bi bi-play-fill"></i>';
                        isPlaying = false;
                        
                        // Actualizar botón en el carrusel
                        const playButton = document.querySelector('.carousel-item.active .play-button i');
                        if (playButton) {
                            playButton.classList.replace('bi-pause-fill', 'bi-play-fill');
                        }
                    } else {
                        currentAudioPlayer.play()
                            .then(() => {
                                this.innerHTML = '<i class="bi bi-pause-fill"></i>';
                                isPlaying = true;
                                
                                // Actualizar botón en el carrusel
                                const playButton = document.querySelector('.carousel-item.active .play-button i');
                                if (playButton) {
                                    playButton.classList.replace('bi-play-fill', 'bi-pause-fill');
                                }
                            });
                    }
                }
            });

            // Controlador para el botón de cerrar
            radioCloseBtn.addEventListener('click', function() {
                if (currentAudioPlayer) {
                    currentAudioPlayer.pause();
                    isPlaying = false;
                    radioPlayer.style.display = 'none';
                    
                    // Actualizar botón en el carrusel
                    const playButton = document.querySelector('.carousel-item.active .play-button i');
                    if (playButton) {
                        playButton.classList.replace('bi-pause-fill', 'bi-play-fill');
                    }
                }
            });

            // Controlador para retroceder 15 segundos
            radioBack15Btn.addEventListener('click', function() {
                if (currentAudioPlayer) {
                    currentAudioPlayer.currentTime = Math.max(0, currentAudioPlayer.currentTime - 15);
                    updatePlayerTime();
                }
            });

            // Controlador para avanzar 15 segundos
            radioForward15Btn.addEventListener('click', function() {
                if (currentAudioPlayer) {
                    currentAudioPlayer.currentTime = Math.min(currentAudioPlayer.duration, currentAudioPlayer.currentTime + 15);
                    updatePlayerTime();
                }
            });

            // Función para actualizar el tiempo y la barra de progreso
            function updatePlayerTime() {
                if (currentAudioPlayer) {
                    const currentTime = formatTime(currentAudioPlayer.currentTime);
                    const duration = formatTime(currentAudioPlayer.duration);
                    
                    radioCurrentTime.textContent = currentTime;
                    radioDuration.textContent = duration;
                    
                    const progress = (currentAudioPlayer.currentTime / currentAudioPlayer.duration) * 100;
                    radioProgressBar.style.width = `${progress}%`;
                }
            }

            // Función para formatear el tiempo (MM:SS)
            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
            }

            // Actualizar el estado del botón cuando cambia el carrusel
            const myCarousel = document.getElementById('carouselExampleCaptions');
            myCarousel.addEventListener('slid.bs.carousel', function() {
                const activeItem = this.querySelector('.carousel-item.active');
                const activeAudio = activeItem.querySelector('.audio-player');
                const activeButton = activeItem.querySelector('.play-button');

                if (activeAudio && !activeAudio.paused) {
                    activeButton.querySelector('i').classList.replace('bi-play-fill', 'bi-pause-fill');
                } else {
                    activeButton.querySelector('i').classList.replace('bi-pause-fill', 'bi-play-fill');
                }
            });

            // Pausar todos los reproductores cuando se hace clic fuera
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.play-button') && !e.target.closest('.carousel-control') && !e.target.closest('#radioPlayer')) {
                    document.querySelectorAll('.audio-player').forEach(player => {
                        player.pause();
                        const button = player.closest('.carousel-item').querySelector('.play-button');
                        if (button) {
                            button.querySelector('i').classList.replace('bi-pause-fill', 'bi-play-fill');
                        }
                    });
                }
            });
        });
    </script>
    
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-5.3.5/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>