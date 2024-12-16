@extends('Admin.sidebar')
@section('main')

<main class="app-content">
    <div class="recent-orders">
        <h1>Aprobar</h1>
        <div class="titleButton">
            <h2>Publicaciones pendientes</h2>
            <h2>Ganado Genético</h2>
        </div>
        <table class="table ganado-comercial">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Numero</th>
                    <th>Precio</th>
                    <th>Raza</th>
                    <th>Estatus</th>
                    <th>Propietario</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                <tr>
                  <td>{{$p->nombre}}</td>
                  <td>{{$p->owner->email_user}}</td>
                  <td>{{$p->precio}}</td>
                  <td>{{$p->raza}}</td>
                  <td>@if($p->status == 1)<span class="badge badge-success">Activo</span>@else <span class="badge badge-danger">Inactivo</span>@endif</td>
                  <td>{{$p->owner->nombres}}</td>
                  <td>{{$p->descripcion}}</td>
                  <td><button class="btn btn-primary btn-sm" onclick="openGenInNewTab('{{$p->idproducto}}', '{{$p->ruta}}')" target="_blank" title="Ver producto"><i style="color:white;" class="far fa-eye"></i></button>
                    {{-- <a href="{{ route('aprobProduct', $p->idproducto) }}"onclick="aprob(event)"><button class="btn btn-primary  btn-sm aprobProductBtn" data-id="{{$p->idproducto}}" id="aprobProducrt" title="Aprobar producto"><i class="fa-solid fa-check-double"></i></i></button></a> --}}
                    <a  href="{{ route('deleteGen', $p->idproducto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)"><i class="far fa-trash-alt"></i></a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <div class="titleButton">
            <h2>Subasta ganadera</h2>
        </div>
        <table class="table ganado-comercial">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Numero</th>
                    <th>Rango Precio</th>
                    <th>Tipo</th>
                    <th>Estatus</th>
                    <th>Propietario</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subastas as $p)
                <tr>
                  <td>{{$p->nombre}}</td>
                  <td>{{$p->owner->email_user}}</td>
                  <td>${{$p->precioMin}} - ${{$p->precioMax}}</td>
                  <td>{{$p->tipo}}</td>
                  <td>@if($p->fechaCierre <= date('Y-m-d h:i:s'))<span class="badge badge-success">Abierta</span>@else <span class="badge badge-danger">Cerrada</span>@endif</td>
                  <td>{{$p->owner->nombres}}</td>
                  <td>{{$p->descripcion}}</td>
                  <td><a class="btn" ><button class="btn btn-primary btn-sm" onclick="openSubInNewTab('{{$p->id_producto}}')" target="_blank" title="Ver producto"><i style="color:white;" class="far fa-eye"></i></button></a><a href="{{ route('deleteSub', $p->id_producto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)"><i class="far fa-trash-alt"></i></a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</main>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{url('/static/js/admin/location.js') }}" >
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script> --}}
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
function confirmation(ev){
  ev.preventDefault();
  var url = ev.currentTarget.getAttribute('href');
  swal({
    title: "¿Desea eliminar este producto?",
    text: "Esta publicación se eliminará para siempre",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((confirmCancel)=>{
    if(confirmCancel){
      window.location.href = url;
    }
  });
}
  function openGenInNewTab(id, ruta){
  const url = `/tienda/producto/${id}/${ruta}`;
  const newTab = window.open(url, '_blank');
  if(newTab){
    newTab.focus();
  }else{
    alert('Se ha bloqueado la apertura de una nueva ventana');
  }
}
function openSubInNewTab(id){
  const url =  `/subastas/${id}`;
  const newTab = window.open(url, '_blank');
  if(newTab){
    newTab.focus();
  }else{
    alerT('Se ha bloqueado la apertura de una nueva ventada');
  }
}
</script>
@endsection
