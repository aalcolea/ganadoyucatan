@extends('admin.sidebar')
@section('main')
<main class="app-content">
  <div class="row user">
    <div class="col-md-12">
      <div class="profile">
        <div class="info"><img class="user-img" src="{{url('/')}}/userspics/{{Auth::user()->foto}}">
          <h4>{{$user->nombres.' '.$user->apellidos}} </h4>
          <p>{{$user->nombreRol->nombrerol}}</p>
        </div>
        <div class="cover-image"></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="tile p-0">
        <ul class="nav flex-column nav-tabs user-tabs">
          <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos personales</a></li>
          <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Datos fiscales</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content">
        <div class="tab-pane active" id="user-timeline">
          <div class="timeline-post">
            <div class="post-media">
              <div class="content">
                <h5>DATOS PERSONALES <button data-bs-toggle="modal" data-bs-target="#modalFormUsuario" class="btn btn-sm btn-info" type="button" ><i class="fas fa-pencil-alt" aria-hidden="true"></i></button></h5>
              </div>
            </div>

            <table class="table table-bordered">
              <tbody>

                <tr>
                  <td>Nombres:</td>
                  <td>{{$user->nombres}}</td>
                </tr>
                <tr>
                  <td>Apellidos:</td>
                  <td>{{$user->apellidos}}</td>
                </tr>
                <tr>
                  <td>Teléfono:</td>
                  <td>{{$user->email_user}}</td>
                </tr>
                <tr>
                  <td>Asosiación:</td>
                  <td><?= $user->asociacion ?: "Sin asociación registrada" ?> </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="user-settings">
          <div class="tile user-settings">
            <h4 class="line-head">Datos fiscales</h4>
            <form id="formDataFiscal" name="formDataFiscal">
              <div class="row mb-4">
                <div class="col-md-6">
                  <label>Identificación Tributaria</label>
                  <input class="form-control" type="text" id="txtNit" name="txtNit" value="">
                </div>
                <div class="col-md-6">
                  <label>Nombre fiscal</label>
                  <input class="form-control" type="text" id="txtNombreFiscal" name="txtNombreFiscal" value="" >
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-4">
                  <label>Dirección fiscal</label>
                  <input class="form-control" type="text" id="txtDirFiscal" name="txtDirFiscal" value="">
                </div>
              </div>
              <div class="row mb-10">
                <div class="col-md-12">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header " style="background-color: rgba(188, 184, 144, .10)">
        <h5 class="modal-title" id="titleModal">Editar información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formUsuario" name="formUsuario" class="form-horizontal">
              <input type="hidden" id="idUsuario" name="idUsuario" value="">
              <p class="text-primary">Todos los campos son obligatorios.</p>
              <div class="form-row">                <div class="form-group col-md-6">
                  <label for="txtNombre">Nombres</label>
                  <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" value="{{$user->nombres}}" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtApellido">Apellidos</label>
                  <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" value="{{$user->apellidos}}" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtTelefono">Teléfono</label>
                  <input type="text" class="form-control valid validNumber" id="txtEmail" name="txtEmail" disabled value="{{$user->email_user}}" onkeypress="return controlTag(event);">
                </div>
              </div>
             <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtPassword">Password</label>
                  <input type="password" class="form-control" id="txtPassword" name="txtPassword" >
                </div>
             </div>
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection