@extends('Tienda.master')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"/>
		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
		<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
@section('view')
<style >
		a.gmail-share-button {
  display: inline-block;
  background-color: #ea4335;
  color: white;
  padding: 10px;
  opacity: 87%;
  border-radius: 5px;
  text-decoration: none;
}
 {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body { font-family: sans-serif; }

.gallery{
	width: 540px; 
	height:450px;
}
.flickity-viewport{
	height: 450px;
}
.flickity-slider{
	height: 450px;
}
.gallery-cell {
  width: 100%;
  height: 100%;
  margin-right: 10px;
}

/* cell number */
.gallery-cell:before {
  display: block;
  text-align: center;
  line-height: 200px;
  font-size: 80px;
  color: white;
}
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 50px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        margin: auto;
        display: block;
        max-width: 80%;
        max-height: 80%;
    }

    .close {
        color: white;
        position: absolute;
        top: 15px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
    }
@media only screen and (max-width: 414px) {
.gallery{
	width: 345px;
    padding-inline-start: 1rem;
    margin-top: 1rem;
}
.embed-responsive-item{
	width: 380px; 
}
	</style>
	<body>
		<?php
			$p = $product[0];
			$videoURL = $p['link'];
			$convertedURL = str_replace("watch?v=","embed/", $videoURL);
			$urlShared = url("/tienda/producto/".$p['idproducto']."/".$p['ruta']);
		?>


{{-- 		<?php 
 			include "conex.php";
 			date_default_timezone_set("America/Merida");

 			//optener ip
 			$ip = $_SERVER['REMOTE_ADDR'];
 			$id = $arrProducto['idproducto'];
 			$vend = $arrProducto['vendedorid'];

 			$sqlConsultar = $con->query("SELECT * FROM contador WHERE ip = '$ip' ORDER BY id desc");
 			$contarConsultar = $sqlConsultar->num_rows;

 			if($contarConsultar == 0) {
 				$sqlInsertar = $con->query("INSERT INTO contador (ip, fecha, idproducto, vendedorid) VALUES ('$ip', now(), '$id', '$vend')");
 			}else {
 				$row = $sqlConsultar->fetch_array();
 				$fechaRegistro = $row['fecha'];
 				$fechaActual = date("Y-m-d H:i:s");
 				$nuevaFecha = strtotime($fechaRegistro."+ 1 hour");
 				$nuevaFecha = date("Y-m-d H:i:s", $nuevaFecha);

 				if($fechaActual >= $nuevaFecha){
 					$sqlInsertar = $con->query("INSERT INTO contador (ip, fecha, idproducto, vendedorid) VALUES ('$ip', now(), '$id', '$vend')");
 						}
 			}
 			$visitas = $con->query("SELECT * FROM contador WHERE idproducto=$id");
 			$contar = $visitas->num_rows;
		?> --}}

		<hr>
		<!-- breadcrumb -->
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg p-b-20">
				<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
					Inicio
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>
				{{-- <a href="'/tienda/categoria/'.$rutacategoria; ?>" class="stext-109 cl8 hov-cl1 trans-04">
					<?= $arrProducto['categoria'] ?> --}}
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>
				<span class="stext-109 cl4">
					<?= $p['nombre'] ?>
				</span>
			</div>
		</div>
		<!-- producto detalles -->
		<div class="container m-b-5">
			<div class="row">
			    <div class="col-md-6 tianguis-description">
					<div class="col-lg-12 m-t-8">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe width="540" height="450" class="embed-responsive-item" src="<?php echo $convertedURL; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
					<p><?= $p['estado'] ?></p>
					<h2><?= $p['nombre'] ?>  </h2>
					<P><?= $p['descripcion'];?></P>
					<div class="row">
						<p>Descripcion del ganado</p>
						<div class="col-md-6 tianguis-description--caract">
							<ul>
								<li><b>Peso: </b><?= $p['peso']?> kg <b>&nbsp;&nbsp;&nbsp;Edad: </b><?= $p['edad']?> años</li>
								<hr>
								<li><b>Raza: </b><?= $p['raza']?></li>
								<hr>
								<li><b>Tipo: </b><?= $p['tipo']?></li>
								<hr>
								<li><b>Rancho: </b><?= $p['rancho']?></li>
								<hr>
							</ul>
						</div>
						<div class="col-md-6 tianguis-description--caract">
							<ul>
								<li><b>Arete: </b><?= $p['arete'];?></li>
								<hr>
								<li><b>Certificado: </b><?= $p['certificado']; ?></li>
								<hr>
								<li><b>Vacunado: </b><?= $p['vacunado']; ?></li>
								<hr>
								<li><b>Rancho a cargo: </b><?= $p->owner->nombres?></li>
								<hr>
							</ul>
						</div>
					</div>
					<div class="row product-price">
						<div class="col-md-6"><p><b><?= number_format($p['precio']); ?></b></p></div>
						{{-- <div class="col-md-6">
							<img src="<?= base_url();?>/imagenes/<?= $num['foto'];?>" alt="imagne rancho" class="small-img" style="width: 200px;height: 60px;">
						</div> --}}
						<div class="col-md-6"><a href="https://wa.me/+52<?=$p->owner->email_user;?>" class="btn b btn-lg" style="background-color: #24d265;color: white;">Contactar vía Whats App </a></div>
					</div>
					<div class="col-lg-12 cards-back">
						<div class="cards-back--content">
							<div class="CTA-Form">
								<div class="CTA-Form--header">
									<p class="CTA-P--header">Contacta al vendedor</p>	
								</div>
								{!!Form::open(['url'=> 'tienda/producto/'.$p->idproducto.'/'.$p->ruta, 'id' => 'frmContactoT'])!!}
									@csrf
          							<div class="">
          							   <input class="" type="text" id="vendedorid" name="vendedorid" value="<?= $p['vendedorid']; ?>" style="display: none;">
          							  
          							</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nombre Completo</label>
										<input type="text" class="form-control" id="nombreContacto" name="nombreContacto" aria-describedby="emailHelp" placeholder="">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Número celular</label>
										<input type="number" class="form-control" id="emailContacto" name="emailContacto" placeholder="">
										<textarea id="mensaje" name="mensaje" style="display:none;"></textarea>
									</div>
									<button type="submit" class="btn btn-primary">Enviar</button>
								{!!Form::close()!!}
							</div>
						</div>
					</div>
				</div>
					<div class="col-md-6">
					    <div class="gallery js-flickity" style="background-color: none;">
					        <?php for ($i = 0; $i < count($images); $i++) { ?>
					            <a href="{{ asset('uploads/' . $p->carpeta . '/' . $images[$i]['img'] . '.webp') }}" class="gallery-cell" 					data-fancybox="gallery">
                		<img src="{{ asset('uploads/' . $p->carpeta . '/' . $images[$i]['img'] . '.webp') }}" class="d-block w-100" alt="Imagen">
					            </a>
					        <?php } ?>
					    </div>
					</div>
					<div id="modal" class="modal">
					    <span class="close">&times;</span>
					    <img class="modal-content" id="expandedImg">
					</div>
					<!-- <div class="img-container">
						<img src="" alt="" class="img-fluid img-main--product" id="MainImg">
						//<div id="fullpage" onclick="this.style.display='none';"></div> 
						<div class="row" style="padding: 1rem 0;">
							<div class="hover-img col-sm-3" style="padding-right: 0;">
								<img src="" alt="" class="small-img">
							</div>
							<div class="hover-img col-sm-3" style="padding-right: 0;">
								<img src="" alt="" class="small-img">
							</div>
							<div class="hover-img col-sm-3">
								<img src=" ?>" alt="" class="small-img">
							</div>
							<div class="hover-img col-sm-3" style="padding-left: 0;">
								<img src="" alt="" class="small-img">
							</div>
						</div>
					</div>-->
					<!-- <div class="addthis_inline_share_toolbox"></div> -->
					<h6><i class="fas fa-eye"></i><?php //echo $contar; ?></h6>
					<div class="col-md-6">
						<div class="btn_wrap">
							<span>Compartir</span>
							<div class="container-btn">
								<div class="fb-share-button" data-href="URL_DE_TU_ARTICULO" data-layout="button" data-size="small">
  									<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=$urlShared;?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a>
									</div>
								<a href="https://api.whatsapp.com/send?text=<?=$p['ruta'];?>%20<?=$urlShared;?>" data-action="share/whatsapp/share"><i id="whats" class="fab fa-whatsapp" style="color:#23c861;"></i></a>
								
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

						
	</body>
	</html>
	<script>
    const expandableImages = document.querySelectorAll('.gallery-cell');
    const modal = document.getElementById('modal');
    const expandedImg = document.getElementById('expandedImg');
    const closeBtn = document.querySelector('.close');

    expandableImages.forEach(img => {
        img.addEventListener('click', (e) => {
            e.preventDefault();
            modal.style.display = 'block';
            expandedImg.src = img.href;
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>
<script>
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

@if(Session::has('alert.success'))
    <script>
        Swal.fire('Éxito', '{{ Session::get('alert.success') }}', 'success');
    </script>
@endif
@endsection