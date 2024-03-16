@extends('layout')
@section('content')
@php
			$p = $product;
			$videoURL = $p['link'];
			$convertedURL = str_replace("watch?v=","embed/", $videoURL);
			$urlShared = url("/tianguis/producto/".$p['idproducto']);
@endphp
<div class="productTienda-section">
    <div class="banner-product--tienda">
        <h1>GANADO COMERCIAL</h1>
    </div>
    <div class="container-product--Main">
        <div class="route">
            <p>Inicio<span>></span></p><p>Ganado comercial</p><span>></span><p>Nombre del producto</p>
        </div>
        <div class="information-product--container">
            <div class="container">
                <div class="parent">
                    <div class="div1">
                        @if(isset($images[0]))
                            <img class="left" onclick="swapImages('div1')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[0]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div2">
                        @if(isset($images[1]))
                        <img class="left"  onclick="swapImages('div2')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[1]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div3">
                        @if(isset($images[2]))
                        <img class="left" onclick="swapImages('div3')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[2]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div4">
                        @if(isset($images[3]))
                        <img class="left" onclick="swapImages('div4')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[3]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div5">
                        @if(isset($images[4]))
                        <img class="left" onclick="swapImages('div5')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[4]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div6">
                        @if(isset($images[5]))
                        <img class="left" onclick="swapImages('div6')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[5]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div7">
                        @if(isset($images[6]))
                        <img class="left" onclick="swapImages('div7')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[6]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div8">
                        @if(isset($images[7]))
                        <img class="left" onclick="swapImages('div8')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[7]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div9">
                        @if(isset($images[8]))
                        <img class="left" onclick="swapImages('div9')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[8]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div10">
                        @if(isset($images[9]))
                        <img class="left" onclick="swapImages('div10')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[9]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div11">
                        @if(isset($images[10]))
                        <img class="left" onclick="swapImages('div11')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[10]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div12">
                        @if(isset($images[11]))
                        <img class="left" onclick="swapImages('div11')" src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[11]['ruta'].'.webp')}}" alt="Imagen 1">
                        @endif
                    </div>
                    <div class="div13">
                        <div class="right-container">
                            @if(isset($images[0]))
                                <img class="right" onclick="swapImages('div13')"  src="{{asset('uploads/tianguis/'.$p->imagen. '/'.$images[0]['ruta'].'.webp')}}" alt="Imagen 1">
                                <button class="fullscreen-button" onclick="openFullscreen()">
                                    <img width="24" height="24" src="https://img.icons8.com/fluency-systems-regular/48/fullscreen.png" alt="fullscreen"/>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="youtube-link">
                    @if($video)
                    <video width="500" height="500" controls>
                        <source src="{{asset('uploads/videost/'.$video[0]->ruta)}}" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video> 
                    @endif
                </div>
                {{-- <div class="youtube-link">
                    @if($p->link)
                        <iframe width="100%" height="250" class="embed-responsive-item" src="<?php echo $convertedURL; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                </div> --}}
            </div>
            <div class="information-product">
                <p class="description">{{$p->nombre}}</p>
                <p class="raza">{{$p->location->nombre}} , {{$p->ciudades->nombre}}</p>
                <p class="description">${{$p->precio}} MXN</p>
                <p class="info">{{substr($p->descripcion, 0, 50)}}</p>
                <div class="contact-button">
                    <button class="mainButtonB" onclick="location.href='https://wa.me/+52<?= $p->owner->telefono; ?>'"><a href="https://wa.me/+52<?= $p->owner->telefono; ?>" style="color: white;">Contacto</a></button>
                    <a id="openModal" href="#">Hacer contacto <span>></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="description-product">
        <div class="desc-left">
            Visitas: {{$p->visits->count()}}
            <p>{{$p->descripcion}} <span> </span></p>
        </div>
        <div class="desc-right">
            <h2>Descripción del Ganado</h2>
            <div class="container-desc">
                <div class="desc1"><span>Peso: </span><p>{{$p->peso}}</p></div>
                <div class="desc2"><span>Edad: </span><p>{{$p->edad}}</p></div>
                <div class="desc3"><span>Raza: </span><p>{{$p->raza}}</p></div>
                <div class="desc4"><span>Tipo: </span><p>{{$p->tipo}}</p></div>
                <div class="desc5"><span>Rancho:</span><p>{{$p->rancho}}</p></div>
                <div class="desc6"><span>Arete: </span><p>{{$p->arete}}</p></div>
                <div class="desc7"><span>Certificado:</span><p>{{$p->certificado}}</p></div>
                <div class="desc8"><span>A cargo</span><p>{{$p->owner->nombres}} {{$p->owner->apellidos}}</p></div>
            </div>
            <hr>
{{--             <h2>Reseñas del ganado</h2>
            <div class="container-reseñas">
                <div class="card-reseñas">
                    <div class="reseña">
                        <p class="reseña-description"></p>
                        <p class="reseña-name"></p>
                    </div>
                    <div class="dierecis">
                        <img src="" alt="" srcset=""> 
                    </div>
                </div>

            </div> --}}
        </div>
    </div>
    <div class="relationated-product">
        <p class="interest">Más ganado que te podría interesar</p>
        <div class="relationated-product-cards">
            @for ($index = 0; $index <= 5; $index++)
            @if (isset($random[$index]))
                @php
                    $found = false;
                @endphp
                @for($index2 = 0; $index2 < $imagesRandom->count(); $index2++)
                @if($imagesRandom[$index2]['id_producto'] == $random[$index]['idproducto'] && !$found)
                    @php
                        //echo $imagesRandom[$index2]['ruta'];
                        $found = true;
                    @endphp
                <div class="card-relationated">
                    <img class="img-products" src="{{ asset('uploads/tianguis/'.$random[$index]->imagen.'/'.$imagesRandom[$index2]['ruta'].'.webp') }}" alt="" srcset="">
                    <div class="card-description">
                        <div class="icons">
                            {{-- <img src="{{ asset('static/new/Iconos/pinestrella.png') }}" alt="">
                            <img src="{{ asset('static/new/Iconos/pinmoño.png') }}" alt="">
                            <img src="{{ asset('static/new/Iconos/pinvaca.png') }}" alt=""> --}}
                        </div>
                        <div class="card-description--info">
                            <p class="raza">{{$random[$index]->nombre}}</p>
                            <p class="description" >{{$random[$index]->precio}}</p>
                            <button class="secondaryButton" onclick="location.href='/tianguis/producto/{{$random[$index]->idproducto}}'">Ver más</button>
                        </div>
                    </div>
                </div>
                @endif
                @endfor
            @endif
            @endfor
            @if (is_null($random))
                <p>Por el momento no existen elementos para mostrar</p>
            @endif
        </div>
    </div>
</div>

<!--Modal Contact-->
<div id="modal">
    <div class="contact-form">
        <img class="contact-form-img" src="{{url('/static/new/iconos/logo-red.png')}}" alt="">
        <div class="close-menu-contact">
            <img src="https://img.icons8.com/ios-glyphs/30/000000/delete-sign.png" alt="delete-sign"/>
        </div>
        <p class="main-text">Contáctanos</p>
        <P class="secondary-text">Ponte en contacto con nosotros</P>
        {!!Form::open(['url'=> 'tienda/producto/'.$p->idproducto.'/'.$p->ruta, 'id' => 'frmContactoT'])!!}
        @csrf
            <input class="" type="text" id="vendedorid" name="vendedorid" value="<?= $p['vendedorid']; ?>" style="display: none;">
            <hr>
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button class="mainButtonC" type="submit">Enviar</button>
        {!!Form::close()!!}
    </div>
</div>
<script>
    const openModalButton = document.getElementById('openModal');
    const modal = document.getElementById('modal');
    const closeModalSpan = document.querySelector('.close-menu-contact img');
    const form = document.getElementById('frmContactoT');

    openModalButton.addEventListener('click', () => {
        modal.style.display = 'flex';
    });

    closeModalSpan.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

/*    form.addEventListener('submit', (event) => {
        event.preventDefault();
        modal.style.display = 'none';
    });*/
</script>
<script>
    function swapImages(divId) {
        var clickedImageSrc = document.querySelector('.' + divId + ' img').src;
        var largeImageSrc = document.querySelector('.div13 img').src;

        // document.querySelector('.' + divId + ' img').src = largeImageSrc; // TODO: Reemplazaba la imagen clickeada con la del focus 
        document.querySelector('.div13 img').src = clickedImageSrc;
    }


    function openFullscreen() {
        var fullscreenImage = document.createElement('img');
        fullscreenImage.classList.add('fullscreen-image');
        fullscreenImage.classList.add('active');
        fullscreenImage.src = document.querySelector('.right-container img').src;
        fullscreenImage.onclick = closeFullscreen;

        document.body.appendChild(fullscreenImage);
    }

    function closeFullscreen() {
        var fullscreenImage = document.querySelector('.fullscreen-image');
        if (fullscreenImage) {
            fullscreenImage.remove();
        }
    }


</script>
@endsection
