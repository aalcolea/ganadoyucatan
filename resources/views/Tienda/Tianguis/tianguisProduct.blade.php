@extends('Tienda.master')
@section('view')
@php
			$p = $product;
			$videoURL = $p['link'];
			$convertedURL = str_replace("watch?v=","embed/", $videoURL);
			$urlShared = url("/tianguis/producto/".$p['idproducto']);
@endphp
 <div class="container">
		<div class="tianguis-header">
			<h2>{{$product->nombre}}</h2>
			<hr>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="img-container">
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
	</script>
@endsection