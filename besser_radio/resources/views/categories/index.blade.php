<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Besser Podcast - Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>
<body>

   @include('layouts.partials.header')

   <!-- Seccion principal -->
   <section class="image-categorias d-flex align-items-center text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12 text-start">
          <p class="text-uppercase small"></p>
          <h1 class="fw-bold text-center">Categorias</h1>
          </p>
        </div>
      </div>
    </div>
  </section>


  <div class="container mt-5 pt-5">
    <!-- Encabezado mejorado -->
    <div class="text-center mb-5">
        <h1 class="fw-bold display-4 mb-3" style="color: #0b1e67;">Explora Nuestras Categorías</h1>
        <p class="lead text-muted">Descubre noticias organizadas por temas de tu interés</p>
        <div class="divider mx-auto" style="width: 100px; height: 4px; background: linear-gradient(to right, #0b1e67, #1e88e5);"></div>
    </div>

    <!-- Grid de categorías mejorado -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @if ($categories->isNotEmpty())
            @foreach ($categories as $category)
                <div class="col">
                    <div class="card h-100 border-0 shadow-hover">
                        <!-- Imagen con efecto hover -->
                        <div class="overflow-hidden" style="height: 200px;">
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" 
                                     class="card-img-top h-100 w-100 object-cover transition-scale">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=Sin+Imagen" alt="Sin Imagen" 
                                     class="card-img-top h-100 w-100 object-cover transition-scale">
                            @endif
                        </div>
                        
                        <!-- Contenido de la tarjeta -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('category.show', $category->slug) }}" 
                                       class="text-decoration-none text-dark fw-bold hover-primary">
                                        {{ $category->name }}
                                    </a>
                                </h5>
                                <span class="badge rounded-pill bg-primary">
                                    {{ $category->news_count }} {{ Str::plural('Noticia', $category->news_count) }}
                                </span>
                            </div>
                            
                            <p class="card-text text-muted mb-3">
                                {{ $category->description ? Str::limit($category->description, 100, '...') : 'Sin descripción.' }}
                            </p>
                            
                            <a href="{{ route('category.show', $category->slug) }}" 
                               class="btn btn-primary rounded-pill px-4">
                                Ver Noticias
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
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
    <footer class="footer mt-5">
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