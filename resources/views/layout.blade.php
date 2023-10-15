<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/static/new/css/main.css')}}">
    <link rel="stylesheet" href="{{url('/static/js/admin/location.js')}}">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>Ganado Yucatán Peninsular</title>
</head>
<body>
    @include('navbar')


    @yield('content')


    @include('footer')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuContainer = document.querySelector(".menu-container");
        const menuList = document.querySelector(".menu-list");
        const hamburgerMenu = document.querySelector(".hamburger-menu");

        // Toggle the menu when the hamburger icon is clicked
        hamburgerMenu.addEventListener("click", function () {
            menuContainer.classList.toggle("menu-open");
        });

        // Close the menu when a menu item is clicked
        menuList.addEventListener("click", function () {
            menuContainer.classList.remove("menu-open");
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".image");
    const points = document.querySelectorAll(".point");
    const prevButton = document.querySelector(".prev-button");
    const nextButton = document.querySelector(".next-button");
    let currentIndex = 0;

    // Función para mostrar la imagen activa y el punto activo
    function showSlide(index) {
        images.forEach((image, i) => {
            if (i == index) {
                image.style.display = "block";
            } else {
                image.style.display = "none";
            }
        });
        points.forEach((point, i) => {
            if (i === index) {
                point.classList.add("active");
            } else {
                point.classList.remove("active");
            }
        });
    }

    // Mostrar la primera imagen al cargar la página
    showSlide(currentIndex);

    // Botón "Prev" - retroceder a la imagen anterior
    prevButton.addEventListener("click", function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showSlide(currentIndex);
    });

    // Botón "Next" - avanzar a la siguiente imagen
    nextButton.addEventListener("click", function () {
        currentIndex = (currentIndex + 1) % images.length;
        showSlide(currentIndex);
    });

    // Hacer clic en los puntos para cambiar la imagen
    points.forEach((point, index) => {
        point.addEventListener("click", function () {
        currentIndex = index;
        showSlide(currentIndex);
        });
    });
    });
</script>
</body>
</html>
