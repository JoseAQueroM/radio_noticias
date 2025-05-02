<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Titulo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.5/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    @include('layouts.partials.header')

    <!-- Seccion principal -->
    <section class="image-home d-flex align-items-center text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-start">
                    <p class="text-uppercase small"></p>
                    <h1 class="fw-bold">{{ $post->title_home }}</h1>
                    <p class="lead">
                    {{ $post->subtitle_home }}
                    </p>
                    <a href="#" class="btn play-button">
                        <i class="bi bi-play-fill ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold m-0" style="border-bottom: 4px solid #0b1e67; display: inline-block;">Últimas noticias</h2>
            <div>
                <button class="btn btn-outline-dark me-2 rounded-circle" type="button" data-bs-target="#episodeCarousel" data-bs-slide="prev">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="btn btn-outline-dark rounded-circle" type="button" data-bs-target="#episodeCarousel" data-bs-slide="next">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <div id="episodeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($newsChunks as $key => $chunk)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <div class="row g-3">
                        @foreach ($chunk as $newsItem)
                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('news.show', $newsItem->slug) }}" class="text-decoration-none card-hover-effect">
                                <div class="card border-0 h-100">
                                    <div class="position-relative">
                                        @if ($newsItem->image)
                                        <img src="{{ asset('storage/' . $newsItem->image) }}" class="card-img-top rounded" alt="{{ $newsItem->title }}" style="object-fit: cover; height: 200px;">
                                        @else
                                        <img src="https://via.placeholder.com/500x250?text=Sin+Imagen" class="card-img-top rounded" alt="Sin Imagen" style="object-fit: cover; height: 200px;">
                                        @endif
                                    </div>
                                    <div class="card-body text-dark">
                                        <small class="last-title fw-bold text-uppercase"><i class=""></i>{{ $newsItem->category->name ?? 'Sin Categoría' }}</small>
                                        <h6 class="fw-bold mt-2">{{ $newsItem->title }}</h6>
                                        <p class="card-text">{{ Str::limit($newsItem->content, 50, '...') }}</p>
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

    <!-- Redes sociales (Fondo completo y centrado) -->
    <div class="container-fluid my-5 social-section">
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
        </div>
    </div>

    <!-- Mas noticias -->
    <div class="container">
        <h2 class="fw-bold m-0 mb-3" style="border-bottom: 4px solid #0b1e67; display: inline-block;">Otras noticias</h2>
        <a href="{{ route('news.index') }}" class="view-all mb-5">Mostrar todas las noticias</a>

        <div class="news-block">
            <div class="row">
                <div class="col-md-8">
                    <div class="left-show">
                        @if ($leftNews)
                        <a href="{{ route('news.show', $leftNews->slug) }}">
                            <img src="{{ $leftNews->image ? asset('storage/' . $leftNews->image) : 'https://via.placeholder.com/500x250?text=Sin+Imagen' }}" class="img-fluid rounded" alt="{{ $leftNews->title }}">
                        </a>
                        <div class="left-info">
                            <a href="{{ route('news.show', $leftNews->slug) }}" class="text-decoration-none text-dark">
                                <div class="show-title-principal">{{ $leftNews->title }}</div>
                                <div class="episode-count-principal">{{ $leftNews->category->name ?? 'Sin Categoría' }}</div>
                                <div class="show-description">
                                    {{ Str::limit($leftNews->content, 200, '...') }}
                                </div>
                            </a>
                        </div>
                        @else
                        <p>No hay noticias para mostrar aquí.</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    @if ($rightNews->count() > 0)
                    @foreach ($rightNews as $newsItem)
                    <div class="right-show-small">
                        <a href="{{ route('news.show', $newsItem->slug) }}" class="d-flex text-decoration-none text-dark">
                            <img src="{{ $newsItem->image ? asset('storage/' . $newsItem->image) : 'https://via.placeholder.com/500x250?text=Sin+Imagen' }}" class="img-fluid rounded" alt="{{ $newsItem->title }}" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="small-info ms-3">
                                <div class="show-title">{{ $newsItem->category->name ?? 'Sin Categoría' }}</div>
                                <div class="episode-count">{{ Str::limit($newsItem->title, 50, '...') }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <p>No hay suficientes noticias para mostrar aquí.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.footer')


    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="{{ asset('vendor/bootstrap-5.3.5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>