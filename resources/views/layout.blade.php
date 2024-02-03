<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/static/new/css/main.css')}}">
    <link rel="stylesheet" href="{{url('/static/new/css/responsive.css')}}">
    <link rel="stylesheet" href="{{url('/static/js/admin/location.js')}}">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <meta name="description" content="¡Todo lo relacionado con la ganadería, bovinos y ranchos, todos en ganadoyucatan.com">
    <meta name="keywords" content="ganaderia, bovinos, yucatan">
    <meta property="og:description" content="Todo lo relacionado con la ganadería, bovinos y ranchos, todos en ganadoyucatan.com.">
    <meta property="og:title" content="ganado yucatan">
    <meta property="og:site_name" content="ganado yucatan">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ganadoyucatan.com">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Spanish">
    <meta name="author" content="Ganado Yucatan">
    <link rel="icon" type="image/png" href="{{url('/static/images/logo.png')}}"/>
    <title>@yield('title') Ganado Yucatan</title>
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
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5420632641336498"
     crossorigin="anonymous"></script>
</body>
</html>
