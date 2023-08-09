<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="GanadoYucatan">
	<meta name="author" content="Ganado Yucatan">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta property="og:locale" 		content='es_ES'/>
	<meta property="og:type"        content="website" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{url('/static/tienda/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/static/tienda/css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/static/css/main.css')}}">
	<title>Ganado Yucatán</title>
	<style>
		.block2-pic img{
			width: 270px;
			height: 270px;
			object-fit: cover;
		}
	</style>
</head>
<body class="animsition">
	<!-- Modal -->
	<div class="modal fade" id="modalAyuda" tabindex="-1" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Atención directa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      		<div class="page-content">
	        		{{-- <?= #$infoPreguntas; ?> --}}
	      		</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						@if(Auth::user())
						Bienvenido {{Auth::user()->nombres}}
						@endif
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25" data-toggle="modal" data-target="#modalAyuda" >
							Atención directa
						</a>
						@if(Auth::guest())
						<a href="/login" class="flex-c-m trans-04 p-lr-25">
							Iniciar Sesión
						</a>
						@else
						<a href="admin/products/home" class="flex-c-m trans-04 p-lr-25">
							Mi cuenta
						</a>
						<a href="/logout" class="flex-c-m trans-04 p-lr-25">
							Salir
						</a>
						@endif
					</div>
				</div>
			</div>
			<nav class="navbar navbar-light">
				<div class="container-fluid">
					<div class="navbar-brand d-flex align-items-center">
						<p>Ganado Yucatán</p>
					</div>

					<!-- <div class="link_paquetes">
						<div>
							<a href="https://www.ganadoyucatan.com/Paquetes.html">Maximiza tus ventas</a>
						</div>
					</div> -->
				</div>
			</nav>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid d-flex justify-content-center">
				<div class="navbar-nav ">
					<a class="nav-link" aria-current="page" href="/">Inicio</a>
					<a class="nav-link" href="/tienda">Bovinos</a>
					<a class="nav-link" href="/rancho">Ranchos</a> 
					<a class="nav-link" href="/subastas">Subasta</a>
					{{-- <a class="nav-link" href="/exposicion_home.html">Exposición Ganadera</a> --}}
					<a class="nav-link" href="/contacto">Contacto</a>
					<a class="nav-link" href="/tianguis">Tianguis Ganadero</a>
					{{-- <a class="nav-link" href="<?= base_url(); ?>/nosotros">Nosotros</a>  --}}
				</div>
				</div>
			</div>
		</nav>
		</div>




		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="https://www.ganadoyucatan.com/index.html"><img src="/tienda/images/logo.png" alt="Tienda Virtual"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						@if(Auth::user())
						Bienvenido {{Auth::user()->nombres}}
						@endif
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04" data-toggle="modal" data-target="#modalAyuda">
							Atención Directa
						</a>
						@if(Auth::user())
						<a href="/admin/products/home" class="flex-c-m trans-04 p-lr-25">
							Mi cuenta
						</a>
						<a href="/logout" class="flex-c-m trans-04 p-lr-25">
							Salir
						</a>
						@else
						<a href="/login" class="flex-c-m trans-04 p-lr-25">
							Iniciar Sesión
						</a>
						@endif
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="/">Inicio</a>
				</li>

				<li>
					<a href="/tienda">Bovinos</a>
				</li>
				<li>
					<a href="/rancho">Ranchos</a>
				</li>
				<li>
					<a href="/transporte">Transporte</a>
				</li>			
				<li>
					<a href="/nosotros">Nosotros</a>
				</li>

				

				<li>
					<a href="/contacto">Contacto</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="/tienda/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" method="get" action="/tienda/search" >
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input type="hidden" name="p" value="1">
					<input class="plh3" type="text" name="s" placeholder="Buscar...">
				</form>
			</div>
		</div>
	</header>
