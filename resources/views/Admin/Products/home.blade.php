@extends('Admin.sidebar')
@section('main')

<!-- main section start -->
<main>
    <h1>Dashboard</h1>

    <div class="date">
        <input type="date">
    </div>

    <!-- Start of insights -->
    <div class="insights">
        <div class="sales active-card">
            {{-- <img src="{{url('/static/images/Mesa de trabajo 5 copia 18.png.png')}}" alt=""> --}}
            <img src="{{url('/static/images/Mesa de trabajo 5 copia 18.png')}}" alt="">
            <div class="middle">
                <div class="left">
                    <h3>Ganado comercial</h3>
                    <h1>Cant: 25</h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="number">
                        <p>50</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-- End of card -->
        <div class="expenses">
            <img src="{{url('/static/images/Mesa de trabajo 5 copia 17.png')}}" alt="">
            <div class="middle">
                <div class="left">
                    <h3>Ganado genético</h3>
                    <h1>Cant: 25</h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="number">
                        <p>50</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-- End of expenses -->
        <div class="income">
            <img src="{{url('/static/images/Mesa de trabajo 5 copia 16.png')}}" alt="">
            <div class="middle">
                <div class="left">
                    <h3>Ganado en subasta</h3>
                    <h1>Cant: 25</h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx="38" cy="38" r="36"></circle>
                    </svg>
                    <div class="number">
                        <p>50</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-- End of income -->
    </div>
    <!-- End of insights -->

    {{-- tables info --}}
    <div class="recent-orders">
        <h2>Ganado comercial</h2>
        {{-- Tabla de ganado comercial --}}
        <table class="table ganado-comercial">
            <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <!-- <th>Raza</th> -->
                  <th>Tipo</th>
                  <th>Rancho</th>
                  <th>Visualizaciones</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productsTian as $p)
                  <tr>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->stock}}</td>
                    <td>{{$p->precio}}</td>
                    <!-- <td>{{$p->raza}}</td> -->
                    <td>{{$p->tipo}}</td>
                    <td>{{$p->rancho}}</td>
                    <td>{{$p->visits->count()}}</td>
                    <td><button style="background-color:#425b28;border-color: #425b28;" class="btn btn-info btn-sm" onclick="openProductInNewTab('{{$p->idproducto}}')" target="_blank" title="Ver producto"><i style="color:white;" class="far fa-eye"></i></button><button class="btn btn-primary  btn-sm editProductBtn" data-id="{{$p->idproducto}}" id="editProduct" title="Editar producto"><i class="fas fa-pencil-alt"></i></button><a href="{{ route('deleteCom', $p->idproducto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)"><i class="far fa-trash-alt"></i></a></td>
                  </tr>
                @endforeach
              </tbody>
        </table>
        {{-- Tabla de ganado genetico --}}
        <table class="table ganado-genetico" style="display: none;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Precio</th>
                    <th>En venta</th>
                    <th>Visualizaciones</th>
                    <th>Rancho</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- Products for ganado genetico --}}
                @foreach($productsGen as $p)
                <tr>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->raza}}</td>
                    <td>{{$p->precio}}</td>
                    <td>@if($p->status == 1)<span class="badge badge-success">Activo</span>@else <span class="badge badge-danger">Inactivo</span>@endif</td>
                    <td>{{$p->visits->count()}}{{-- @if($p->estatus == 1) <span class="badge badge-success">Disponible</span>@elseif($p->estatus == 2)<span class="badge badge-warning">Reservado</span> @elseif($p->estatus == 3)<span class="badge badge-danger">Vendido</span> @else <span class="badge badge-info">Enviado</span>@endif --}}</td>
                    <td>{{$p->rancho}}</td>
                    <td>{{$p->location->nombre}}</td>
                    <td><button style="background-color:#d79e46;border-color: #d79e46;" class="btn btn-info btn-sm" onclick="openProductInNewTab('{{$p->idproducto}}', '{{$p->ruta}}')" target="_blank" title="Ver producto"><i class="far fa-eye"></i></button><button class="btn btn-primary  btn-sm editProductBtn" data-id="{{$p->idproducto}}" id="editProduct" title="Editar producto"><i class="fas fa-pencil-alt"></i></button><a href="{{ route('deleteGen', $p->idproducto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)"><i class="far fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Tabla de subasta --}}
        <table class="table ganado-subasta" style="display: none;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Visualizaciones</th>
                    <th>Oferta Actual:</th>
                    <th>En venta</th>
                    <th>Estatus</th>
                    <th>Rancho</th>
                    <th>Peso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- Products for subasta --}}
                @foreach($productsSub as $p)
                <tr>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->visits->count()}}</td>
                    <td>{{$p->ofertas->count()}}</td>
                    <td>@if($p->status == 1)<span class="badge badge-success">Abierta</span>@else <span class="badge badge-danger">Finalizada</span>@endif</td>
                    <td>{{$p->estatus}}</td>
                    <td>{{$p->rancho}}</td>
                    <td>{{$p->peso}}</td>
                    <td><button style="background-color:#c31b36;border-color: #c31b36;" class="btn btn-info btn-sm" onclick="openProductInNewTab('{{$p->id_producto}}')" target="_blank" title="Ver producto"><i class="far fa-eye"></i></button><button class="btn btn-primary  btn-sm editProductBtn" data-id="{{$p->id_producto}}" id="editProduct" title="Editar producto"><i class="fas fa-pencil-alt"></i></button><a href="{{ route('deleteSub', $p->id_producto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)"><i class="far fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="">Show All</a>
    </div>
    {{-- tables info --}}

</main>
<!-- main section end -->

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
@endsection
