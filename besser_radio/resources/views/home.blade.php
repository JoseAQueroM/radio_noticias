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
    /* Estilos principales */

    *{
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
    

    /* Efecto zoom para imágenes */
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

    /* Estilos específicos para la sección de noticias */
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

    /* Estilos para el carrusel principal */
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
    }

    .play-button:hover {
        background-color: #1ee062;
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

    /* Estilos para el carrusel de últimas noticias */
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

    /* Estilos responsive */
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

        /* Ajustes para carrusel principal en móviles */
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

        /* Ajustes para carrusel de últimas noticias en móviles */
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

        /* Estilos para los botones en móviles */
        #episodeCarousel .carousel-controls .btn {
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }

    /* Ajustes para pantallas medianas */
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

        <!-- Sección del carrusel principal (sin padding) -->
        <div id="carouselExampleCaptions" class="carousel slide full-width">
            <div class="carousel-inner">
                @foreach ($randomCarouselNews as $key => $newsItem)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ $newsItem->image ? asset('storage/' . $newsItem->image) : 'https://via.placeholder.com/1200x800?text=Sin+Imagen' }}" class="d-block w-100" alt="{{ $newsItem->title }}">
                    <div class="carousel-caption">
                        <p class="subtitle-new fw-bold">{{ $newsItem->category->name ?? 'Sin categoría' }}</p>
                        <h1 class="title-new px-3 fw-bold">{{ $newsItem->title }}</h1>
                        <p class="subtitle-new">{{ $newsItem->publish_date->isoFormat('Y | MMMM d') }}</p>
                        <div class="d-inline-flex align-items-center gap-2 play-button-wrapper">
                            <a class="play-button">
                                <i class="bi bi-play-fill"></i>
                            </a>
                            <span class="play-text fw-bold">Escuchar ahora</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if ($randomCarouselNews->count() > 1)


            <a class="carousel-control-prev me-3" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                <i class="bi bi-play-circle-fill" style="transform: rotate(180deg); font-size: 1.8rem;"></i>
            </a>
            <a class="carousel-control-next ms-3" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                <i class="bi bi-play-circle-fill" style="font-size: 1.8rem;"></i>
            </a>


            @endif
        </div>

        <!-- Sección de noticias (con padding) -->
        <section class="py-4 bg-white">
            <div class="container px-3 wide-container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold m-0 section-title">Últimas noticias</h2>
                    <div class="carousel-controls">
                        <button class="btn btn-outline-dark me-2 rounded-circle" type="button" data-bs-target="#episodeCarousel" data-bs-slide="prev">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="btn btn-outline-dark rounded-circle" type="button" data-bs-target="#episodeCarousel" data-bs-slide="next">
                            <i class="bi bi-chevron-right"></i>
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
                                                <small class="fw-bold text-uppercase text-success d-block mb-1">
                                                    {{ $newsItem->category->name ?? 'Sin Categoría' }}
                                                </small>
                                                <h6 class="fw-bold mb-1 fs-6">{{ $newsItem->title }}</h6>
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

        <!-- Sección de redes sociales (sin padding) -->
        <div class="social-section full-width">
            <h2 class="fw-bold text-center mb-4 title-social">Síguenos en nuestras redes:</h2>
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-4">
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

        <!-- Otras noticias (con padding) -->
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
                    <!-- Enlace que cubre imagen + texto -->
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

        <!-- Footer (sin padding) -->
        @include('layouts.partials.footer')
    </div>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-5.3.5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>