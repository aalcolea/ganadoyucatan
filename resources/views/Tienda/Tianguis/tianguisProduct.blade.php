@extends('layout')
@section('content')
@php
			$p = $product;
			$videoURL = $p['link'];
			$convertedURL = str_replace("watch?v=","embed/", $videoURL);
			$urlShared = url("/tianguis/producto/".$p['idproducto']);
@endphp
 <!-- <div class="container">
		<div class="tianguis-header">
			<h2>{{$product->nombre}}</h2>
			<hr>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="img-container">
					@if($product->imagen != null)
					<img src="{{ asset('uploads/tianguis/'.substr($product->datecreated, 0, 10).'/'.$images[0]['ruta'].'.webp')}}" class="img-fluid img-main--product" id="MainImg">
					<div class="row" style="padding: 1rem 0;">
						@php for($i = 0; $i < count($images); $i++){ @endphp
						<div class="hover-img col-sm-3" style="padding-right: 0;">
							<img src="{{ asset('uploads/tianguis/'.substr($product->datecreated, 0, 10).'/'.$images[$i]['ruta'].'.webp')}}" alt="" class="small-img">
						</div>
						@php
						}
						@endphp
					</div>
					@else
					<img src="{{ asset('uploads/'.$images[0]['ruta'])}}" class="img-fluid img-main--product" id="MainImg">
					<div class="row" style="padding: 1rem 0;">
						@php for($i = 0; $i < count($images); $i++){ @endphp
						<div class="hover-img col-sm-3" style="padding-right: 0;">
							<img src="{{ asset('uploads/'.$images[$i]['ruta'])}}" alt="" class="small-img">
						</div>
						@php
						}
						@endphp
					</div>
					@endif
				</div>
			</div>
				<div class="tianguis-description col-md-6">
					<p> {{$product->estado}}, {{$product->ciudad}}</p>
					<h2>{{$product->descripcion}}</h2>
					<div class="row">
						<p>Descripción del producto</p>
						<div class="tianguis-description--caract col-md-6">
							<ul>
								<li><b>Peso:</b> {{$product->peso}}</li>
								<hr>
								<li><b>Raza:</b> {{$product->raza}}</li>
								<hr>
								<li><b>Tipo:</b> {{$product->tipo}}</li>
								<hr>
							</ul>
						</div>
						<div class="tianguis-description--caract col-md-6">
							<ul>
								<li><b>¿Arete?:</b> {{$product->arete}}</li>
								<hr>
								<li><b>¿Certificado?:</b> {{$product->certificado}}</li>
								<hr>
								<li><b>¿Vacunado?:</b> {{$product->vacunado}}</li>
								<hr>
							</ul>
						</div>
					</div>
					<div class="product-price row">
						<div class="col-md-6"><p><b>${{$product->precio}}</b></p></div>
						<div class="col-md-6"><a href="https://wa.me/+52{{$product->numero}}" class="btn b btn-lg" style="background-color: #24d265;color: white;">Contactar vía Whats App</a></div>
						<div class="col-lg-12 m-t-8">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="<?php echo $convertedURL; ?>" frameborder="0" allow="accelerometer; autoplay;clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
					</div>
						<div class="col">
							<div class="btn_wrap">
								<span>Compartir</span>
								<div class="container-btn">
									<div class="fb-share-button" data-href="URL_DE_TU_ARTICULO" data-layout="button" data-size="small">
	  									<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=$urlShared;?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a>
										</div>
									<a href="https://api.whatsapp.com/send?text={{$product->ruta}}%20<?=$urlShared;?>" data-action="share/whatsapp/share"><i id="whats" class="fab fa-whatsapp" style="color:#23c861;"></i></a>

	                                <a href="<?=$urlShared?>">
	                                    <i class="fa-solid fa-link" id="copyLinkBtn" name="testA" ></i>
	                                </a>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div id="fullpage" onclick="this.style.display='none';"></div>
	<script>
		var MainImg  = document.getElementById('MainImg');
		var smallimg = document.getElementsByClassName('small-img');

		const imgs = document.querySelectorAll('.img-container img');
			const fullPage = document.querySelector('#fullpage');

		smallimg[0].onclick = function() {
			MainImg.src = smallimg[0].src;
		}
		smallimg[1].onclick = function() {
			MainImg.src = smallimg[1].src;
		}
		smallimg[2].onclick = function() {
			MainImg.src = smallimg[2].src;
		}
		smallimg[3].onclick = function() {
			MainImg.src = smallimg[3].src;
		}

		imgs.forEach(img => {
				img.addEventListener('click', function(){
					fullPage.style.backgroundImage = 'url(' + img.src + ')';
					fullPage.style.display = 'block';
				});
			});
				const copyLinkBtn = document.getElementById('copyLinkBtn');

		copyLinkBtn.addEventListener('click', (e) => {
		e.preventDefault();
		navigator.clipboard.writeText(window.location.href);
		alert('¡Enlace copiado, compártelo con tus conocidos!').then( () => {
			copyLinkBtn.removeEventListener('click');
		});
	});
