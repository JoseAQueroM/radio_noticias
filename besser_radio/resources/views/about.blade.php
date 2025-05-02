<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sobre nosotros</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    
@include('layouts.partials.header')

<!-- Seccion principal -->
<section class="image-sobrenosotros d-flex align-items-center text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-start">
                    <p class="text-uppercase small"></p>
                    <h1 class="fw-bold text-center">Sobre nosotros</h1>
                    </p>
                </div>
            </div>
        </div>
    </section>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            
            <div class="mb-5">
                <h2 class="mb-3" style="border-bottom: 4px solid #0b1e67; display: inline-block;">Nuestra Historia</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, voluptatibus facilis quaerat veritatis sed tempore. Voluptatibus consequuntur, molestiae, quod repudiandae commodi repellendus quidem, id soluta praesentium officia neque sed itaque!</p>
            </div>
            
            <div class="mb-5">
                <h2 class="mb-3" style="border-bottom: 4px solid #0b1e67; display: inline-block;">Nuestra Misión</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias saepe laborum incidunt, iure ex enim est, reprehenderit ipsa quia magni debitis quo in qui iste animi voluptates quasi officia voluptate..</p>
            </div>
            
            <div class="mb-5">
                <h2 class="mb-3" style="border-bottom: 4px solid #0b1e67; display: inline-block;">Nuestro Equipo</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quisquam quasi veniam, illo necessitatibus accusantium nesciunt dolorem sapiente voluptatum maiores dolorum repellendus cupiditate, porro natus, quia numquam quae atque officia!.</p>
            </div>
            
        </div>
    </div>
</div>



@include('layouts.partials.footer')
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-5.3.5/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>