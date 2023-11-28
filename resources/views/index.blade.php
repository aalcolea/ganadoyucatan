@extends('layout')

@section('content')
    <div class="carousel-container">
        <div class="image-container">
            <div class="image">
                <img src="{{ asset('static/new/background/_header-1.jpg') }}" alt="" srcset="">
            </div>
            <div class="image">
                <img src="{{ asset('static/new/background/_header-1.jpg') }}" alt="" srcset="">
            </div>
            <div class="image"></div>
        </div>
        <div class="navigation-points">
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
        </div>
        <div class="social-media">
            <img class="social-icon" onclick="location.href='https://www.youtube.com/@ganadoyucatanpeninsular6593'" width="25" height="25" src="https://img.icons8.com/material-sharp/50/ffffff/youtube-play.png" alt="youtube-play"/>
            <img class="social-icon" onclick="location.href='https://www.facebook.com/ganadoyucatan'" width="25" height="25" src="https://img.icons8.com/windows/50/ffffff/facebook-f--v2.png" alt="facebook-f--v2"/>
            <img class="social-icon" onclick="location.href='https://www.instagram.com/ganado_yuc/'"  width="25" height="25" src="https://img.icons8.com/ios/50/ffffff/instagram-new--v1.png" alt="instagram-new--v1"/>
        </div>
        <div class="nav-buttons">
            <div class="prev-button"><</div>
            <div class="next-button">></div>
            <div class="next-label ">Siguiente</div>
        </div>
    </div>
    <div class="tianguisGanadero-container">
        <div class="tianguisLeft">
            <hr>
            <p class="title">Ganado comercial</p>
            <p class="content">Si buscas ganado, para el consumo o el sector cárnico, bienvenido a tu tienda digital</p>
            <button onclick="location.href='/tianguisTienda'" class="mainButton">Ver más</button>
        </div>
        <div class="tianguisRight"></div>
    </div>
    <div class="ganadoGenetico-container">
        <div class="geneticoLeft"></div>
        <div class="geneticoRight">
            <hr>
            <p class="title">Ganado Genético</p>
            <p class="content">Si buscas ganado para mejorar el hato ganadero, bienvenido a tu tienda digital</p>
            <button onclick="location.href='/tienda'" class="mainButton">Ver más</button>
        </div>
    </div>
    <div class="subastaGanadera-container">
        <div class="subastaLeft">
            <hr>
            <p class="title">Subasta ganadera</p>
            <p class="content">Te gustaría ofertar, este es un espacio diseñado para todos nuestros suscriptores, busca tu oportunidad, bienvenidos a subasta ganadera</p>
            <button onclick="location.href='/subastas'" class="mainButton">Ver más</button>
        </div>
        <div class="subastaRight"></div>
    </div>
    <div class="noticias-container">
        <div class="noticiasLeft"></div>
        <div class="noticiasRight">
            <hr>
            <p class="title">Noticias</p>
            <p class="content"></p>
            <button class="mainButton">Ver más</button>
        </div>
    </div>
    <div class="contact">
        <div class="left-contact">
            <h1>Hacer Contacto</h1>
            <p>Somos una plataforma dedicada a brindarle servicios al sector ganadero de Yucatán, poniendo a su alcance herramientas digitales que le ayuden a promover sus ganados</p>
            <div class="social-media--contact-container">
                <img class="social-icon" onclick="location.href='https://www.youtube.com/@ganadoyucatanpeninsular6593'"  width="25" height="25" src="https://img.icons8.com/material-sharp/50/ffffff/youtube-play.png" alt="youtube-play"/>
                <img class="social-icon" onclick="location.href='https://www.facebook.com/ganadoyucatan'" width="25" height="25" src="https://img.icons8.com/windows/50/ffffff/facebook-f--v2.png" alt="facebook-f--v2"/>
                <img class="social-icon" onclick="location.href='https://www.instagram.com/ganado_yuc/'"  width="25" height="25" src="https://img.icons8.com/ios/50/ffffff/instagram-new--v1.png" alt="instagram-new--v1"/>
            </div>
            <div class="info-contact">
                <div class="info-containers">
                    <img width="35" height="35" src="https://img.icons8.com/ios/50/ffffff/marker--v1.png" alt="marker--v1"/>
                    <div class="info-right">
                        <p>Dirección</p>
                        <p>Mérida, Yucatán</p>
                    </div>
                </div>
                <div class="info-containers">
                    <img width="35" height="35" src="https://img.icons8.com/ios/50/ffffff/whatsapp--v1.png" alt="whatsapp--v1"/>
                    <div class="info-right">
                        <p>Teléfono:</p>
                        <p>9991234567</p>
                    </div>
                </div>
                <div class="info-containers">
                <img width="35" height="35" src="https://img.icons8.com/external-tanah-basah-glyph-tanah-basah/48/ffffff/external-at-digital-marketing-tanah-basah-glyph-tanah-basah.png" alt="external-at-digital-marketing-tanah-basah-glyph-tanah-basah"/>
                    <div class="info-right">
                        <p>E-Mail:</p>
                        <p>ganado.yucatan@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-contact">
            <div>
                <label for="name">Nombre</label>
                <input type="text" class="input-with-border-bottom" placeholder="Nombre">
            </div>
            <div>
                <label for="mail">Correo electrónico</label>
                <input type="text" class="input-with-border-bottom" placeholder="Correo electrónico">
            </div>
            <div>
                <label for="phone">Teléfono</label>
                <input type="text" class="input-with-border-bottom" placeholder="Teléfono">
            </div>
            <div>
                <label for="message">Mensaje</label>
                <input type="text" class="input-with-border-bottom" placeholder="Mensaje">
            </div>
            <button>Enviar mensaje</button>
        </div>
    </div>
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
@endsection
