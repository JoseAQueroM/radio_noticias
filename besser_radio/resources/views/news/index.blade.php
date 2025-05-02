<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>

    @include('layouts.partials.header')

    <!-- Seccion principal -->
    <section class="image-noticias d-flex align-items-center text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-start">
                    <p class="text-uppercase small"></p>
                    <h1 class="fw-bold text-center">Noticias</h1>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="container pt-5">
        <h2 class="fw-bold m-0 mb-3" style="border-bottom: 4px solid #0b1e67; display: inline-block;">Todas las Noticias</h2>

        <div class="news-block">
            @if ($allNews->isNotEmpty())
            @php
            $chunks = $allNews->chunk(3);
            @endphp

            @foreach ($chunks as $chunk)
            <div class="row mb-4">
                @if ($chunk->isNotEmpty())
                <div class="col-md-8">
                    @php
                    $firstInChunk = $chunk->first();
                    @endphp
                    <div class="left-show position-relative">
                        <a href="{{ route('news.show', $firstInChunk->slug) }}" class="stretched-link"></a>
                        @if ($firstInChunk->image)
                        <img src="{{ asset('storage/' . $firstInChunk->image) }}" class="img-fluid rounded" alt="{{ $firstInChunk->title }}">
                        @else
                        <img src="https://via.placeholder.com/500x250?text=Sin+Imagen" class="img-fluid rounded" alt="Sin Imagen">
                        @endif
                        <div class="left-info">
                            <div class="show-title-principal">{{ $firstInChunk->title }}</div>
                            <div class="episode-count-principal">{{ $firstInChunk->category->name ?? 'Sin Categoría' }}</div>
                            <div class="show-description">
                                {{ Str::limit($firstInChunk->content, 200, '...') }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-md-4">
                    @if ($chunk->count() > 1)
                    @foreach ($chunk->skip(1)->take(3) as $newsItem)
                    <div class="right-show-small mb-3 position-relative">
                        <a href="{{ route('news.show', $newsItem->slug) }}" class="stretched-link"></a>
                        <div class="d-flex">
                            @if ($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" class="img-fluid rounded me-3" alt="{{ $newsItem->title }}" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                            <img src="https://via.placeholder.com/500x150?text=Sin+Imagen" class="img-fluid rounded me-3" alt="Sin Imagen" style="width: 100px; height: 100px; object-fit: cover;">
                            @endif
                            <div class="small-info">
                                <div class="show-title">{{ $newsItem->category->name ?? 'Sin Categoría' }}</div>
                                <div class="episode-count">{{ Str::limit($newsItem->title, 50, '...') }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            @endforeach

            @else
            <p>No hay noticias para mostrar.</p>
            @endif
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h2 class="footer-logo">Besser</h2>
                    <p class="footer-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="footer-title">Features</h4>
                    <ul class="footer-list">
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Custom Widgets</a></li>
                        <li><a href="#">Shortcodes</a></li>
                        <li><a href="#">Blank Page</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="footer-title">Redes sociales</h4>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>Besser Solutions · Copyright 2025 · Todos los derechos reservados</p>
                <a href="#">Política de privacidad</a>
                <a href="#">Términos y condiciones</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>