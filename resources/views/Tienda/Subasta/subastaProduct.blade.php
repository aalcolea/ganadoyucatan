@extends('layout')
@section('content')
<title>Subasta de producto</title>

    <!-- <div id="wrapper">
        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Producto <small>Haz tu mejor oferta</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-comment"></i> Subastas
                            </li>
                            <li>
                                <i class="fa fa-comments"></i> Todas las subastas
                            </li>
                            <li class="active">
                                <i class="fa fa-certificate"></i> Haz una oferta
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Listado de subastas
                <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                    <div class="thumbnail">
                                      <?php //echo "<img src='images/productos/$imagen_p' style='height: 220px;'>";?>
                                      <div class="caption">
                                        <h2 class="text-success">{{$p->nombre}}</h2>
                                        <h4 class="text-info">{{$p->descripcion}}</h4>
                                        <p class="text-warning text-right"><i class="fa fa-tag"></i> {{$p->location->nombre}}</p>
                                        <hr style="margin: 1px 1px 1px 1px;">

                                        <p>Producto publicado el <?php echo "<b>$p->fechaCreado</b>"; ?></p>

{{--                                         <p id="tiempo"></p>
                                        <input type="hidden" id="limite" value="<?php echo $fin; ?>">

                                        <p><?php echo "<b>Ofertantes:</b> $count_ofert";?></p>
                                        <p><?php echo "<b>Oferta minima:</b> $$min.00"; ?></p>
                                        <p><?php echo "<b>Oferta maxima:</b> $$max.00"; ?></p>
                                        <h4>Oferta actual: <b class="text-danger"><?php echo "$$oferta.00"; ?></b></h4> --}}



                                      </div>
                                    </div>
                                  </div>

                                      <div class="col-sm-6 col-md-6">
                    <div class="col-md-6">
                        <div class="gallery js-flickity" style="background-color: none;">
                            <?php for ($i = 0; $i < count($images); $i++) { ?>
                                <a href="{{ asset('uploads/subasta/' . $p->carpeta . '/' . $images[$i]['img'] . '.webp') }}" class="gallery-cell"                   data-fancybox="gallery">
                        <img src="{{ asset('uploads/subasta/' . $p->carpeta . '/' . $images[$i]['img'] . '.webp') }}" class="d-block w-100" alt="Imagen">
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="modal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="expandedImg">
                    </div>
                                      </div>
                                      <div class="col-sm-6 col-md-6">
                                        <div class="thumbnail">
                                          <?php //echo "<img src='images/productos/$imagen_p' style='height: 220px;'>";?>
                                          <div class="caption">
                                            <hr style="margin: 1px 1px 1px 1px;">
                                            <p>Producto publicado el <?php echo "<b>$p->fechaCreado</b>"; ?></p>
                                            <p><?php //print $interval->format('%R %a días %H horas %I minutos'); ?></p>

                                            <p id="tiempo"></p>
                                            <input type="hidden" id="limite" value="<?php echo $p->fechaCierre;?>">

                                            <p><?php echo "<b>Oferta minima:</b> $$p->min.00"; ?></p>
                                            <p><?php echo "<b>Oferta maxima:</b> $$p->max.00"; ?></p>
                                            <h4>Oferta actual: <b class="text-danger"><?php echo "$0.00"; ?></b></h4>
                                    <p><a class='btn btn-success btn-block' role='button' data-toggle="modal" data-target="#offerModal">Mejorar oferta</a></p>
                                          </div>
                                        </div>
                                      </div>
                </div>

                <div class="main_box">
        <input type="checkbox" id="share_button">
        <label for="share_button">
            <span class="sharebtn" >
<i class="fa fa-share-alt" aria-hidden="true"></i>
            </span>
        </label>

        <div class="sm_list">
            <a href="#" class="facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="whatsapp">
              <i class="fab fa-whatsapp"></i>
            </a>
        </div>
    </div>
                <!-- Fin de listado -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper

    </div>
            {{-- Modal para ofertar --}}
            <div class="hidden modal fade" id="offerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                  </div>
                </div>
              </div>
            </div>
{{--         <div class="modal fade" id="offerModal" tabindex="1" role="dialog" aria-labelledby="offerModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="offerModalLabel">Enviar una oferta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              {!!Form::open(['url'=> '', 'files' => true, 'style' => 'padding: 0;'])!!}
              @csrf
              <input class="" type="text" id="idProducto" name="idProducto" value="" style="display: none;">
              <div class="modal-body">



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!!Form::submit('Ofertar', ['class' => 'btn btn-primary', 'style' => 'background: #d79e46; border-color: #d79e46;', 'id' => 'enviarBtn'])!!}
              </div>
            </div>
            {!!Form::close()!!}
          </div>
        </div> --}} -->
    <!-- /#wrapper -->

