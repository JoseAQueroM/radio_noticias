<header>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark px-4 position-absolute top-0 start-0 w-100" style="z-index: 10;">
        <a class="navbar-brand" href="#"><strong>{{ \App\Models\Post::first()->title_logo ?? 'Sin datos' }}</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-3">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Inicio</a></li>        
            <li class="nav-item"><a class="nav-link" href="{{ route('news.index') }}">Noticias</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categorías</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Sobre Nosotros</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Entrar</a></li>

        </ul>
        </div>
    </nav>
   </header>