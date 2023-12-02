<footer class="footer">
    <div class="footer-left">
        <img class="footer-img" src="{{ asset('static/new/Iconos/vacaroja.png') }}" alt="">
        <p class="footer-p">Somos una plataforma dedicada a bindarle servicios al sector ganadero de Yucatán, poniendo a su alcance herramientas digitales que te ayuden a promover sus ganados</p>
        <div class="social-media--contact-container">
                <img class="social-icon" onclick="location.href='https://www.youtube.com/@ganadoyucatanpeninsular6593'" width="25" height="25" src="https://img.icons8.com/material-sharp/50/ffffff/youtube-play.png" alt="youtube-play"/>
                <img class="social-icon" onclick="location.href='https://www.facebook.com/ganadoyucatan'" width="25" height="25" src="https://img.icons8.com/windows/50/ffffff/facebook-f--v2.png" alt="facebook-f--v2"/>
                <img class="social-icon" onclick="location.href='https://www.instagram.com/ganado_yuc/'" width="25" height="25" src="https://img.icons8.com/ios/50/ffffff/instagram-new--v1.png" alt="instagram-new--v1"/>
        </div>

        <p>@Ganado Yucatán | Políticas de privacidad | Términos y condiciones</p>
    </div>
    <div class="footer-right">
        <div class="publish">
            <ul>
                <li onclick="location.href='{{ url('/register') }}'">¡Publica!</li>
                <li onclick="location.href='{{ url('/register') }}'">Crea tu cuenta</li>
                <li onclick="location.href='{{url('/login')}}'">Ingresa</li>
                <li onclick="location.href='{{ url('/register') }}'">Publica aquí</li>
                <li onclick="location.href='/politicaPrivacidad'">Políticas de privacidad</li>
            </ul>
        </div>
        <div class="servicios">
            <ul>
                <li>Servicios</li>
                <li onclick="location.href='/tianguisTienda'">Tianguis ganadero</li>
                <li onclick="location.href='/tienda'">Ganado Genetico</li>
                <li onclick="location.href='/subastas'">Subasta</li>
                <li >Noticias</li>
            </ul>
        </div>
    </div>
</footer>