<div class="productTienda-section">
    <div class="banner-product--subasta">
        <h1>SUBASTA GANADERA</h1>
    </div>
    <div class="container-product--Main">
        <div class="route">
            <p>Inicio<span>></span></p><p>Subasta ganadera</p><span>></span><p>Nombre del producto</p>
        </div>
        <div class="information-product--container">
            <div class="container">
            <div class="parent">
                    <div class="div1">
                        <img class="left" onclick="swapImages('div1')" src="{{ asset('uploads/'.$images[0]['ruta'])}}" alt="Imagen 1">
                    </div>
                    <div class="div2">
                        <img class="left"  onclick="swapImages('div2')" src="{{ asset('uploads/'.$images[1]['ruta'])}}" alt="Imagen 1">
                    </div>
                    <div class="div3">
                        <img class="left" onclick="swapImages('div3')" src="{{ asset('uploads/'.$images[2]['ruta'])}}" alt="Imagen 1">
                    </div>
                    <div class="div4">
                        <div class="right-container">
                            <img class="left" onclick="swapImages('div4')"  src="{{ asset('uploads/'.$images[0]['ruta'])}}" alt="Imagen 1">
                            <button class="fullscreen-button" onclick="openFullscreen()">
                                <img width="24" height="24" src="https://img.icons8.com/fluency-systems-regular/48/fullscreen.png" alt="fullscreen"/>
                            </button>
                            <span class="close-button" onclick="closeFullscreen()">CERRAR</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="information-product">
                <p class="description"></p>
                <p class="raza"></p>
                <p class="description"></p>
                <p class="info"></p>
                <div class="contact-button">
                     <button class="mainButtonB">Contacto</button>
                     <a id="openModal" href="#">Hacer contacto <span>></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="description-product">
        <div class="desc-left">
            <p><span> </span></p>
        </div>
        <div class="desc-right">
            <h2>Descripción del Ganado</h2>
            <div class="container-desc">
                <div class="desc1"><span>Peso: </span><p></p></div>
                <div class="desc2"><span>Edad: </span><p></p></div>
                <div class="desc3"><span>Raza: </span><p></p></div>
                <div class="desc4"><span>Tipo: </span><p></p></div>
                <div class="desc5"><span>Rancho:</span><p></p></div>
                <div class="desc6"><span>Arete: </span><p></p></div>
                <div class="desc7"><span>Certificado:</span><p></p></div>
                <div class="desc8"><span>A cargo</span><p></p></div>
            </div>
            <hr>
             <h2>Reseñas del ganado</h2>
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
            </div>
        </div>
    </div>
    <div class="relationated-product">
        <p class="interest">Más ganado que te podría interesar</p>
        <div class="relationated-product-cards">
                <div class="card-relationated">
                    <img class="img-products" src="" alt="" srcset="">
                    <div class="card-description">
                        <div class="icons">
                            <img src="{{ asset('static/new/Iconos/pinestrella.png') }}" alt="">
                            <img src="{{ asset('static/new/Iconos/pinmoño.png') }}" alt="">
                            <img src="{{ asset('static/new/Iconos/pinvaca.png') }}" alt="">
                        </div>
                        <div class="card-description--info">
                            <p class="raza"></p>
                            <p class="description"></p>
                            <button class="secondaryButton" onclick="location.href=''">Ver más</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div id="modal">
        <div class="contact-form">
            <img class="contact-form-img" src="{{url('/static/new/iconos/logo-red.png')}}" alt="">
            <div class="close-menu-contact">
                <img src="https://img.icons8.com/ios-glyphs/30/000000/delete-sign.png" alt="delete-sign"/>
            </div>
            <p class="main-text">Contáctanos</p>
            <P class="secondary-text">Ponte en contacto con nosotros</P>
            <form action="contact-form" id="form-contact-group">
                <hr>
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="oferta">Oferta</label>
                    <input type="number" id="oferta" name="oferta" required>
                </div>
                <button class="mainButtonC" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>
<script>
    const openModalButton = document.getElementById('openModal');
    const modal = document.getElementById('modal');
    const closeModalSpan = document.querySelector('.close-menu-contact img');
    const form = document.getElementById('form-contact-group');

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

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        modal.style.display = 'none';
    });
</script>
@endsection
