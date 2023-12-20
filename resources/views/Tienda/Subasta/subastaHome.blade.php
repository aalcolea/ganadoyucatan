@extends('layout')
@section('content')
	<title>Suabasta Ganadera - Ganado Yucatán</title>
</head>
    <!-- <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                  Page Heading
                <div class="rows">
                    <div class="col-lg-12">
                        <ol class="breadcrumbs">
                            <li>
                                <i class="fa fa-comment"></i> Subastas
                            </li>
                            <li class="active">
                                <i class="fa fa-comments"></i> Todas las subastas
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="rows">
				@foreach($products as $p)
                    <div class="col-sm-6 col-md-4">
                    	<div class="thumbnail">
                        	<img src="{{asset('uploads/subasta/'.$p->carpeta.'/'.$p->portada.'.webp')}}" style='height: 220px;object-fit: cover;'>
                        	    <div class="caption">
                        	        <h3>{{$p->nombre}}</h3>
                        	        <p>{{$p->fechaCiere}}</p>
                        	        <p><?php echo "$$p->min.00 - $$p->max.00"; ?></p>
                        	        <h4>Oferta actual: <b class="text-danger"><?php echo "OFERTAAKI.00"; ?></b></h4>
                        	        <p><a class='btn btn-success btn-block' href="{{url('subastas/'.$p->id_producto)}}" role='button' >Hacer Oferta</a></p>
                        	    </div>
                    	</div>
                    </div>
{{--                                       <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">
                                          <?php echo "<img src='images/productos/$imagen_p' style='height: 220px;'>";?>
                                          <div class="caption">
                                            <h3><?php echo $nombre_p; ?></h3>
                                            <p><?php print $interval->format('%a días %H horas %I minutos'); ?></p>
                                            <p><?php echo "$$min.00 - $$max.00"; ?></p>
                                            <h4>Oferta actual: <b class="text-danger"><?php echo "$0.00"; ?></b></h4>
                                            <?php echo "<p><a href='subasta.php?id=$id_subasta' class='btn btn-infos btn-block' role='button'>Primero en ofertar</a></p>";?>
                                          </div>
                                        </div>
                                      </div> --}}
                @endforeach
                </div>

            </div>
        </div>

    </div>
    <div class="footer">
        <div class="back-main">
            <div class="item">
                <div class="slider">
                    <ul>
                        <li><img src="https://cdn.pixabay.com/photo/2019/08/22/09/09/cow-4423003__340.jpg" alt=""></li>
                        <li><img src="https://cdn.pixabay.com/photo/2016/03/05/19/09/cows-1238273__340.jpg" alt=""></li>
                        <li><img src="https://cdn.pixabay.com/photo/2019/08/22/09/09/cow-4423003__340.jpg" alt=""></li>
                        <li><img src="https://cdn.pixabay.com/photo/2016/03/05/19/09/cows-1238273__340.jpg" alt=""></li>
                    </ul>
                  </div>
            </div>
        </div>
    </div> -->

 <!-- //TODO Nueva sección de subastas -->
    <div class="tienda-section">
		<div class="banner-main-subasta">
			<img class="icon-banner" src="{{ asset('static/new/Iconos/pinmoño.png') }}" alt="">
			<h1>SUBASTA GANADERA</h1>
			<p>Las mejores razas las encuentras aquí</p>
		</div>
		<div class="container-tienda">
            <!-- TODO En esta tienda no se encuentra disponible el filtro según el diseño dado -->
			<div class="filtro-container" style="display: none;">
                <div class="filtro-container-info">
                    <h2>Filtro</h2>
                    <hr>
                    <form class="tianguis-form" action="/tianguis/testT" method="get"></form>
                    <div class="filtro-container-down">
                       {{--  <h3>Filtrar por preferencia</h3>
                        <div class="filter-preference">
                            <img src="{{ asset('static/new/Iconos/vacanegra.png') }}" alt="">
                            <div class="text-input-container">
                                <p>Ganado comercial</p>
                                <input type="radio" class="radio-input" id="opcion1" name="opcion" value="opcion1">
                            </div>
                        </div>
                        <div class="filter-preference">
                            <img src="{{ asset('static/new/Iconos/estrellanegro.png') }}" alt="">
                            <div class="text-input-container">
                                <p>Destacado</p>
                                <input type="radio" class="radio-input" id="opcion1" name="opcion" value="opcion1">
                            </div>
                        </div>
                        <div class="filter-preference">
                            <img src="{{ asset('static/new/Iconos/relojnegro.png') }}" alt="">
                            <div class="text-input-container">
                                <p>Urgente</p>
                                <input type="radio" class="radio-input" id="opcion1" name="opcion" value="opcion1">
                            </div>
                        </div> --}}
                        <hr>
                        <h3>Filtrar por locación</h3>
                        <div class="label-dropdown">
                            <select id="estados">
                                <option value="" selected disabled hidden>Estado</option>
                                @foreach($estados as $e)
                                    <option value="{{$e->id}}" data-estado-id="{{$e->id}}">{{$e->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="label-dropdown">
                            <select id="ciudades">
                                <option value="" selected disabled hidden>Ciudad</option>
                            </select>
                        </div>
                        <div class="label-dropdown">
                            <select class="form-control selectpicker" id="lisTipo" name="lisTipo" >
								<option value="" selected disabled hidden>Seleccione un tipo</option>
								<option value="Destetes">Destetes</option>
								<option value="Novillas">Novillas</option>
								<option value="Ternero">Ternero</option>
								<option value="Toro de engorda">Toro de engorda</option>
								<option value="Vaca de engorda">Vaca de engorda</option>
								<option value="Vaquillona">Vaquillona</option>
								<option value="Vaquillonas preñadas">Vaquillonas preñadas</option>
								<option value="Ganado para matadero">Ganado para matadero</option>
								<option value="Vaca terminada<">Vaca terminada</option>
								<option value="Toro terminado">Toro terminado</option>
								<option value="Novillonas de registro">Novillonas de registro</option>
								<option value="Novillonas preñada">Novillonas preñadas</option>
								<option value="Toro para cebar">Toro para cebar</option>
								<option value="Vaca para cebar">Vaca para cebar</option>
								<option value="Vaca Semiterminada">Vaca Semiterminada</option>
								<option value="Toro Semiterminado">Toro Semiterminado</option>
							</select>
                        </div>
                        <hr>
                        <div class="price-filter">
                            <div class="min-price-handle"></div>
                            <div class="max-price-handle"></div>
                            <div class="price-line"></div>
                        </div>
                        <p class="range-price">Rango de precio: $<span class="range-price" id="min-price">0</span> - $<span class="range-price" id="max-price">1000</span></p>
                        <div class="align-center">
                            <button class="mainButtonB">Buscar</button>
                        </div>
                    </div>
                </div>
			</div>
            <div class="container-cards">
                <p class="title-container--cards" style="text-align: center;">Publicaciones destacadas</p>
                <div class="container-destacadas">
                @for ($index = 0; $index <= 2; $index++)
                    @if (isset($random[$index]))
                        <div class="card-tianguis">
                            <img class="img-products" src="https://images.pexels.com/photos/36347/cow-pasture-animal-almabtrieb.jpg?auto=compress&cs=tinysrgb&w=400" alt="" srcset="">
                            <div class="card-description">
                                <div class="icons">
                                    {{-- <img src="{{ asset('static/new/Iconos/reloj-verde.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/estrella-verde.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/vaca-verde.png') }}" alt=""> --}}
                                </div>
                                <div class="card-description--info">
                                    <p class="raza">{{$random[$index]->nombre}}</p>
                                    <p class="description" >{{substr($random[$index]->descripcion, 0, 15)}}</p>
                                    <button class="buttonTienda" onclick="location.href='/tianguis/producto/{{$random[$index]->idproducto}}'">Ver más</button>
                                </div>
                                <div class="card-description--footer">
                                    <p>{{$random[$index]->location->nombre}} , {{$random[$index]->ciudades->nombre}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
                </div>
                <div class="publicidad-container-subasta">
                    <hr>
                    <h1 class="content-publicidad">Espacio <br>publicitario</h1>
                    <button class="secondaryButton" id="openModal"  style="margin-left: 2rem;">Solicitar <br>publicidad</button>
                </div>
                <p class="title-container--cards" style="text-align: center;">Subasta ganadera</p>
                <div class="container-normal">
                    <div class="carousel-subasta">
                    @foreach($products as $p)
                   @php
                   $fechaCierre = new DateTime($p->fechaCierre);
                    $today = new DateTime();
                    
                    $difference = $fechaCierre->getTimestamp() - $today->getTimestamp();
                    $seg = floor($difference / 1);
                    $min = floor($seg / 60);
                    $hours = floor($min / 60);
                    $days = floor($hours / 24);
                    $hoursWithoutDays = $hours % 24;
                   @endphp
                        <div class="slide">
                            <div class="container-subastas">
                                <div class="carousel-container-subastas">
                                    <div class="image-container">
                                        <div class="image-subasta">
                                            <img src="{{asset('uploads/subasta/'.$p->carpeta.'/'.$p->portada.'.webp')}}" alt="imgProd" srcset="">
                                        </div>{{-- 
                                        <div class="image-subasta">
                                            <img src="{{ asset('static/new/background/_header-1.jpg') }}" alt="" srcset="">
                                        </div> --}}
                                        <div class="image-subasta"></div>
                                    </div>
                                    <div class="navigation-points">
                                        <div class="point"></div>
                                        <div class="point"></div>
                                        <div class="point"></div>
                                    </div>
                                    <div class="nav-buttons">
                                        <div class="prev-button"><</div>
                                        <div class="next-button">></div>
                                        <div class="next-label ">Siguiente</div>
                                    </div>
                                </div>
                                <div class="information-product-subasta">
                                    <p class="raza">{{$p->tipo}}</p>
                                    <p class="description">{{$p->nombre}}</p>
                                    <hr>
                                    <div class="ofertas-time">
                                        <p class="raza">02 ofertas de subasta</p>
                                        <p class="guion">-</p>
                                        <p class="info">Quedan {{ $days }} d {{ $hoursWithoutDays }} h</p>
                                    </div>
                                    <div class="precios">
                                        <p class="description" style="color: var(--battleship-gray);">{{$p->precioMin}} MXN</p>
                                        <p class="guion description">|</p>
                                        <P class="description">{{$p->precioMax}} MXN</P>
                                    </div>
                                    <div class="contact-button">
                                        <button class="mainButtonB" onclick="location.href='<?= '/subastas/'.$p->id_producto; ?>'">Pujar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div class="nav-buttons-subasta">
                        <div class="prev-button-subasta"><</div>
                        <div class="next-button-subasta">></div>
                    </div>
                    <!-- @foreach($products as $p)
                        <div class="card-tianguis--normal">
                            <img class="img-products" src="{{asset('uploads/subasta/'.$p->carpeta.'/'.$p->portada.'.webp')}}" alt="" srcset="">
                            <div class="card-description">
                                <div class="icons">
                                    {{-- <img src="{{ asset('static/new/Iconos/reloj-verde.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/estrella-verde.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/vaca-verde.png') }}" alt=""> --}}
                                </div>
                                <div class="card-description--info">
                                    <p class="raza">{{$p->fechaCiere}}</p>
                                    <p class="description" >{{$p->nombre}}</p>
                                    <p><?php echo "$$p->min.00 - $$p->max.00"; ?></p>
                                    <p><?php echo "OFERTAAKI.00"; ?></p>
                                    <button class="buttonTienda" onclick="location.href='{{url('subastas/'.$p->id_producto)}}'">Ver más</button>
                                </div>
                                <div class="card-description--footer">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    @endforeach -->
                </div>
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
		<form action="" id="frmContactoT">
			<input class="" type="text" id="vendedorid" name="vendedorid" value="" style="display: none;">
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
		</form>
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
</script>
<script>
	const minPriceHandle = document.querySelector('.min-price-handle');
	const maxPriceHandle = document.querySelector('.max-price-handle');
	const priceLine = document.querySelector('.price-line');
	const minPriceLabel = document.getElementById('min-price');
	const maxPriceLabel = document.getElementById('max-price');

    const filtroContainerInfo = document.querySelector('.filtro-container-info');
    const scrollThreshold = 200;

	let isDraggingMin = false;
	let isDraggingMax = false;

	minPriceHandle.addEventListener('mousedown', () => {
		isDraggingMin = true;
	});

	maxPriceHandle.addEventListener('mousedown', () => {
		isDraggingMax = true;
	});

	document.addEventListener('mouseup', () => {
		isDraggingMin = false;
		isDraggingMax = false;
	});

	document.addEventListener('mousemove', (e) => {
		if (isDraggingMin || isDraggingMax) {
			const priceFilterRect = priceLine.getBoundingClientRect();
			const mouseX = e.clientX - priceFilterRect.left;
			const priceRange = priceFilterRect.width;

			if (isDraggingMin) {
				const minPrice = (mouseX / priceRange) * 1000; // Adjust the maximum value as needed
				minPriceLabel.textContent = Math.round(minPrice);
				minPriceHandle.style.left = `${mouseX}px`;
			} else if (isDraggingMax) {
				const maxPrice = (mouseX / priceRange) * 1000; // Adjust the maximum value as needed
				maxPriceLabel.textContent = Math.round(maxPrice);
				maxPriceHandle.style.right = `${priceRange - mouseX}px`;
			}
		}
	});
// Por el momento no lleva filtro
/*document.addEventListener('DOMContentLoaded', function(){
    var estadoSelected = document.getElementById('estados');
    var ciudadesSelect = document.getElementById('ciudades');

    estadoSelected.addEventListener('change', function(){
        var estadoId = this.options[this.selectedIndex].getAttribute('data-estado-id');

        getCiudades(estadoId, function (ciudades) {
            ciudadesSelect.innerHTML = '<option value="" selected disabled hidden>Ciudad</option>';
            ciudades.forEach(function (ciudad) {
                var option = document.createElement('option');
                option.value = ciudad.id;
                option.text = ciudad.nombre;
                ciudadesSelect.add(option);
            });
            ciudadesSelect.removeAttribute('disabled');
        });
    });
    function getCiudades(estadoId, callback){
        fetch('/get-ciudades-by-estado/' + estadoId).then(response => response.json()).then(data => callback(data)).catch(error => console.error("Error al obtener ciudades", error));
    }
    var estadosSelect = document.getElementById('estados');
    var ciudadesSelect = document.getElementById('ciudades');
    var lisTipoSelect = document.getElementById('lisTipo');
    var minPriceInput = document.querySelector('.min-price');
    var maxPriceInput = document.querySelector('.max-price');
    var buscarFitlro = document.getElementById('filterButton');

    buscarFitlro.addEventListener('click', function() {
        actualizarFiltros();
    });

    function actualizarFiltros() {
        var estadoId = estadosSelect.options[estadosSelect.selectedIndex].getAttribute('data-estado-id');
        var ciudadId = ciudadesSelect.value ? ciudadesSelect.value : null;
        var lisTipo = lisTipoSelect.value ?  lisTipoSelect.value : null;
        var minPrice = minPriceInput.value ? minPriceInput.value : null;
        var maxPrice = maxPriceInput.value ? maxPriceInput : null;
        queryEstado = '';
        queryCiudad = '';
        queryTipo = '';
        queryMin = '';
        queryMax = '';
        if(estadoId != null){
            queryEstado = 'estado_id=' + estadoId;
        }
        if(ciudadId != null){
            queryCiudad = '&ciudad_id=' + ciudadId;
        }
        if(lisTipo != null){
            queryTipo = '&lisTipo=' + lisTipo;
        }if(minPrice != null){
            queryMin = '&min_price=' + minPrice;
        }if(maxPrice != null){
            queryMax = '&max_price=' + maxPrice;
        }

        window.location.href = '/tienda?' + queryEstado + queryCiudad + queryTipo + queryMin + queryMax; //+  +  '&min_price=' + minPrice + '&max_price=' + maxPrice;
    }
});*/
document.addEventListener("DOMContentLoaded", function () {

    // TODO Script para hacer el slider horizontal
    const carousel = document.querySelector('.carousel-subasta');
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev-button-subasta');
    const nextBtn = document.querySelector('.next-button-subasta');
    const left  = document.querySelector('.carousel-container-subastas');
    const right = document.querySelector('.information-product-subasta');

    const slideWidth = slides[0].offsetWidth;
    let currentPosition = 0;
    nextBtn.addEventListener('click', function () {
        if (currentPosition > -((slides.length - 1) * slideWidth)) {
            currentPosition -= slideWidth;
            carousel.style.transform = `translateX(${currentPosition}px)`;
        }
    });
    prevBtn.addEventListener('click', function () {
        if (currentPosition < 0) {
            currentPosition += slideWidth;
            carousel.style.transform = `translateX(${currentPosition}px)`;
        }
    });

    // TODO Script para hacer el cambio de imagen
    const cardContainers = document.querySelectorAll(".carousel-container-subastas");
        cardContainers.forEach(cardContainer => {
    const images = cardContainer.querySelectorAll(".image-subasta");
    const points = cardContainer.querySelectorAll(".point");
    const prevButton = cardContainer.querySelector(".prev-button");
    const nextButton = cardContainer.querySelector(".next-button");
    let currentIndex = 0;
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
        showSlide(currentIndex);

        prevButton.addEventListener("click", function () {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showSlide(currentIndex);
        });

        nextButton.addEventListener("click", function () {
            currentIndex = (currentIndex + 1) % images.length;
            showSlide(currentIndex);
        });

        points.forEach((point, index) => {
            point.addEventListener("click", function () {
            currentIndex = index;
            showSlide(currentIndex);
            });
        });
    });

});

</script>

@endsection
