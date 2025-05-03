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
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
</head>

<style>
    /* SOLUCIÓN PARA EL ZOOM SIN PERDER BORDER-RADIUS */
    .zoom-image-container {
        display: block;
        overflow: hidden;
        border-radius: 0.375rem !important; /* Mantiene las esquinas redondeadas */
    }
    .zoom-image {
        transition: transform 0.3s ease;
        border-radius: inherit; /* Hereda el redondeo del contenedor */
    }
    .zoom-image-container:hover .zoom-image {
        transform: scale(1.05);
    }


    /* Añade esto al CSS existente */
    
</style>

<body>

    @include('layouts.partials.header2')

    <div class="container pt-5">
    <h2 class="fw-bold m-0 mb-3 section-title">Todas las Noticias</h2>

    <div class="news-block mt-3">
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
                <div class="left-show">
                    <!-- Enlace para la imagen - Ahora con contenedor de tamaño fijo -->
                    <a href="{{ route('news.show', $firstInChunk->slug) }}" class="zoom-image-container text-decoration-none d-block" style="width: 100%; height: 220px; overflow: hidden;">
                        @if ($firstInChunk->image)
                        <img src="{{ asset('storage/' . $firstInChunk->image) }}" 
                             class="img-fluid rounded zoom-image w-100 h-100" 
                             alt="{{ $firstInChunk->title }}"
                             >
                        @else
                        <img src="https://via.placeholder.com/800x400?text=Sin+Imagen" 
                             class="img-fluid rounded zoom-image w-100 h-100" 
                             alt="Sin Imagen"
                             style="object-fit: cover; transition: transform 0.3s ease;">
                        @endif
                    </a>

                    <!-- Contenido de texto con enlace en títulos -->
                    <div class="left-info">
                        <a href="{{ route('news.show', $firstInChunk->slug) }}" class="text-decoration-none text-dark">
                            <div class="show-title-principal">{{ $firstInChunk->title }}</div>
                            <div class="episode-count-principal mt-1">{{ $firstInChunk->category->name ?? 'Sin Categoría' }}</div>
                        </a>
                        <div class="show-description mt-3">
                            {{ Str::limit($firstInChunk->content, 200, '...') }}
                        </div>
                    </div>
                </div>
            </div>
            @endif

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
                            <div class="episode-count">{{ Str::limit($newsItem->title, 100, '...') }}</div>
                        </div>
                    </a>
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

    @include('layouts.partials.footer')


    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>