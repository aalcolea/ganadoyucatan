<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/static/new/css/main.css')}}">
    <title>Ganado Yucatán Peninsular</title>
</head>
<body>
    @include('navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('footer') <!-- Incluye el footer en todas las páginas -->
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
</body>
</html>
