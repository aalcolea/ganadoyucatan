@extends('header')
<link rel="stylesheet" type="text/css" href="{{url('/static/css/styleHome.css') }}">
 <title>La plataforma ganadera de la península de Yucatán||Ganado Yucatán</title>

      <script>
document.addEventListener("DOMContentLoaded", function() {
  const hamburgerMenu = document.querySelector('.hamburger_menu');
  const mobileMenu = document.querySelector('.mobile-menu__content');

  hamburgerMenu.addEventListener('click', () => {
    mobileMenu.classList.toggle('show');
  });
});
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "103382925587438");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

  </script>
  <style>
      .mobile-menu__content {
    display: none;
}

.mobile-menu__content.show {
    display: block;
}
  </style>
</head>
<body>
    <!-- Messenger Plugin de chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin de chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <div class="page">
        <!-- main content -->
        <section class="containers">
            <nav class="navbars">
                <div class="mobile__back"> 
                    <img class="hamburger_menu" src="https://img.icons8.com/color/48/000000/menu--v1.png"/>
                </div>
                <div class="mobile-menu__content ">
                    <ul>
                        <!--<li><a href="https://www.ganadoyucatan.com/Paquetes.html">Paquetes</a></li>
                        <li><a href="https://ganadoyucatan.com/tienda_virtual/nosotros">Nosotros</a></li>
                        <li><a href="https://ganadoyucatan.com/tienda_virtual/contacto">Contacto</a></li>-->
                        <li><a href="{{url('/register')}}">Registrarse</a></li>
                        <li><a href="{{url('/login')}}">Iniciar Sesión</a></li>
                    </ul>
                </div>
                <div class="navbars__content">
                    <img src="./assets/img/logo.png" alt="">
                    <ul>
                        <li><a href="{{url('/register')}}">Registrarse</a></li>
                        <li><a href="{{url('/login')}}">Iniciar sesión</a></li>    
                    </ul>
                </div>
            </nav>

            <section class="main-content">
                <p>Conoce la plataforma ganadera de la península</p>
                <h1>Ganado Yucatán</h1>
                <p class="p">Los beneficios de la tecnologia, al servicio del negocio ganadero</p>
                <button onclick="location.href='https://ganadoyucatan.com/tianguis.html'" class="primary-button">Publicar gratis</button>
                <!-- <p>Si compras ganado <a href="#" id="style-2" data-replace="bienvenido"><span>click aquí</span></a></p> -->
            </section>

            <section class="side-content">
                <div></div>
                <p onclick="location.href='/blog/index.php'">Noticias ganaderas</p>
                <img src="./assets/img/stylized-cow-line-art.svg" alt="">
            </section>

            <section class="footer">
                <div id="button1" class="buttons-main" onclick="location.href='/tienda'">
                    <img style="border-radius: 50%" src="{{url('/static/images/genetico.png')}}" alt="Genetico">
                    <p>Ganado genético</p>
                </div>

                <div class="buttons-main" onclick="location.href='/tienda_virtual/tianguis/tianguisG'" style="background: var(--lightgreen);">
                    <img style="border-radius: 50%" src="{{url('/static/images/tianguis.png')}}" alt="Tianguis">
                    <p>Ganado Comercial</p>
                </div>

               <div class="buttons-main" onclick="location.href='/subastas/subastas.php'"    style="background: #D19C97;">
                    <img style="border-radius: 50%" src="{{url('/static/images/subasta.png')}}" alt="Subastas">
                    <p>Subastas</p>
                </div>
                <!--<div class="buttons-main" onclick="location.href='/exposicion/expoIndex.php'" style="background: var(--lightyellow);">
                    <img src="./assets/img/Fiestas.png" alt="">
                    <p>Fiestas ganaderas</p>
                </div>-->
            </section>

        </section>



    </div>

</body>
</html>