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
        <div class="titleButton">
            <h2>Ganado comercial</h2>
            <button class="btn btn-primary" id="openModal">Agregar ganado</button>
        </div>
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
                    <td class="actions">
                        <span class="material-symbols-outlined open-product" data-product-id="{{$p->idproducto}}" title="Ver producto">visibility</span>
                        {{-- <button style="background-color:#425b28;border-color: #425b28;" class="btn btn-info btn-sm" onclick="openProductInNewTab('{{$p->idproducto}}')" target="_blank" title="Ver producto"><i style="color:white;" class="far fa-eye"></i></button> --}}
                        {{-- <button class="btn btn-primary  btn-sm editProductBtn" data-id="{{$p->idproducto}}" id="editProduct" title="Editar producto"><i class="fas fa-pencil-alt"></i></button> --}}
                        <span class="material-symbols-outlined edit-product" data-id="{{$p->idproducto}}" title="Editar producto">edit</span>
                        {{-- <a href="{{ route('deleteCom', $p->idproducto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)"><i class="far fa-trash-alt"></i></a></td> --}}
                        <span class="material-symbols-outlined">delete</span>
                    </td>
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
                    <td class="actions">
                        {{-- <button style="background-color:#d79e46;border-color: #d79e46;" class="btn btn-info btn-sm" onclick="openProductInNewTab('{{$p->idproducto}}', '{{$p->ruta}}')" target="_blank" title="Ver producto"><i class="far fa-eye"></i></button> --}}
                        <span class="material-symbols-outlined open-product" data-product-id="{{$p->idproducto}}" title="Ver producto">visibility</span>
                        <span class="material-symbols-outlined editProductBtngen" data-id="{{$p->idproducto}}" title="Editar producto">edit</span>
                        {{-- <button class="btn btn-primary  btn-sm editProductBtngen" data-id="{{$p->idproducto}}" id="editProduct" title="Editar producto"><i class="fas fa-pencil-alt"></i></button> --}}
                        {{-- <a href="{{ route('deleteGen', $p->idproducto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)"><i class="far fa-trash-alt"></i></a></td> --}}
                        <span class="material-symbols-outlined">delete</span>
                    </td>
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
                    <td class="actions">
                        {{-- <button style="background-color:#c31b36;border-color: #c31b36;" class="btn btn-info btn-sm" onclick="openProductInNewTab('{{$p->id_producto}}')" target="_blank" title="Ver producto"><i class="far fa-eye"></i></button> --}}
                        <span class="material-symbols-outlined open-product" title="Ver producto">visibility</span>
                        {{-- <button class="btn btn-primary  btn-sm editProductBtn" data-id="{{$p->id_producto}}" id="editProduct" title="Editar producto">
                            <i class="fas fa-pencil-alt"></i>
                        </button> --}}
                        <span class="material-symbols-outlined editProductBtnSub" data-id="{{$p->idproducto}}" title="Editar producto">edit</span>
                        {{-- <a href="{{ route('deleteSub', $p->id_producto) }}" class="btn btn-danger" title="Eliminar producto" onclick="confirmation(event)">
                            <i class="far fa-trash-alt"></i>
                        </a> --}}
                        <span class="material-symbols-outlined">delete</span>
                    </td>
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

<!-- Modales de edit-->

{{-- edit ganado genético --}}

