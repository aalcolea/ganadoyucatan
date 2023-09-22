<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/static/new/css/main.css')}}">
    <title>Ganado Yucatán Peninsular</title>
</head>
<body>
    <div class="page">
        <div class="container">
            <nav class="navbar">
                <div class="navbar__content_left">
                    <div class="img_container">
                        <img width="50" height="50" src="https://img.icons8.com/material-sharp/50/ffffff/youtube-play.png" alt="youtube-play"/>
                        <img width="50" height="50" src="https://img.icons8.com/windows/50/ffffff/facebook-f--v2.png" alt="facebook-f--v2"/>
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/ffffff/instagram-new--v1.png" alt="instagram-new--v1"/>
                    </div>
                </div>
                <div class="navbar__content_right">
                    <p onclick="location.href='/register'">Crear tu cuenta</p>
                    <p onclick="location.href='/login'">Ingresa</p>
                </div>
            </nav>
            <section class="logo-container">
                <img src="{{url('/static/new/Iconos/Isotipologotipo_1.png')}}" alt="">
            </section>
            <section class="menu-container">
                <div class="squareContainer">
                    <div class="left-part"></div>
                    <div class="middle-container">
                        <div class="square_tianguis" onclick="location.href='/tianguisTienda'">
                            <img class="slide-top" src="{{url('/static/new/Etiquetas/etiquetas-01.png')}}" alt="">
                            <p>Tianguis Ganadero</p>
                        </div>
                        <hr>
                        <div class="square genetico"  onclick="location.href='/tienda'">
                            <img class="slide-top" src="{{url('/static/new/Etiquetas/etiquetas-03.png')}}"alt="">
                            <P>Ganado genético</P>
                        </div>
                        <hr>
                        <div class="square subasta">
                            <img class="slide-top" src="{{url('/static/new/Etiquetas/etiquetas-02.png')}}" alt="">
                            <P>Subasta</P>
                        </div>
                        <hr>
                        <div class="square_noticias">
                            <P>Noticias</P>
                        </div>
                    </div>
                    <div class="right-part"></div>
                </div>
            </section>
            <section class="footer">
                <div class="footer-container">
                    <p>Bienvenido al mercado virtual de ganado</p>
                    <p onclick="location.href='/tianguis'" class="publicar">¡PUBLICA AQUÍ!</p>
                </div>
                <a href="https://api.whatsapp.com/send?phone=TUNUMERO&text=Hola,%20quiero%20contactar%20contigo" class="whatsapp-fab" target="_blank">
                    <img width="256" height="256" src="https://img.icons8.com/windows/256/ffffff/whatsapp--v1.png" alt="whatsapp--v1"/>                
                </a>
            </section>
        </section>
    </div>
    <script>
        window.addEventListener('load', function(){
            document.getElementById('page').style.opacity = 1;
        })

        document.addEventListener("DOMContentLoaded", function(){
            const logoContainer = document.querySelector(".logo-container");
            const menuContainer = document.querySelector(".menu-container");
        
            logoContainer.classList.add("show");
            menuContainer.classList.add("show");
        })
    </script>
</body>
</html>