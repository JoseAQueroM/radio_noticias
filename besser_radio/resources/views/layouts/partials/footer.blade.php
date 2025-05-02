
<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Primera columna (Logo y descripción) -->
            <div class="col-lg-3 col-md-6">
                <h2 class="footer-logo">{{ \App\Models\Post::first()->title_logo ?? 'Sin datos' }}</h2>
                <p class="footer-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            </div>

            <!-- Tercera columna (Características) -->
            <div class="col-lg-3 col-md-6">
                <h4 class="footer-title">Navegación</h4>
                <ul class="footer-list">
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    <li><a href="{{ route('news.index') }}">Noticias</a></li>
                    <li><a href="{{ route('categories.index') }}">Categorías</a></li>
                    <li><a href="{{ route('about') }}">Sobre nosotros</a></li>
                </ul>
            </div>

           <!-- Cuarta columna (Redes sociales) -->
            <div class="col-lg-3 col-md-6">
                <h4 class="footer-title">Redes sociales</h4>
                <div class="social-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>

        <!-- Línea de copyright -->
        <div class="footer-bottom">
            <p>{{ \App\Models\Post::first()->title_logo ?? 'Sin datos' }} · Copyright 2025 · Todos los derechos reservados</p>
            <a href="#">Política de privacidad</a>
            <a href="#">Términos y condiciones</a>
        </div>
    </div>
</footer>