{{-- <div id="editModal" class="modal-overlay">
    <div class="modal-content">
        <span id="closeModal" class="close-btn">&times;</span>

        <!-- Sección principal dentro del modal -->
        <section class="formulario-container">
            <div class="logoCircular">
                <img src="{{url('/static/images/logoRojoCircular.png')}}" alt="Logo Ganado Yucatán">
            </div>
            <h1>AGREGAR GANADO</h1>
            <p>MIRA EL TUTORIAL PARA REALIZAR CORRECTAMENTE UNA PUBLICACIÓN</p>
            <button class="btn-video">Abrir video</button>

            <!-- Formulario -->
            <form class="formulario-ganado" id="editForm" action="admin/products/addNewCom" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <input type="text" id="txtNombre" name="txtNombre" maxlength="50" required placeholder="Título del anuncio">
                    <textarea id="txtDescripcion" name="txtDescripcion" maxlength="250" placeholder="Características"></textarea>
                    <input type="text" id="txtLink" name="txtLink" placeholder="Enlace Youtube">
                </div>
                <div class="form-row">
                    <input type="number" id="precio" name="precio" placeholder="Precio*">
                    <input type="number" id="txtEdad" name="txtEdad" placeholder="Edad del ganado*">
                    <input type="text"   id="pesoG" name="pesoG" placeholder="Peso del ganado">
                </div>
                <div class="form-row">
                    <select id="txtRaza" name="txtRaza">
                        <option value="Brahman rojo">Brahman rojo</option>
                        <option value="Brahman gris">Brahman gris </option>
                        <option value="Brahman ameri">Brahman ameri</option>
                        <option value="Nelore">Nelore </option>
                        <option value="Nelore mocho">Nelore mocho </option>
                        <option value="Nelore pinto">Nelore pinto </option>
                        <option value="Beefmaster">Beefmaster </option>
                        <option value="Suizo europeo">Suizo europeo</option>
                        <option value="Simmental">Simmental</option>
                        <option value="Simbrah">Simbrah </option>
                        <option value="Gyr">Gyr</option>
                        <option value="Guzerat">Guzerat </option>
                        <option value="Charolais">Charolais</option>
                        <option value="Suizo america">Suizo america</option>
                        <option value="Limouzin">Limouzin </option>
                        <option value="Indubrazil">Indubrazil </option>
                        <option value="Brangus">Brangus </option>
                        <option value="Angus">Angus </option>
                        <option value="Hereford">Hereford</option>
                        <option value="Charolesa">Charolesa </option>
                        <option value="Pardo suizo europeo">Pardo suizo europeo</option>
                        <option value="Pardo suizo americano">Pardo suizo americano</option>
                        <option value="Aberdeen angus">Aberdeen angus</option>
                        <option value="Santa Gertrudis">Santa Gertrudis</option>
                        <option value="Cebu Brahman">Cebu Brahman</option>
                        <option value="Belgian Blue">Belgian Blue</option>
                        <option value="Braford">Braford</option>
                    </select>
                    <select id="listVacu" name="listVacu">
                        <option value="Vacunado">Vacunado</option>
                        <option value="NO Vacunado">No Vacunado</option>
                    </select>
                    <input type="text" id="txtStock" name="txtStock"  placeholder="Cantidad disponible*">
                </div>
                <div class="form-row">
                    <select id="listArete" name="listArete">
                        <option value="Con Arete">Con Arete</option>
                        <option value="Sin Arete">Sin Arete</option>
                    </select>
                    <input type="text" placeholder="Nombre del propietario o Rancho*">
                    <input type="text" placeholder="Número de teléfono">
                </div>
                <div class="form-row">
                    <select id="listCert" name="listCert">
                        <option value="Certificado">Cuenta con certificado</option>
                        <option value="NO certificado">No cuenta con certificado</option>
                    </select>
                    <select id="txtTipo" name="txtTipo">
                        <option value="Destetes">Destetes</option>
                        <option value="Novillas">Novillas</option>
                        <option value="Ternero">Ternero</option>
                        <option value="Toro de engorda">Toro de engorda</option>
                        <option value="Vaca de engorda">Vaca de engorda</option>
                        <option value="Vaquillona">Vaquillona</option>
                        <option value="Vaquillonas preñadas">Vaquillonas preñadas</option>
                        <option value="Ganado para matadero">Ganado para matadero</option>
                        <option value="Vaca terminada">Vaca terminada</option>
                        <option value="Toro terminado">Toro terminado</option>
                        <option value="Novillonas de registro">Novillonas de registro</option>
                        <option value="Novillonas preñada">Novillonas preñadas</option>
                        <option value="Toro para cebar">Toro para cebar</option>
                        <option value="Vaca para cebar">Vaca para cebar</option>
                        <option value="Vaca Semiterminada">Vaca Semiterminada</option>
                        <option value="Toro Semiterminado">Toro Semiterminado</option>
                        <option value="Toro Castrado">Toro Castrado</option>
                        <option value="pie de cria">pie de cria</option>
                        <option value="novillonas para empadre">novillonas para empadre</option>
                    </select>
                    <select id="listEstatus" name="listEstatus">
                        <option value="Disponible">Disponible</option>
                        <option value="Reservado">Reservado</option>
                        <option value="Vendido">Vendido</option>
                        <option value="Enviado">Enviado</option>
                    </select>
                </div>
                <div class="form-row">
                    <select>
                        <option>Estado*</option>
                    </select>
                    <select>
                        <option>Ciudad*</option>
                    </select>
                    <select>
                        <option>Comisaria</option>
                    </select>
                </div>
            </form>
        </section>

        <!-- Sección para cargar imágenes -->
        <section class="imagenes-container">
            <h2>CARGAR IMAGEN</h2>

            <div class="imagenes-grid">
                <div class="cargar-imagen">
                    <div class="upload-box">
                        <input type="file" id="file1" class="input-file">
                        <label for="file1">
                            <p>Arrastra o <b>elige el archivo</b> a subir</p>
                        </label>
                        <span class="file-name"></span>
                        <progress value="0" max="100"></progress>
                    </div>
                    <button class="btn-cancelar">Cancelar</button>
                    <button class="btn-importar">Importar</button>
                </div>
                <!-- Otros bloques iguales -->
            </div>

            <!-- Imágenes cargadas -->
            <h3>IMÁGENES CARGADAS</h3>
            <ul class="imagenes-cargadas">
                <li>Archivo_imagen_ganado.jpg <span class="eliminar">✖ Eliminar</span></li>
            </ul>

            <button class="btn-publicar">¡Publicar ahora!</button>
        </section>
    </div>
</div> --}}

