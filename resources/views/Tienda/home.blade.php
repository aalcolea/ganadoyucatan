@extends('layout')

@section('content')
	<!-- <section class="bg0 p-t-23 p-b-140">
		<div class="container">
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
						<div class="row">
							<div class="col-md-4">
								<button type="submit" class="btn btn-dark btn-sm btn-block">
									Enviar
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-9">
					<div class="bg0 p-t-23 p-b-140">
						<div class="container">
							<div class="p-b-10 p-t-23">
								<h3 class="ltext-103 cl5">
									Ganado Genético Peninsular
								</h3>
							</div>
							<hr>
							<div class="row">
								@foreach($products as $p)
									<div class="col-md-4">
										<div class="card mb-3">
											<img class="card-img-top" src="{{asset('uploads/'.$p->carpeta.'/'.$p->portada.'.webp')}}" alt="FotoProducto">
											<p id="counting"></p>
											<div class="card-body card-premium">
												<h5 class="card-title">{{$p->raza}}</h5>
												<p  class="card-location">{{$p->categoria}}</p>
												<p  class="card-text">{{$p->nombre}}</p>
												<div class="row">
													<div class="col-sm price">
														<p><?= number_format($p->precio) ?></p>
													</div>
													<div class="col-sm">
														<a onclick="countingClicks()" href="<?= '/tienda/producto/'.$p->idproducto.'/'.$p->ruta; ?>" class="btn btn-primary btn-lg">Ver más</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endforeach
							</div>
							<!-- Load more
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

    <!--
        TODO Nueva sección de tienda
    -->
    <div class="tienda-section">
		<div class="banner-main-genetico">
			<img class="icon-banner" src="{{ asset('static/new/Iconos/geneticoMoño.png') }}" alt="">
			<h1>GANADO GENÉTICO</h1>
			<p>Las mejores razas del sureste las encuentras aquí</p>
            <p>Bienvenido Ganadero</p>
		</div>
		<div class="container-tienda">
			<div class="filtro-container">
                <div class="filtro-container-info">
                    <h2>Filtro</h2>
                    <hr>
                    <form class="tianguis-form" action="/tianguis/testT" method="get"></form>
                    <div class="filtro-container-down">
                        <h3>Filtrar por preferencia</h3>
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
                        </div>
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
                    <div class="card-tianguis border-gold">
                        <img class="img-products" src="https://images.pexels.com/photos/36347/cow-pasture-animal-almabtrieb.jpg?auto=compress&cs=tinysrgb&w=400" alt="" srcset="">
                        <div class="card-description">
                            <div class="icons">
                                <img src="{{ asset('static/new/Iconos/relojDorado.png') }}" alt="">
                                <img src="{{ asset('static/new/Iconos/estrellaDorada.png') }}" alt="">
                                <img src="{{ asset('static/new/Iconos/vacaDorada.png') }}" alt="">
                            </div>
                            <div class="card-description--info">
                                <p class="raza">Toros para semental</p>
                                <p class="description" >Novillas para empadre</p>
                                <button class="buttonTienda" onclick="location.href='/tianguisTienda'">Ver más</button>
                            </div>
                            <div class="card-description--footer">
                                <p>Yucatán, Panaba</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-tianguis border-gold">
                        <img class="img-products" src="https://images.pexels.com/photos/36347/cow-pasture-animal-almabtrieb.jpg?auto=compress&cs=tinysrgb&w=400" alt="" srcset="">
                        <div class="card-description">
                            <div class="icons">
                                <img src="{{ asset('static/new/Iconos/relojDorado.png') }}" alt="">
                                <img src="{{ asset('static/new/Iconos/estrellaDorada.png') }}" alt="">
                                <img src="{{ asset('static/new/Iconos/vacaDorada.png') }}" alt="">
                            </div>
                            <div class="card-description--info">
                                <p class="raza">Toros para semental</p>
                                <p class="description" >Novillas para empadre</p>
                                <button class="buttonTienda">Ver más</button>
                            </div>
                            <div class="card-description--footer">
                                <p>Yucatán, Panaba</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-tianguis border-gold">
                        <img class="img-products" src="https://images.pexels.com/photos/36347/cow-pasture-animal-almabtrieb.jpg?auto=compress&cs=tinysrgb&w=400" alt="" srcset="">
                        <div class="card-description">
                            <div class="icons">
                                <img src="{{ asset('static/new/Iconos/relojDorado.png') }}" alt="">
                                <img src="{{ asset('static/new/Iconos/estrellaDorada.png') }}" alt="">
                                <img src="{{ asset('static/new/Iconos/vacaDorada.png') }}" alt="">
                            </div>
                            <div class="card-description--info">
                                <p class="raza">Toros para semental</p>
                                <p class="description" >Novillas para empadre</p>
                                <button class="buttonTienda">Ver más</button>
                            </div>
                            <div class="card-description--footer">
                                <p>Yucatán, Panaba</p>
                            </div>
                        </div>
                    </div>
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
                            <img class="img-products" src="{{asset('uploads/'.$p->carpeta.'/'.$p->portada.'.webp')}}" alt="" srcset="">
                            <div class="card-description">
                                <div class="icons">
                                    <img src="{{ asset('static/new/Iconos/relojDorado.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/vacaDorada.png') }}" alt="">
                                    <img src="{{ asset('static/new/Iconos/estrellaDorada.png') }}" alt="">
                                </div>
                                <div class="card-description--info">
                                    <p class="raza">{{$p->raza}}</p>
                                    <p class="description" >{{$p->nombre}}</p>
                                    <button class="buttonTienda" onclick="location.href='<?= '/tienda/producto/'.$p->idproducto.'/'.$p->ruta; ?>'">Ver más</button>
                                </div>
                                <div class="card-description--footer">
                                    <p>{{$p->categoria}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
		</div>
	</div>

@endsection
