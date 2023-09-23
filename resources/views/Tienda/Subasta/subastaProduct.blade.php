@extends('Tienda.master')
@section('view')
  <title>Subasta de producto</title>

    <!-- Favicon -->
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
}
  .main_box{
    width: 4em;
    height: 4em;
    position: relative;
    }
    
    #share_button{
    display: none;
    }
    
/*    span,a{
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    }
    
    span{
    width: 4em;
    height: 4em;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: #eee;
    color: #333;
    font-size: 2em;
    z-index: 1;
    cursor: pointer;
    /* border-radius: 30%; */
    }*/
    
    .sm_list{
    width: 4em;
    height: 4em;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    }
    
    .sm_list a{
    width: 4em;
    height: 4em;
    border-radius: 50%;
    text-decoration: none;
    color: #fff;
    transition: all .3s;
    font-size: 1.5em;
    }
    
    #share_button:checked ~ .sm_list a:nth-child(1){
    background-color: #3B5998;
    transition-delay: 0.2s;
    transform: translateX(-6em);
    }
    
    #share_button:checked ~ .sm_list a:nth-child(2){
    background-color: #37e116;
    transition-delay: 0.2s;
    transform: translateX(6em);
    }
    

    
    
    #share_button:checked ~ .sm_list a:nth-child(1):hover{
    background-color: #ffffff;
    color: #3B5998;
    /* transition-delay: 0.2s;
    transform: translateX(-6em); */
    }
    
    #share_button:checked ~ .sm_list a:nth-child(2):hover{
    color: #37e116;
    background-color: #fff;
    }
    

    
    span:visited{
    background-color: #000f94;
    }
</style>

    <div id="wrapper">
        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
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

                <!-- Listado de subastas -->
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
        <!-- /#page-wrapper -->

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
        </div> --}}
    <!-- /#wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
     $("#offerModal").prependTo("body");
    const sharebtn = 
    document.querySelector('.sharebtn');
    var bool = 0
    
    sharebtn.addEventListener('click', () => {
        bool = !bool
        if (bool == 0) {
            sharebtn.innerHTML =
                '<i class="fa fa-share-alt"></i>'
        }else {
            sharebtn.innerHTML =
                '<i class="fas fa-times"></i>'
        }
    })
    </script>
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
@endsection