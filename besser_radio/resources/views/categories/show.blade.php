<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $category->name }}</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>



<body>

    @include('layouts.partials.header2')


    <!-- Noticias destacadas de la categoría -->
    <div class="container mt-4">
        <div class="row">
            <!-- Noticia principal (la más reciente) -->
            <div class="col-12 col-md-8">
                @if($categoryNews->count() > 0)
                @php $mainNews = $categoryNews->shift(); @endphp
                <div class="noticia-principal mb-2">
                    <a href="{{ route('news.show', $mainNews->slug) }}" class="text-decoration-none text-dark">
                        @if($mainNews->image)
                        <img src="{{ asset('storage/'.$mainNews->image) }}" alt="{{ $mainNews->title }}" class="w-100 h-100">
                        @else
                        <img src="https://via.placeholder.com/800x450?text=Noticia+Destacada" alt="Noticia destacada" class="w-100 h-100">
                        @endif
                        <div class="contenido">
                            <h5>{{ $mainNews->title }}</h5>
                            <small>
                                <i class="far fa-calendar-alt me-1"></i>
                                {{ $mainNews->publish_date->format('d/m/Y - h:i a') }}
                            </small>
                            <p class="mt-2">{{ Str::limit(strip_tags($mainNews->content), 150) }}</p>
                        </div>
                    </a>
                </div>
                @endif
            </div>

            <!-- Noticias secundarias (siguientes 2 noticias) -->
            <div class="col-12 col-md-4 d-flex flex-column gap-2">
                @foreach($categoryNews->take(2) as $news)
                <div class="noticia-secundaria">
                    <a href="{{ route('news.show', $news->slug) }}" class="text-decoration-none text-dark">
                        @if($news->image)
                        <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="w-100">
                        @else
                        <img src="https://via.placeholder.com/400x225?text=Noticia" alt="Noticia" class="w-100">
                        @endif
                        <div class="contenido">
                            <h6>{{ $news->title }}</h6>
                            <small>
                                <i class="far fa-calendar-alt me-1"></i>
                                {{ $news->publish_date->format('d/m/Y') }}
                            </small>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Noticias de la categoría (resto de las noticias) -->
    <div class="container news-container mt-3">
        <div class="category-header">
            <h1 class="section-title">{{ $category->name }}</h1>
            @if($category->description)
            <p class="lead mt-3">{{ $category->description }}</p>
            @endif
        </div>

        <div class="row">
            <!-- Columna principal para noticias (8 columnas) -->
            <div class="col-lg-8">
                @forelse($categoryNews as $news)
                <div class="main-news-card">
                    <div class="card-content">
                        <div class="row g-0">
                            <!-- Columna para la imagen -->
                            <div class="col-md-4 news-image-container">
                                @if($news->image)
                                <a href="{{ route('news.show', $news->slug) }}">
                                    <img src="{{ asset('storage/'.$news->image) }}" class="news-image" alt="{{ $news->title }}">
                                </a>
                                @endif
                            </div>

                            <!-- Columna para el contenido -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{ route('news.show', $news->slug) }}" class="text-decoration-none">
                                        <h5 class="card-title">{{ $news->title }}</h5>
                                    </a>
                                    <p class="news-meta">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ $news->publish_date->format('d M Y') }}
                                    </p>
                                    <p class="card-text">{{ Str::limit(strip_tags($news->content), 120) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-news-alert">
                    No hay noticias publicadas en esta categoría actualmente.
                </div>
                @endforelse
            </div>

            <!-- Columna lateral para noticias aleatorias (4 columnas) -->
            <div class="col-lg-4 othersNews-Container">
                <div class="sticky-top" style="top: 20px;">
                    <div class="sidebar-card">
                        <div class="card-header">
                            <h2 class="section-title">Te puede interesar</h2>
                        </div>
                        <div class="card-body">
                            @foreach($randomCategoryNews as $randomNews)
                            <a href="{{ route('news.show', $randomNews->slug) }}" class="text-decoration-none news-link">
                                <div class="sidebar-news-item">
                                    <div class="news-content">
                                        <h6 class="hover-primary">
                                            {{ $randomNews->title }}
                                            @if($randomNews->publish_date->gt(now()->subDays(3)))
                                            @endif
                                        </h6>
                                        <p class="news-meta">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $randomNews->publish_date->translatedFormat('Y | F d') }}

                                        </p>
                                        @if($randomNews->image)
                                        <img src="{{ asset('storage/'.$randomNews->image) }}" class="sidebar-news-image" alt="{{ $randomNews->title }}">
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
    <script src="{{ asset('vendor/bootstrap-5.3.5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>