{{-- Modales add ganado --}}

<!-- Modal  for ganado genetico-->
<div id="modal" class="modal-overlay">
    <div class="modal-content">
        <span id="closeModal" class="close-btn">&times;</span>

        <!-- Sección principal dentro del modal -->
        <section class="formulario-container">
            <div class="logoCircular">
                <img src="{{url('/static/images/logoRojoCircular.png')}}" alt="Logo Ganado Yucatán">
            </div>
            <h1>AGREGAR GANADO</h1>
            <p>MIRA EL TUTORIAL PARA REALIZAR CORRECTAMENTE UNA PUBLICACIÓN</p>
            <button class="btn-video">Abrir video</button>

            <!-- Formulario -->
            <form class="formulario-ganado">
                <div class="form-row">
                    <input type="text" id="txtNombre" name="txtNombre" maxlength="50" required placeholder="Título del anuncio">
                    <textarea id="txtDescripcion" name="txtDescripcion" maxlength="250" placeholder="Características"></textarea>
                    <input type="text" id="txtLink" name="txtLink" placeholder="Enlace Youtube">
                </div>
                <div class="form-row">
                    <input type="number" id="precio" name="precio" placeholder="Precio*">
                    <input type="number" id="txtEdad" name="txtEdad" placeholder="Edad del ganado*">
                    <input type="text"   id="pesoG" name="pesoG" placeholder="Peso del ganado">
                </div>
                <div class="form-row">
                    <select id="txtRaza" name="txtRaza">
                        <option value="Brahman rojo">Brahman rojo</option>
                        <option value="Brahman gris">Brahman gris </option>
                        <option value="Brahman ameri">Brahman ameri</option>
                        <option value="Nelore">Nelore </option>
                        <option value="Nelore mocho">Nelore mocho </option>
                        <option value="Nelore pinto">Nelore pinto </option>
                        <option value="Beefmaster">Beefmaster </option>
                        <option value="Suizo europeo">Suizo europeo</option>
                        <option value="Simmental">Simmental</option>
                        <option value="Simbrah">Simbrah </option>
                        <option value="Gyr">Gyr</option>
                        <option value="Guzerat">Guzerat </option>
                        <option value="Charolais">Charolais</option>
                        <option value="Suizo america">Suizo america</option>
                        <option value="Limouzin">Limouzin </option>
                        <option value="Indubrazil">Indubrazil </option>
                        <option value="Brangus">Brangus </option>
                        <option value="Angus">Angus </option>
                        <option value="Hereford">Hereford</option>
                        <option value="Charolesa">Charolesa </option>
                        <option value="Pardo suizo europeo">Pardo suizo europeo</option>
                        <option value="Pardo suizo americano">Pardo suizo americano</option>
                        <option value="Aberdeen angus">Aberdeen angus</option>
                        <option value="Santa Gertrudis">Santa Gertrudis</option>
                        <option value="Cebu Brahman">Cebu Brahman</option>
                        <option value="Belgian Blue">Belgian Blue</option>
                        <option value="Braford">Braford</option>
                    </select>
                    <select id="listVacu" name="listVacu">
                        <option value="Vacunado">Vacunado</option>
                        <option value="NO Vacunado">No Vacunado</option>
                    </select>
                    <input type="text" id="txtStock" name="txtStock"  placeholder="Cantidad disponible*">
                </div>
                <div class="form-row">
                    <select id="listArete" name="listArete">
                        <option value="Con Arete">Con Arete</option>
                        <option value="Sin Arete">Sin Arete</option>
                    </select>
                    <input type="text" placeholder="Nombre del propietario o Rancho*">
                    <input type="text" placeholder="Número de teléfono">
                </div>
                <div class="form-row">
                    <select id="listCert" name="listCert">
                        <option value="Certificado">Cuenta con certificado</option>
                        <option value="NO certificado">No cuenta con certificado</option>
                    </select>
                    <select id="txtTipo" name="txtTipo">
                        <option value="Destetes">Destetes</option>
                        <option value="Novillas">Novillas</option>
                        <option value="Ternero">Ternero</option>
                        <option value="Toro de engorda">Toro de engorda</option>
                        <option value="Vaca de engorda">Vaca de engorda</option>
                        <option value="Vaquillona">Vaquillona</option>
                        <option value="Vaquillonas preñadas">Vaquillonas preñadas</option>
                        <option value="Ganado para matadero">Ganado para matadero</option>
                        <option value="Vaca terminada">Vaca terminada</option>
                        <option value="Toro terminado">Toro terminado</option>
                        <option value="Novillonas de registro">Novillonas de registro</option>
                        <option value="Novillonas preñada">Novillonas preñadas</option>
                        <option value="Toro para cebar">Toro para cebar</option>
                        <option value="Vaca para cebar">Vaca para cebar</option>
                        <option value="Vaca Semiterminada">Vaca Semiterminada</option>
                        <option value="Toro Semiterminado">Toro Semiterminado</option>
                        <option value="Toro Castrado">Toro Castrado</option>
                        <option value="pie de cria">pie de cria</option>
                        <option value="novillonas para empadre">novillonas para empadre</option>
                    </select>
                    <select id="listEstatus" name="listEstatus">
                        <option value="Disponible">Disponible</option>
                        <option value="Reservado">Reservado</option>
                        <option value="Vendido">Vendido</option>
                        <option value="Enviado">Enviado</option>
                    </select>
                </div>
                <div class="form-row">
                    <select>
                        <option>Estado*</option>
                    </select>
                    <select>
                        <option>Ciudad*</option>
                    </select>
                    <select>
                        <option>Comisaria</option>
                    </select>
                </div>
            </form>
        </section>

        <!-- Sección para cargar imágenes -->
        <section class="imagenes-container">
            <h2>CARGAR IMAGEN</h2>

            <div class="imagenes-grid">
                <div class="cargar-imagen">
                    <div class="upload-box">
                        <input type="file" id="file1" class="input-file">
                        <label for="file1">
                            <p>Arrastra o <b>elige el archivo</b> a subir</p>
                        </label>
                        <span class="file-name"></span>
                        <progress value="0" max="100"></progress>
                    </div>
                    <button class="btn-cancelar">Cancelar</button>
                    <button class="btn-importar">Importar</button>
                </div>
                <!-- Otros bloques iguales -->
            </div>

            <!-- Imágenes cargadas -->
            <h3>IMÁGENES CARGADAS</h3>
            <ul class="imagenes-cargadas">
                <li>Archivo_imagen_ganado.jpg <span class="eliminar">✖ Eliminar</span></li>
            </ul>

            <button class="btn-publicar">¡Publicar ahora!</button>
        </section>
    </div>
