<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $newsItem->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

</head>

<body>


    @include('layouts.partials.header2')

    <div class="container mt-4 mb-5">
        <div class="row">
            <!-- Contenido principal -->
            <div class="col-lg-8">
                <p class="fecha-publicacion">
                    Publicado el {{ $newsItem->publish_date->format('d/m/Y') }} a las {{ $newsItem->publish_date->format('h:i a') }}
                    <span class="seccion">| {{ $newsItem->category->name }}</span>
                </p>
                <h2 class="fw-bold">{{ $newsItem->title }}</h2>
                <p class="text-muted">{{ $newsItem->excerpt }}</p>

                @if($newsItem->image)
                <img src="{{ asset('storage/' . $newsItem->image) }}"
                    alt="{{ $newsItem->title }}"
                    class="img-fluid rounded mt-3 mb-1 mx-auto d-block"
                    style="max-height: 500px; width: auto;"> 
                @if($newsItem->image_credits)
                <p class="foto-creditos">{{ $newsItem->image_credits }}</p>
                @endif
                @else
                No hay imagen disponible para esta noticia.
                @endif

                <div class="news-content mt-3">
                {!! nl2br(e($newsItem->content)) !!}
                </div>

                <div class="container my-4">
                    @if($relatedNews->count() > 0)
                    <h3 class="mb-4 section-title">Noticias relacionadas</h3>
                    <div class="row g-3 mt-1">
                        @foreach($relatedNews as $related)
                        <div class="col-md-4">
                            <a href="{{ route('news.show', $related->slug) }}" class="card-link">
                                <div class="noticia-card">
                                    <img src="{{ asset('storage/'.$related->image) }}" alt="{{ $related->title }}" class="card-img-top">
                                    <div class="noticia-overlay">
                                        <div class="categoria">{{ $related->category->name }}</div>
                                        <div class="titulo">
                                            {{ $related->title }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

            </div>

            <!-- Columna lateral para noticias aleatorias (4 columnas) -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 20px;">
                    <div class="sidebar-card">
                        <div class="card-header">
                            <h2 class="section-title">Te puede interesar</h2>
                        </div>
                        <div class="card-body">
                            @foreach($randomNews as $news)
                            <a href="{{ route('news.show', $news->slug) }}" class="text-decoration-none news-link">
                                <div class="sidebar-news-item">
                                    <div class="news-content">
                                        <h6 class="hover-primary">
                                            {{ $news->title }}
                                            @if($news->publish_date->gt(now()->subDays(3)))
                                            @endif
                                        </h6>
                                        <p class="news-meta">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $news->publish_date->translatedFormat('Y | F d') }}
                                        </p>
                                        @if($news->image)
                                        <img src="{{ asset('storage/'.$news->image) }}" class="sidebar-news-image" alt="{{ $news->title }}">
                                        @endif
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.footer')

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>