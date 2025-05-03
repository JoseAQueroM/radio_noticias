<head>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

</head>

<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        font-family: "PT Sans", sans-serif !important;
    }

    body {
        padding-top: 45px;
        /* Evita que el contenido quede detrás del navbar */
    }

    .container {
        max-width: 1280px;
        margin: auto;
        padding: 0 20px;
    }

    .main-head {
        width: 100%;
        height: 54px;
        position: fixed;
        top: 0;
        left: 0;
        background: #293036;
        z-index: 9999;
        transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .main-head.slidedown {
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .main-menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 54px;
    }

    .logo {
        font-family: 'Work Sans', sans-serif;
        font-size: 40px;
        font-weight: 600;
        color: #fff;
    }

    .nav-menu .nav-list {
        display: flex;
        list-style-type: none;
        /* Elimina los puntos negros */
        padding: 0;
        margin: 0;
    }

    .nav-link {
        text-decoration: none;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        font-size: 15px;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #B53471;
    }

    .main-head.slidedown .nav-link,
    .main-head.slidedown .logo {
        color: #000;
    }

    .main-head.slidedown .nav-link {
        color: #000 !important;
    }

    .toggle-btn {
        display: flex;
        align-items: center;
        /* Centra el botón de menú */
    }
</style>
</head>

<body>
    <header class="main-head">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <nav class="navbar">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                        <img src="{{ asset('assets/img/logo.svg') }}" width="30" height="24" alt="Logo">                        </a>
                    </div>
                </nav>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('news.index') }}">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('categories.index') }}">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('about') }}">Sobre nosotros</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script>
        const mainMenu = document.querySelector('.main-head');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                mainMenu.classList.add("slidedown");
            } else {
                mainMenu.classList.remove("slidedown");
            }
        });


        if (scrollY < 50) {
            navbar.style.opacity = '1';
        } else if (scrollY > 200 && scrollY > lastScrollY) {
            navbar.style.opacity = '0';
            navbar.style.pointerEvents = 'none';
        } else {
            navbar.style.opacity = '1';
            navbar.style.pointerEvents = 'auto';
        }
        lastScrollY = scrollY;
    </script>

</body>

</html>