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
                            <td><button class="btn btn-info btn-sm" style="background-color: #21d633; border-color: #21d633;" onClick="{{url('/admin/mensaje/'.$m->id)}}" title="Ver mensaje"><i class="far fa-eye"></i></button></td>
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
@endsection