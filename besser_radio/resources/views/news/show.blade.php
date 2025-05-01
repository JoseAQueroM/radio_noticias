<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $newsItem->title }} - Mi Sitio de Noticias</title>
</head>
<body>
    <a href="{{ route('home') }}">Volver a la lista de noticias</a>

    <h1>{{ $newsItem->title }}</h1>

    <p>Publicado el {{ $newsItem->publish_date->format('d/m/Y H:i') }} en <a href="{{ route('category.show', $newsItem->category->slug) }}">{{ $newsItem->category->name }}</a></p>

    @if ($newsItem->image)
        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" style="max-width: 600px; margin-bottom: 20px;">
    @endif

    <div class="news-content">
        {!! $newsItem->content !!} {{-- Usamos !! para renderizar HTML si lo hay --}}
    </div>
</body>
</html>