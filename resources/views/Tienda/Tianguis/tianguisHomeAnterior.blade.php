@extends('Tienda.master')
@section('view')
	<title>Tianguis Ganadero - Ganado Yucatán</title>

	<style>
		label{
			font-size: 14px;
			color: var(--blue);
			display: flex!important;
			align-items: center;
			justify-content: flex-start;
			font-family: var(--bs-font-sans-serif);
			line-height: 1.5;
			font-weight: bolder;
			margin-bottom: 4px;
		}
		select{
			border: 1px solid #ced4da;
			width: 100%;
			font-size: 1rem!important;
			font-family: inherit!important;
			color: var(--blue)!important;
		}
		@media screen and (max-width: 767px) {
    #test {
    display: none;
  }
}
	</style>
	<div class="container">
		<img src="/assets/img/tianguis-ganadero.png" class="img-fluid img-thumbnail" alt="...">
{{-- 		<div class="row p-t-23">
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
		</div> --}}
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
																<a href="/tianguis/producto/{{$p->idproducto}}" class="btn btn-secondary btn-lg">Ver más</a><!-- onclick="countingClicks()"  -->
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
	</div>
@endsection

<script>

</script>

<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>