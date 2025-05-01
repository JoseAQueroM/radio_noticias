document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle');
    const body = document.body;

    // Verificar preferencia del usuario
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
        themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
    }

    // Alternar tema
    themeToggle.addEventListener('click', function() {
        body.classList.toggle('dark-mode');
        const isDark = body.classList.contains('dark-mode');
        
        if (isDark) {
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
            localStorage.setItem('theme', 'dark');
        } else {
            themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
            localStorage.setItem('theme', 'light');
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

