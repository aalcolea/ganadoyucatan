@extends('layout')
@section('content')
	<title>Tianguis Ganadero - Ganado Yucatán</title>
</head>
	<!-- <div class="container">
		<img src="/assets/img/tianguis-ganadero.png" class="img-fluid img-thumbnail" alt="...">
    	<div class="row p-t-23">
			<div class="col-md-4">
				<h3 class="ltext-103 cl5">
					<a href="/tianguis/tianguisG/1" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
						Yucatán
					</a>
				</h3>
			</div>
			<div class="col-md-4">
				<h3 class="ltext-103 cl5">
					<a href="tianguis/tianguisG/2" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
						Campeche
					</a>
				</h3>
			</div>
			<div class="col-md-4">
				<h3 class="ltext-103 cl5">
					<a href="</tianguis/tianguisG/3" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
						Quintana Roo
					</a>
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 p-t-84">
				<span>Filtro avanzado</span>
				<form class="tianguis-form" method="get" action="/tianguis/testT" >
					<div class="row">
						<div class="col filter-tianguis">
							<label for="estados">Estado</label>
							<select id="estados">
								<option value="" selected disabled hidden>Estado</option>
							</select>
							<input style="display:none;" type="text" id="estado1" name="estado1">
							<br>
						</div>
						<div class="w-100"></div>
						<div class="col filter-tianguis">
							<label for="ciudades">Ciudad:</label>
							<select id="ciudades">
								<option value="" selected disabled hidden>Ciudad</option>
							</select>
						</div>
						<div class="w-100"></div>
						<div class="col filter-tianguis">
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
						<div class="w-100"></div>
						<div class="col filter-tianguis">
							<input type="number" class="form-control" name="price" id="price" placeholder="Precio mínimo">
						</div>
						<input style="display:none;" type="text" id="ciudad1" name="ciudad1">
						<div class="w-100"></div>
					</div>
					<<div class="row">
						<div class="col-md-4">
							<button type="submit" class="btn btn-dark btn-sm btn-block">
								Enviar
							</button>
						</div>
					</div>
				</form>
				<div id="test">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
							<img class="d-block w-100" src="/assets/img/vet.jpeg" alt="First slide">
							</div>
							<div class="carousel-item">
							<img class="d-block w-100" src="/assets/img/alvarez.jpeg" alt="Second slide">
							</div>
							<div class="carousel-item">
							<img class="d-block w-100" src="/assets/img/el manglar.jpg" alt="Third slide">
							</div>
							<div class="carousel-item">
							<img class="d-block w-100" src="/assets/img/pedegral.jpeg" alt="Third slide">
							</div>
							<div class="carousel-item">
							<img class="d-block w-100" src="/assets/img/elrodeo.jpeg" alt="Third slide">
							</div>
							<div class="carousel-item">
							<img class="d-block w-100" src="/assets/img/chara.jpeg" alt="Third slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="bg0 p-t-23 p-b-140">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="container">
									<div class="p-b-10 p-t-23">
										<h3 class="ltext-103 cl5">
											Bienvenido al tianguis ganadero
										</h3>
									</div>
									<hr>
									<div class="row">
									@foreach($products as $p)
										@php
											$portada = $p->portada;
											if ($portada->count() > 0) {
    											$portada = $portada[0]->ruta;
										}

										@endphp
											<div class="col-md-4">
												<div class="card mb-3">

													@if($p->imagen != null)
													<img src="{{ asset('uploads/tianguis/'.substr($p->datecreated, 0, 10).'/'.$portada.'.webp')}}"class="card-img-top" alt="nombreProducto">
													@else
													<img class="card-img-top" src="{{asset('uploads/'.$portada)}}" alt="nombreProducto">
													@endif

													<p id="counting"></p>
													<div class="card-body card-tianguis">
														<h5 class="card-title">{{$p->raza}}</h5>
														<p  class="card-location">{{$p->location->nombre}}</p>
														<p  class="card-text">{{$p->nombre}}</p>
														<div class="row">
															<div class="col-sm price-t">
																<p><?= number_format($p->precio) ?></p>
															</div>
															<div class="col-sm ">
																<a href="/tianguis/producto/{{$p->idproducto}}" class="btn btn-secondary btn-lg">Ver más</a><!-- onclick="countingClicks()"
															</div>
														</div>
													</div>
												</div>
											</div>
									@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		  <div class="row d-md-none">
          <div class="col-12">


          <div id="carouselExampleIndicators" class="carousel slide" name="caroge" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="/assets/img/vet.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="/assets/img/alvarez.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="/assets/img/el manglar.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
        </div>
        </div>
	</div> -->

	<!-- //TODO Nueva sección de tienda -->
	<div class="tienda-section">
		<div class="banner-main-subasta">
			<img class="icon-banner" src="{{ asset('static/new/Iconos/tianguis.png') }}" alt="">
			<h1>TIANGUIS GANADERO</h1>
			<p>Un espacio dedicado al apoyo del sector ganadero</p>
		</div>
		<div class="container-tienda">
			<div class="filtro-container">
                <div class="filtro-container-info">
                    <h2>Filtro</h2>
                    <hr>
                    <form class="tianguis-form" action="/tianguis/testT" method="get"></form>
                    <div class="filtro-container-down">
                        <h3>Filtrar por preferencia</h3>
{{--                         <div class="filter-preference">
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
                        <div class="card">
                            <h4>Price Range Slider</h4>

                            <div class="price-content">
                                <div>
                                <label>Min</label>
                                <p id="min-value">$20000</p>
                                </div>

                                <div>
                                <label>Max</label>
                                <p id="max-value">$50000</p>
                                </div>
                            </div>

                            <div class="range-slider">
                                <div class="range-fill"></div>
                                <input type="range" class="min-price" value="20000" min="20000" max="500000" step="10000" />
                                <input type="range" class="max-price" value="50000" min="20000" max="500000" step="10000" />
                            </div>
                        </div>
                        <div class="align-center">
                            <button id="filterButton" class="mainButtonB">Buscar</button>
                        </div>
                    </div>
                </div>
			</div>
            <div class="container-cards">
                <p class="title-container--cards">Publicaciones destacadas</p>
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
                <div class="publicidad-container">
                    <hr>
                    <h1 class="content-publicidad">Espacio <br>publicitario</h1>
                    <button class="secondaryButton" style="margin-left: 2rem;">Solicitar <br>publicidad</button>
                </div>
                <p class="title-container--cards">Ganado Comercial</p>
                <div class="container-normal">
                    @foreach($products as $p)
                            @php
                                $portada = $p->portada;
                                if ($portada->count() > 0) {
                                    $portada = $portada[0]->ruta;
                                }
                            @endphp
                        <div class="card-tianguis--normal">
                            <img class="img-products" src="{{asset('uploads/tianguis/'.$p->imagen.'/'.$portada.'.webp')}}" alt="" srcset="">
                            <div class="card-description">
                                <div class="icons">
                                    <img src="{{ asset('static/new/Iconos/reloj-verde.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/estrella-verde.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/vaca-verde.png') }}" alt="">
                                </div>
                                <div class="card-description--info">
                                    <p class="raza">{{$p->raza}}</p>
                                    <p class="description" >{{$p->nombre}}</p>
                                    <button class="buttonTienda" onclick="location.href='/tianguis/producto/{{$p->idproducto}}'">Ver más</button>
                                </div>
                                <div class="card-description--footer">
                                    <p>{{$p->location->nombre}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
		</div>
	</div>
<!-- <script>
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
                if(minPrice >=0 && minPrice <= 1004){
                    minPriceLabel.textContent = Math.round(minPrice);
                    minPriceHandle.style.left = `${mouseX}px`;
                }
			} else if (isDraggingMax) {
				const maxPrice = (mouseX / priceRange) * 1000; // Adjust the maximum value as needed
                if(maxPrice >= 0 && maxPrice <= 1004){
                    maxPriceLabel.textContent = Math.round(maxPrice);
                    maxPriceHandle.style.right = `${priceRange - mouseX}px`;
                }
			}
		}
	});

</script> -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const inputElements = document.querySelectorAll(".range-slider input");
  const minValue = document.getElementById("min-value");
  const maxValue = document.getElementById("max-value");
  const rangeFill = document.querySelector(".range-fill");

  function validateRange() {
    const minPrice = parseInt(inputElements[0].value);
    const maxPrice = parseInt(inputElements[1].value);

    if (minPrice > maxPrice) {
      const tempValue = maxPrice;
      maxPrice = minPrice;
      minPrice = tempValue;
    }


    const minPercentage = ((minPrice - 20000) / 480000) * 100;
    const maxPercentage = ((maxPrice - 20000) / 480000) * 100;

    rangeFill.style.left = minPercentage + "%";
    rangeFill.style.width = maxPercentage - minPercentage + "%";

    minValue.innerHTML = "$" + minPrice;
    maxValue.innerHTML = "$" + maxPrice;
  }

  inputElements.forEach((element) => {
    element.addEventListener("input", validateRange);
  });

  validateRange();
});
/*select ciudades*/
document.addEventListener('DOMContentLoaded', function(){
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
    //var maxPriceInput = document.querySelector('.max-price');
    var buscarFitlro = document.getElementById('filterButton');

    buscarFitlro.addEventListener('click', function() {
        actualizarFiltros();
    });

    function actualizarFiltros() {
        var estadoId = estadosSelect.options[estadosSelect.selectedIndex].getAttribute('data-estado-id');
        var ciudadId = ciudadesSelect.value ? ciudadesSelect.value : null;
        var lisTipo = lisTipoSelect.value ?  lisTipoSelect.value : null;
        var minPrice = minPriceInput.value ? minPriceInput.value : null;
        //var maxPrice = maxPriceInput.value ? maxPriceInput : null;
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
        }/*if(maxPrice != null){
            queryMax = '&max_price=' + maxPrice;
        }*/

        window.location.href = '/tianguisTienda?' + queryEstado + queryCiudad + queryTipo + queryMin + queryMax; //+  +  '&min_price=' + minPrice + '&max_price=' + maxPrice;
    }
});
</script>


@endsection