</script>-->
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
                    @if($p->link)
                        <iframe width="100%"  height="250" class="embed-responsive-item" src="<?php echo $convertedURL; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    @endif
                </div>
            </div>
            <div class="information-product">
                <p class="description">{{$p->nombre}}</p>
                <p class="raza">{{$p->location->nombre}} , {{$p->ciudades->nombre}}</p>
                <p class="description">${{$p->precio}} MXN</p>
                <p class="info">{{substr($p->descripcion, 0, 50)}}</p>
                <div class="contact-button">
                    <button class="mainButtonB">Contacto</button>
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
                        <p class="reseña-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, numquam quibusdam! Ullam maxime repudiandae veritatis tenetur unde neque, consectetur totam alias sint necessitatibus cum, dolorem laboriosam aperiam modi quam debitis.</p>
                        <p class="reseña-name">-Roberto Pérez</p>
                    </div>
                    <div class="dierecis">
                        <!-- <img src="" alt="" srcset=""> -->
                    </div>
                </div>

                <div class="card-reseñas">
                    <div class="reseña">
                        <p class="reseña-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, numquam quibusdam! Ullam maxime repudiandae veritatis tenetur unde neque, consectetur totam alias sint necessitatibus cum, dolorem laboriosam aperiam modi quam debitis.</p>
                        <p class="reseña-name">-Roberto Pérez</p>
                    </div>
                    <div class="dierecis">
                        <!-- <img src="" alt="" srcset=""> -->
                    </div>
                </div>

                <div class="card-reseñas">
                    <div class="reseña">
                        <p class="reseña-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, numquam quibusdam! Ullam maxime repudiandae veritatis tenetur unde neque, consectetur totam alias sint necessitatibus cum, dolorem laboriosam aperiam modi quam debitis.</p>
                        <p class="reseña-name">-Roberto Pérez</p>
                    </div>
                    <div class="dierecis">
                        <!-- <img src="" alt="" srcset=""> -->
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="relationated-product">
        <p class="interest">Más ganado que te podría interesar</p>
        <div class="relationated-product-cards">
            @for ($index = 0; $index <= 3; $index++)
                @if (isset($random[$index]))
                <div class="card-relationated">
                    <img class="img-products" src="{{ asset('uploads/'.$random[$index]->carpeta.'/'.$random[$index]->portada.'.webp') }}" alt="" srcset="">
                    <div class="card-description">
                        <div class="icons">
                            {{-- <img src="{{ asset('static/new/Iconos/pinestrella.png') }}" alt="">
                            <img src="{{ asset('static/new/Iconos/pinmoño.png') }}" alt="">
                            <img src="{{ asset('static/new/Iconos/pinvaca.png') }}" alt=""> --}}
                        </div>
                        <div class="card-description--info">
                            <p class="raza">{{$random[$index]->nombre}}</p>
                            <p class="description" >{{$random[$index]->nombre}}</p>
                            <button class="secondaryButton" onclick="location.href='/tienda/producto/{{$random[$index]->idproducto}}/{{$random[$index]->ruta}}'">Ver más</button>
                        </div>
                    </div>
                </div>
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
