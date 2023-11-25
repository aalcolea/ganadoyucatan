@extends('Admin.sidebar')
@section('main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style type="text/css">
  .control-label{
    color: #425b28;
    font-weight: bold;
  }    
  @keyframes rotate {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
  }
#loading-icon {
  display: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(0deg);
  animation: rotate 1s linear infinite;
}

@keyframes rotate {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>
    <main class="app-content">
      <div class="app-title">
        <div style="margin-inline-start: 40%;">
            <h1>Ganado Comercial
            </h1>
        </div>
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableProductos">
                      <thead>
                        <b>Publicaciones pendientes</b>
                        <tr>
                          <th>Nombre</th>
                          <th>Numero</th>
                          <th>Precio</th>
                          <th>Raza</th>
                          <th>Tipo</th>
                          <th>Propietario</th>
                          <th>Descripcion</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $p)
                          <tr>
                            <td>{{$p->nombre}}</td>
                            <td>{{$p->numero}}</td>
                            <td>{{$p->precio}}</td>
                            <td>{{$p->raza}}</td>
                            <td>{{$p->tipo}}</td>
                            <td>{{$p->propietario}}</td>
                            <td>{{$p->descripcion}}</td>
                            <td><button style="background-color:#425b28;border-color: #425b28;" class="btn btn-info btn-sm" data-id="{{$p->idproducto}}" id="viewProduct" title="Ver producto"><i style="color:white;" class="far fa-eye"></i></button>
                              <a href="{{ route('aprobProduct', $p->idproducto) }}"onclick="aprob(event)"><button class="btn btn-primary  btn-sm aprobProductBtn" data-id="{{$p->idproducto}}" id="aprobProducrt" title="Aprobar producto"><i class="fa-solid fa-check-double"></i></i></button></a>
                              <a  href="{{ route('deleteCom', $p->idproducto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)"><i class="far fa-trash-alt"></i></a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>                    
                    <table class="table table-hover table-bordered" id="tableProductos">
                      <thead>
                        <b>Publicaciones aprobadas</b>
                        <tr>
                          <th>Nombre</th>
                          <th>Numero</th>
                          <th>Precio</th>
                          <th>Raza</th>
                          <th>Tipo</th>
                          <th>Propietario</th>
                          <th>Descripcion</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($aprob as $p)
                          <tr>
                            <td>{{$p->nombre}}</td>
                            <td>{{$p->numero}}</td>
                            <td>{{$p->precio}}</td>
                            <td>{{$p->raza}}</td>
                            <td>{{$p->tipo}}</td>
                            <td>{{$p->propietario}}</td>
                            <td>{{$p->descripcion}}</td>
                            <td><a class="btn" ><button style="background-color:#425b28;border-color: #425b28;" class="btn btn-info btn-sm" onclick="openProductInNewTab('{{$p->idproducto}}')" target="_blank" title="Ver producto"><i style="color:white;" class="far fa-eye"></i></button></a><a href="{{ route('deleteCom', $p->idproducto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)"><i class="far fa-trash-alt"></i></a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
<div class="modal fade" id="modalForTianguis" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister" style="background: #425b28; border-color: #425b28;">
        <h5 class="modal-title" id="titleModal">Información Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="TianguisnfoContainer"></div>
      </div>
    </div>
  </div>
</div>       
    </main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>     
<script src="{{url('/static/js/admin/location.js') }}" >
</script>    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script >
  $(document).ready(function(){
    $('#viewProduct').on('click', function(){
      var productId = $(this).data('id');
      var url = 'TianguisAdminInfo/' + productId;
      $('#TianguisnfoContainer').empty();
      $.ajax({
        type: 'GET',
        url : url,
        success: function(response){
          $('#TianguisnfoContainer').html(response);
          $('#modalForTianguis').modal('show');
        },
        error: function(xhr, staus, error){
          //
        }
      });
    });
  });
  function aprob(ev){
    ev.preventDefault();
    var url = ev.currentTarget.getAttribute('href');
    swal({
    title: "¿Desea aprobar este producto?",
    text: "Esta publicación se agregará al Tianguis Ganadero",
    icon: "success",
    buttons: true,
    dangerMode: true,
    }).then((confirmCancel)=>{
      if(confirmCancel){
        window.location.href = url;
      }
    });
  }
  function openProductInNewTab(id){
  const url = `/tianguis/producto/${id}`;
  const newTab = window.open(url, '_blank');
  if(newTab){
    newTab.focus();
  }else{
    alert('Se ha bloqueado la apertura de una nueva ventana');
  }
}
</script>
@endsection