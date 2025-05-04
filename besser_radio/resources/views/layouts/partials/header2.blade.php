@php
$post = App\Models\Post::first();
$logo = $post?->title_logo ? asset('storage/' . $post->title_logo) : null;
$title = $post?->title_home;
$categories = App\Models\Category::orderBy('name')->get();
@endphp

<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        font-family: "PT Sans", sans-serif !important;
    }

    body {
        padding-top: 90px;
    }

    .main-head {
        width: 100%;
        height: 92px;
        position: fixed;
        top: 0;
        left: 0;
        background: #293036;
        z-index: 9999;
        transition: all 0.3s ease-in-out;
    }

    .main-head.slidedown {
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .navbar {
        height: 100%;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        position: absolute;
        left: 60px;
    }

    .logo-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-container img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    .title-home {
        color: #fff;
        transition: color 0.3s ease;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .main-head.slidedown .title-home {
        color: #000;
    }

    .nav-link {
        text-decoration: none;
        color: #fff !important;
        font-family: 'Montserrat', sans-serif;
        font-size: 15px;
        transition: color 0.3s ease;
        font-weight: bold;
        padding: 0.5rem 1rem !important;
    }

    .main-head.slidedown .nav-link {
        color: #000 !important;
    }

    .navbar-toggler {
        border: 1px solid #fff;
        background-color: transparent;
        position: absolute;
        right: 20px;
    }

    .main-head.slidedown .navbar-toggler {
        border: 1px solid #293036;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        transition: all 0.3s ease;
    }

    .main-head.slidedown .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    #navbarNav {
        justify-content: center;
    }

    /* Estilos del dropdown */
    .dropdown-menu {
        background-color: #293036;
        border: none;
        border-radius: 0;
        display: block;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        transform: translateY(10px);
    }

    .main-head.slidedown .dropdown-menu {
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .dropdown:hover .dropdown-menu,
    .dropdown:focus-within .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        color: #fff !important;
        padding: 0.5rem 1.5rem;
        font-weight: bold;
        font-size: 14px;
    }

    .main-head.slidedown .dropdown-item {
        color: #000 !important;
    }

    .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .main-head.slidedown .dropdown-item:hover {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .dropdown-toggle::after {
        display: inline-block;
        margin-left: 0.255em;
        vertical-align: 0.255em;
        content: "";
        border-top: 0.3em solid;
        border-right: 0.3em solid transparent;
        border-bottom: 0;
        border-left: 0.3em solid transparent;
        color: #fff;
        transition: all 0.3s ease;
    }

    .main-head.slidedown .dropdown-toggle::after {
        color: #000;
    }

          
    .custom-toggler {
        display: flex;
        align-items: center;
        cursor: pointer;
        position: absolute;
        right: 20px;
        z-index: 10000;
    }

    .toggle-text {
        color: #fff;
        font-weight: bold;
        margin-right: 10px;
        font-size: 1rem;
    }

    .main-head.slidedown .toggle-text {
        color: #000;
    }

    .toggle-icon {
        width: 22px;
        height: 16px;
        position: relative;
    }

    .toggle-icon::before,
    .toggle-icon::after,
    .toggle-icon span {
        content: "";
        position: absolute;
        height: 2px;
        background-color: #fff;
        width: 100%;
        left: 0;
        transition: background-color 0.3s;
    }

    .toggle-icon::before {
        top: 0;
    }

    .toggle-icon span {
        top: 6px;
    }

    .toggle-icon::after {
        top: 12px;
    }

    .main-head.slidedown .toggle-icon::before,
    .main-head.slidedown .toggle-icon::after,
    .main-head.slidedown .toggle-icon span {
        background-color: #000;
    }

    @media (min-width: 992px) {
        .custom-toggler {
            display: none;
        }
    
    }

    @media (max-width: 991.98px) {
        .navbar-brand {
            position: static;
        }

        .navbar-toggler {
            position: static;
        }

        .navbar-toggler:focus,
        .navbar-toggler:active {
            outline: none;
            box-shadow: none;
        }

        .navbar-collapse {
            position: absolute;
            top: 90px;
            left: 0;
            width: 100%;
            background: #293036;
            transition: height 0.3s ease;
            text-align: center;
            height: 0;
            overflow: hidden;
        }

        .navbar-collapse.show {
            height: auto;
        }

        .main-head.slidedown .navbar-collapse {
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .nav-item {
            margin: 10px 0;
        }

        #navbarNav {
            justify-content: flex-start;
        }

        .navbar-nav {
            justify-content: flex-start !important;
            text-align: left;
        }

        .dropdown-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.3s ease;
            background-color: transparent !important;
            box-shadow: none !important;
            padding-left: 20px;
            padding-top: 0;
            padding-bottom: 0;
        }

        .dropdown.show .dropdown-menu {
            max-height: 500px; 
            padding-top: 10px;
            padding-bottom: 10px;
        }

  
 }
</style>

<header class="main-head">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="logo-container">
                    @if ($logo)
                    <img src="{{ $logo }}" alt="Logo">
                    @endif

                    @if ($title)
                    <span class="title-home">{{ $title }}</span>
                    @endif

                    @if (!$logo && !$title)
                    <span class="title-home">Título por defecto</span>
                    @endif
                </div>
            </a>
            <div class="custom-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggle-text">Menu</span>
                <span class="toggle-icon"></span>            
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-lg-auto me-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.index') }}">Noticias</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorías
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Sobre nosotros</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    // Animación del navbar al hacer scroll
    const mainMenu = document.querySelector('.main-head');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            mainMenu.classList.add("slidedown");
        } else {
            mainMenu.classList.remove("slidedown");
        }
    });

    // Control del dropdown en móvil
    document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 991.98) {
                e.preventDefault();
                const dropdown = this.closest('.dropdown');
                dropdown.classList.toggle('show');
            }
        });
    });

    // Cerrar dropdown al hacer click fuera
    document.addEventListener('click', function(e) {
        if (!e.target.matches('.dropdown, .dropdown *')) {
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    });
</script>