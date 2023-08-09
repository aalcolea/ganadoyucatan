@extends('Tienda.master')
@section('view')
	<section class="bg0 p-t-23 p-b-140">
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
											<img class="card-img-top" src="" alt="FotoProducto"> 
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
							<!-- Load more -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection