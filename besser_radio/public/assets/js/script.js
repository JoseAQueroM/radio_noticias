document.addEventListener('DOMContentLoaded', function() {
    const playButton = document.getElementById('play-radio-button');
    const audioElement = document.getElementById('radio-audio');
    let isPlaying = false;

    playButton.addEventListener('click', function(event) {
        event.preventDefault(); // Evita que el enlace "#" recargue la página

        if (isPlaying) {
            audioElement.pause();
            isPlaying = false;
            // Aquí puedes cambiar el icono del botón a "play" si lo deseas
            playButton.innerHTML = '<i class="bi bi-play-fill ms-1"></i>';
        } else {
            audioElement.play();
            isPlaying = true;
            // Aquí puedes cambiar el icono del botón a "pause" si lo deseas
            playButton.innerHTML = '<i class="bi bi-pause-fill ms-1"></i>';
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.querySelector(".navbar");
        const navbarToggler = document.querySelector(".navbar-toggler");

        navbarToggler.addEventListener("click", function () {
            navbar.classList.toggle("show-bg"); // Agrega la clase cuando se expande el menú
        });
});


document.addEventListener("DOMContentLoaded", function() {
    const navbar = document.getElementById("mainNavbar");
    const header = document.querySelector(".custom-header");

    window.addEventListener("scroll", function() {
        if (window.scrollY > 50) { // Si el scroll supera 50px
            navbar.classList.add("scrolled");
            header.style.height = "80px"; // Reduce el espacio del header
        } else {
            navbar.classList.remove("scrolled");
            header.style.height = "120px"; // Vuelve a la altura original
        }
    });
});

