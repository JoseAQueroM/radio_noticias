@php
$post = App\Models\Post::first();
$title = $post?->title_home;
$logo = $post?->title_logo ? asset('storage/' . $post->title_logo) : null;
$subtitle = $post?->subtitle_home;
@endphp

<style>
    .footer-custom {
        background-color: #293036;
        color: #fff;
    }

    .footer-top-line {
        background-color: #1db954;
        height: 4px;
    }

    .footer-header {
        position: relative;
        padding-bottom: 0.5rem;
    }

    .footer-header::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 1px;
        background-color: #1db954;
        border-radius: 2px;
    }

    .footer-link {
        text-decoration: none;
        color: #fff;
        transition: color 0.4s ease;
    }

    .footer-link:hover {
        color: #1db954;
    }

    .footer-social-icon {
        text-decoration: none;
        color: #ccc;
        font-size: 1.2rem;
        transition: color 0.2s ease;
    }

    .footer-social-icon:hover {
        color: #1db954;
    }

    .footer-bottom-link {
        text-decoration: none;
        color: #999;
        transition: color 0.2s ease;
        font-size: 0.9rem;
    }

    .footer-bottom-link:hover {
        color: #1db954;
    }

    .btnFind-footer{
        background-color:#1db954;
        transition: .4s ease;
        color: white;
    }

    .btnFind-footer:hover {
        background-color:rgb(30, 206, 92); 
    }

    /* Responsive ajustes para footer inferior */
    @media (max-width: 767.98px) {
        .footer-bottom .col-12:first-child {
            text-align: center !important;
            margin-top: 15px;
        }
    }
</style>

<footer class="footer-custom">
    <div class="footer-top-line"></div>

    <div class="container py-5">
        <div class="row gy-4">
            <div class="col-12 col-md-3">
                @if ($title || $logo)
                <div class="d-flex align-items-center gap-2 mb-3">
                    @if ($logo)
                    <img src="{{ $logo }}" alt="Logo" style="height: 40px; width: auto;">
                    @endif
                    @if ($title)
                    <h3 class="fw-bold text-white mb-0">{{ $title }}</h3>
                    @endif
                </div>
                @endif

                @if ($subtitle)
                <p class="small mb-4">{{ $subtitle }}</p>
                @endif

                <a href="#" class="btn btnFind-footer px-4 fw-semibold">
                    Find Out More
                </a>
            </div>

            <div class="col-12 col-md-3">
                <h5 class="text-white mb-3 footer-header">Examples</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="footer-link">Spotify</a></li>
                    <li class="mb-2"><a href="#" class="footer-link">SoundCloud</a></li>
                    <li class="mb-2"><a href="#" class="footer-link">Mixcloud</a></li>
                    <li class="mb-2"><a href="#" class="footer-link">Buzzsprout</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-3">
                <h5 class="text-white mb-3 footer-header">Features</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="footer-link">Contact</a></li>
                    <li class="mb-2"><a href="#" class="footer-link">Custom widgets</a></li>
                    <li class="mb-2"><a href="#" class="footer-link">Shortcodes</a></li>
                    <li class="mb-2"><a href="#" class="footer-link">Blank page</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-3">
                <h5 class="text-white mb-3 footer-header">Follow me</h5>
                <p class="small">
                    I am always working on something new and exciting, so make sure to be the first to know!
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="footer-social-icon"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="footer-social-icon"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="footer-social-icon"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="footer-social-icon"><i class="bi bi-pinterest"></i></a>
                </div>
            </div>
        </div>

        <hr class="border-secondary my-3">

        <div class="row footer-bottom">
            <div class="col-12 col-md-6 small text-md-start text-center">
                Created by *********. Copyright © 2025 - All rights reserved
            </div>
            <div class="col-12 col-md-6 text-md-end text-center">
                <a href="#" class="footer-bottom-link me-3">Privacy policy</a>
                <a href="#" class="footer-bottom-link">Terms &amp; conditions</a>
            </div>
        </div>
    </div>
</footer>