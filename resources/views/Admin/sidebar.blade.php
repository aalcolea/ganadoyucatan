<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="description" content="GanadoYucatan">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Ganado Yucatan">
    <meta name="theme-color" content="#009688">
    <meta name="google-adsense-account" content="ca-pub-5420632641336498">
    <title>Ganado Yucatan </title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/static/css/admin/style-dashboard.css') }}">
    <!-- Material cdn -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <meta name="user-id" content="{{ auth()->id() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
</head>

<body>
    <div class="container">
        <!-- aside section start -->
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="{{url('/static/images/logoRojo.png')}}" alt="">
                    <h2 class="text-muted danger">Ganado Yucatán</h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{ url('/admin/products/home') }}" class="active">
                    <span class="material-symbols-sharp">store</span>
                    <h3>Tu tienda</h3>
                </a>
                <a href="https://ganadoyucatan.com/tienda">
                    <span class="material-symbols-sharp">grid_view</span>
                    <h3>Catalogo</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        group
                    </span>
                    <h3>Usuarios</h3>
                </a>
                <a href="{{ url('/admin/mensajes') }}">
                    <span class="material-symbols-sharp">
                        chat
                    </span>
                    <h3>Mensajes</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        logout
                    </span>
                    <h3>Cerrar sesión</h3>
                </a>
            </div>
        </aside>
        <!-- aside section end -->
        @section('main')
        @show

    </div>
    <script src="{{url('/static/js/admin/dashboard.js') }}"></script>
</body>
