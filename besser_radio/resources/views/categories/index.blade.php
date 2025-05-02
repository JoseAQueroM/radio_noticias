<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Categorías</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    @include('layouts.partials.header')

    <!-- Seccion principal -->
    <section class="image-categorias d-flex align-items-center text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-start">
                    <p class="text-uppercase small"></p>
                    <h1 class="fw-bold text-center">Categorías</h1>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido principal - UN SOLO contenedor principal -->
    <main class="flex-grow-1">
        <div class="container mt-5 pt-5">
            <!-- Encabezado mejorado -->
            <div class="text-center mb-5">
                <h1 class="fw-bold display-4 mb-3">Explora Nuestras Categorías</h1>
                <p class="lead text-muted">Descubre noticias organizadas por temas de tu interés</p>
                <div class="divider mx-auto" style="width: 100px; height: 4px; background: linear-gradient(to right, #0b1e67, #1e88e5);"></div>
            </div>

            <!-- Grid de categorías -->
            <div class="py-2 mb-5">
                <div class="row g-4">
                    @if ($categories->isNotEmpty())
                    @foreach ($categories as $category)
                    <div class="col-md-4">
                        <a href="{{ route('categories.show', $category->slug) }}" class="text-decoration-none">
                            <div class="categoria-card h-100">
                                @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" class="categoria-img" alt="{{ $category->name }}">
                                @else
                                <img src="https://via.placeholder.com/300x200?text=Sin+Imagen" class="categoria-img" alt="Sin Imagen">
                                @endif
                                <div class="categoria-titulo d-flex justify-content-between align-items-center p-3">
                                    <h5 class="mb-0 text-white">{{ $category->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-info-circle me-2"></i> No hay categorías disponibles en este momento.
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Footer - ahora se pegará abajo correctamente -->
    @include('layouts.partials.footer')

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-5.3.5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>