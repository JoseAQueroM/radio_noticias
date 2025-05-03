<header>
    <nav class="navbar navbar-expand-lg navbar-dark px-4 position-absolute top-0 start-0 w-100" style="z-index: 10;">
        <div class="container-fluid">
            <!-- Logo alineado a la izquierda (fuera del navbar-collapse) -->
           

            <!-- Botón del toggler (se alinea a la derecha en móvil) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú colapsable (centrado) -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">  <!-- mx-auto centra el menú -->
                    <li class="nav-item"><a class="nav-link text-white fw-bold" href="{{ route('home') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-bold" href="{{ route('news.index') }}">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-bold" href="{{ route('categories.index') }}">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-bold" href="{{ route('about') }}">Sobre Nosotros</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

