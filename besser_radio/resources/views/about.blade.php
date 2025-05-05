<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sobre Nosotros</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    <style>
        .section {
            padding: 4rem 1rem;
        }

        .section:nth-of-type(even) {
            background-color: #f8f9fa;
        }

        .section-icon {
            font-size: 3rem;
            color:#1DB954;
            margin-bottom: 1rem;
        }

  
        .section-title::after {
            content: '';
            width: 60px;
            height: 4px;
            background-color:#1DB954;
            display: block;
            margin: 8px auto 0;
        }

        .section p {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            color: #555;
        }
    </style>

    </style>
</head>

<body>

    @include('layouts.partials.header2')

    <div class="section text-center">
        <div class="container">
            <div class="section-icon mt-3"><i class="bi bi-book"></i></div>
            <h2 class="section-title mt-1">Nuestra Historia</h2>
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, voluptatibus facilis quaerat veritatis sed tempore. Voluptatibus consequuntur, molestiae, quod repudiandae commodi repellendus quidem, id soluta praesentium officia neque sed itaque!</p>
        </div>
    </div>

    <div class="section text-center">
        <div class="container">
            <div class="section-icon mt-3"><i class="bi bi-bullseye"></i></div>
            <h2 class="section-title mt-1">Nuestra Misión</h2>
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias saepe laborum incidunt, iure ex enim est, reprehenderit ipsa quia magni debitis quo in qui iste animi voluptates quasi officia voluptate.</p>
        </div>
    </div>

    <div class="section text-center">
        <div class="container">
            <div class="section-icon mt-3"><i class="bi bi-people"></i></div>
            <h2 class="section-title mt-1">Nuestro Equipo</h2>
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quisquam quasi veniam, illo necessitatibus accusantium nesciunt dolorem sapiente voluptatum maiores dolorum repellendus cupiditate, porro natus, quia numquam quae atque officia!</p>
        </div>
    </div>

    @include('layouts.partials.footer')

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-5.3.5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>