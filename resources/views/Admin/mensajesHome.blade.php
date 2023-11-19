@extends('admin.sidebar')
@section('main')
<main class="app-content">    
    <div class="app-title">
      <div>
          <h1><i class="fas fa-user-tag"></i> Mensajes recibidos</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      </ul>
    </div>
      <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="tableMensajes">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Mensaje</th>
                        <th>Recibido</th>
                        <th>Leer</th>
                      </tr>
                    </thead>
                      <tbody>
                        @foreach($msg as $m)
                          <tr>
                            <td>{{$m->nombre}}</td>
                            <td>{{$m->email}}</td>
                            <td>{{$m->mensaje}}</td>
                            <td>{{$m->datecreated}}</td>
                            <td>@if($m->status == 1)<button disabled type="submit" class="btn btn-info btn-sm" title="Ver mensaje"><i class="far fa-eye"></i></button>@else<form id="readMsgForm" action="{{route('readMensajesHome', ['id' => $m->id]) }}" method="POST">@csrf<button type="submit" class="btn btn-info btn-sm" style="background-color: #21d633; border-color: #21d633;" title="Ver mensaje"><i class="far fa-eye"></i></button></form>@endif</td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
</main>
<script >
document.addEventListener('DOMContentLoaded', function() {
    var readMsgForm = document.getElementById('readMsgForm');

    if (readMsgForm) {
        readMsgForm.addEventListener('submit', function(event) {
            event.preventDefault();

            var id = readMsgForm.getAttribute('data-id');
            var url = readMsgForm.getAttribute('action');
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-CSRF-TOKEN', readMsgForm.querySelector('input[name="_token"]').value);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    alert('Mensaje leído');
                } else {
                    console.error('Error en la solicitud: ' + xhr.status);
                }
            };

            xhr.onerror = function() {
                console.error('Error de red al intentar realizar la solicitud');
            };

            xhr.send();
        });
    }
});
</script>
@endsection