</div>

{{-- Scripts of com --}}
<!-- Cargar jQuery una vez -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- Cargar jQuery UI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

<!-- Cargar tu script de localización -->
<script src="{{url('/static/js/admin/location.js')}}"></script>

<!-- Cargar Sortable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

{{-- functions for view --}}
<script>
    function openProductInNewTab(id) {
        const url = `/tianguis/producto/${id}`;
        const newTab = window.open(url, '_blank');
        if (newTab) {
            newTab.focus();
        } else {
            alert('Se ha bloqueado la apertura de una nueva ventana');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const visibilityIcons = document.querySelectorAll('.open-product');

        visibilityIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                const productId = icon.getAttribute('data-product-id');
                openProductInNewTab(productId);
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Elementos del DOM
        const openModal = document.getElementById('openModal');
        const modal = document.getElementById('modal');
        const closeModal = document.getElementById('closeModal');

        // Abrir modal
        openModal.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        // Cerrar modal
        closeModal.addEventListener('click', () => {
            console.log('Entró');
            modal.style.display = 'none';
        });

        // Cerrar modal al hacer clic fuera del contenido
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                console.log('Entró');
                modal.style.display = 'none';
            }
        });
    });

    // Mostrar nombre del archivo seleccionado
    document.querySelectorAll('.input-file').forEach((input, index) => {
        input.addEventListener('change', (event) => {
            const fileName = event.target.files[0].name;
            const fileNameElement = document.querySelectorAll('.file-name')[index];
            fileNameElement.textContent = fileName;
        });
    });

    // Funcionalidad para botones "Importar"
    document.querySelectorAll('.btn-importar').forEach((btn, index) => {
        btn.addEventListener('click', () => {
            const progress = document.querySelectorAll('progress')[index];
            let value = 0;

            const interval = setInterval(() => {
                value += 10;
                progress.value = value;

                if (value >= 100) clearInterval(interval);
            }, 200);
        });
    });

    // Eliminar imágenes cargadas
    document.querySelectorAll('.eliminar').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.target.parentElement.remove();
        });
    });

</script>
@endsection
