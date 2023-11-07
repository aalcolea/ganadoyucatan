<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/static/new/css/main.css')}}">
    <link rel="stylesheet" href="{{url('/static/new/css/responsive.css')}}">
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
        const closeMenu = document.querySelector(".close-menu");
        const hamburgerMenu = document.querySelector(".hamburger-menu");

        // Toggle the menu when the hamburger icon is clicked
        hamburgerMenu.addEventListener("click", function () {
            menuContainer.classList.toggle("menu-open");
        });

        // Close the menu when a menu item is clicked
        closeMenu.addEventListener("click", function () {
            menuContainer.classList.remove("menu-open");
        });
    });
</script>
</body>
</html>
