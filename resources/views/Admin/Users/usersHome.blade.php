@extends('Admin.sidebar')
@section('main')

<main>
    <div class="recent-orders">
        <h1>Usuarios</h1>
        <div class="titleButton">
            <h2>Mensajes recibidos</h2>
            <button type="submit" class="btn btn-primary" id= "markAsReadBtn">Agregar ganado</button>
        </div>
        <table class="table ganado-comercial">
            <thead>
                <tr>
                    <th data-field="nombres" data-sortable="true">Nombres</th>
                    <th data-field="email_user" data-sortable="true">Tel</th>
                    <th data-field="estado" data-sortable="true">Ubicacion</th>
                    <th data-field="datecreated" data-sortable="true">Registro</th>
                    <th data-field="ult_vez" data-sortable="true">Últ. Vez</th>
                    <th data-field="asociacion" data-sortable="true">Asociación</th>
                    <th >Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr>
                    <td>{{$u->nombres.' '.$u->apellidos}}</td>
                    <td>{{$u->email_user}}</td>
                    <td>{{$u->ubi->nombre}}</td>
                    <td>{{$u->datecreated}}</td>
                    <td>{{$u->ult_vez}}</td>
                    <td>@if($u->asociacion == null) Sin asociacón @else {{$u->asociacion}} @endif</td>
                    <td class="actions">@if($u->rolid != 1)
                        {{-- <button class="btn btn-primary  btn-sm editUserBtn" data-id="{{$u->idpersona}}" id="editUser" title="Editar usuario">
                            <i class="fas fa-pencil-alt"></i>
                        </button> --}}
                        <span class="material-symbols-outlined edit-product">edit</span>
                        {{-- <button class="btn btn-danger btn-sm btnDelUsuario" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button> --}}
                        <span class="material-symbols-outlined">delete</span>
                        @else
                        {{-- <button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button> --}}
                        <span class="material-symbols-outlined edit-product">edit</span>
                        {{-- <button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button> --}}
                        <span class="material-symbols-outlined">delete</span>
                        @endif
                        {{-- <button class="btn btn-sm reactiveBtn" data-id="{{$u->idpersona}}" style="border-color: black;" title="Reactivar Suscripción">
                            <i class="fa-solid fa-forward" style="color: #00ff6e;"></i>
                        </button> --}}
                        <span class="material-symbols-outlined">
                            toggle_on
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<!-- right section start-->
<div class="right">
    <div class="top">
        <button id="menu-btn">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <div class="theme-toggler">
            <span class="material-symbols-outlined active">light_mode</span>
            <span class="material-symbols-outlined">dark_mode</span>
        </div>
        <div class="profile">
            <div class="info">
                <p>Bienvenido ganadero <b>Nombre</b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
                <img src="" alt="">
            </div>
        </div>
    </div>
    <!-- End of top -->
    <div class="recent-updates">
        <h2>Recent-updates</h2>
        <div class="updates">
            <div class="update">
                <div class="profile-photo">
                    <img src="" alt="">
                </div>
                <div class="message">
                    <p><b>Mario Fly</b> publicó un nuevo ganado</p>
                    <small class="text-muted">Hace 2 minutos</small>
                </div>
            </div>
            <div class="update">
                <div class="profile-photo">
                    <img src="images/OIP.jpeg" alt="">
                </div>
                <div class="message">
                    <p><b>Purina</b> publicó una nueva oferta para ti</p>
                    <small class="text-muted">Hace 2 minutos</small>
                </div>
            </div>
        </div>
    </div>

    <div class="recent-publicidad">
        <h2>Los mejores productos</h2>
        <div class="publicidad">
            <img src="./images/publicidad-app.png" alt="">
        </div>
    </div>
</div>
<!-- right section end-->

<script>
    $(document).ready(function() {
        $('.editUserBtn').on('click', function() {
            var userId = $(this).data('id');
            var url = 'get-user-info/' + userId;


            $('#userInfoContainer').empty();

            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {

                    $('#userInfoContainer').html(response);

                    $('#modalFormUsuario').modal('show');
                },
                error: function(xhr, status, error) {

                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function(){
      var reactiveBtn = document.querySelectorAll('.reactiveBtn');

      reactiveBtn.forEach(function(button){
        button.addEventListener('click', function(){
          var userId = this.dataset.id;
          var url = 'reactiveAccount/' + userId;
          fetch(url).then(function(response){
            if(!response.ok){
              throw new Error('Error');
            }
            return response.text();
          }).then(function(response){
              swal({
              title: '¡Listo!',
              text: 'Usuario reactivado con éxito',
              icon: 'success',
              button: 'Entendido'
            });
          }).catch(function(error){
            console.error('Error:', error);
          });
      });
      });
    });
</script>

@endsection
