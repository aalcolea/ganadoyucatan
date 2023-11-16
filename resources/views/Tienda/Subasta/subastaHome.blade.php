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
			<div class="filtro-container">
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
                        <div class="card-tianguis--normal">
                            <img class="img-products" src="{{asset('uploads/subasta/'.$p->carpeta.'/'.$p->portada.'.webp')}}" alt="" srcset="">
                            <div class="card-description">
                                <div class="icons">
                                    {{-- <img src="{{ asset('static/new/Iconos/reloj-verde.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/estrella-verde.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/vaca-verde.png') }}" alt=""> --}}
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

</script>
    @endsection
