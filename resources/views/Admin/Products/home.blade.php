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
            <button class="btn btn-primary" id="openModalButton">Agregar ganado</button>
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

<!-- Modal de edit-->
<div class="modal-overlay" id="editModal">
    <div class="modal-container">
        <div class="modal-header">
            <h2 class="modal-title">Editar Ganado</h2>
            <button class="close-button" onclick="closeModal()">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="modal-content">
            <form id="editForm">
                <div class="form-group">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-input" type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="cantidad">Cantidad</label>
                    <input class="form-input" type="number" id="cantidad" name="cantidad" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="precio">Precio</label>
                    <input class="form-input" type="number" id="precio" name="precio" step="0.01" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="tipo">Tipo</label>
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="Toro">Toro</option>
                        <option value="Vaca">Vaca</option>
                        <option value="Becerro">Becerro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="rancho">Rancho</label>
                    <input class="form-input" type="text" id="rancho" name="rancho" required>
                </div>
            </form>
        </div>
        <div class="form-footer">
            <button class="btn btn-secondary" onclick="closeModal()">Cancelar</button>
            <button class="btn btn-primary" onclick="saveChanges()">Guardar cambios</button>
        </div>
    </div>
</div>


<div class="modal-overlay" id="addModal">
    <div class="modal-container">
        <div class="modal-header">
            <h2 class="modal-title">Agregar Ganado</h2>
            <button class="close-button" onclick="closeModal()">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="modal-content">
            <form id="editForm" action="admin/products/addNewCom" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="idProducto" name="idProducto" value="">

                <div class="form-group">
                    <label class="form-label" for="title">Título del Anuncio <span class="required">*</span></label>
                    <input class="form-input" type="text" id="txtNombre" name="txtNombre" maxlength="50" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="caracteristicas">Características</label>
                    <textarea class="form-input" id="txtDescripcion" name="txtDescripcion" maxlength="250"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="Enlace">Enlance Youtube</label>
                    <input class="form-input" type="text" id="txtLink" name="txtLink">
                </div>

                <div class="form-group">
                    <label class="form-label" for="estados">Estado:</label>
                    <select class="form-select" name="estados" id="estados">
                        <option value=""></option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="ciudades">Ciudad:</label>
                    <select class="form-select" name="ciudades" id="ciudades"></select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="comisarias">Comisarias:</label>
                    <select class="form-select" name="comisarias" id="comisarias"></select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="pesoG">Peso del ganado <span class="required">*</span></label>
                    <input class="form-input" type="text" id="pesoG" name="pesoG" maxlength="5" placeholder="Peso en kilogramos" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="txtEdad">Edad del ganado <span class="required">*</span></label>
                    <input class="form-input" type="number" id="txtEdad" name="txtEdad" maxlength="5" placeholder="Edad en años" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="precio">Precio <span class="required">*</span></label>
                    <input class="form-input" type="text" id="precio" name="precio" maxlength="11" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="txtStock">Cantidad Disponible <span class="required">*</span></label>
                    <input class="form-input" type="text" id="txtStock" name="txtStock" maxlength="5" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="txtRancho">Nombre del rancho</label>
                    <input class="form-input" type="text" id="txtRancho" name="txtRancho" maxlength="50">
                </div>

                <div class="form-group">
                    <label class="form-label" for="listVacu">Vacunado</label>
                    <select class="form-select" id="listVacu" name="listVacu">
                        <option value="Vacunado">Vacunado</option>
                        <option value="NO Vacunado">No Vacunado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="listArete">Arete</label>
                    <select class="form-select" id="listArete" name="listArete">
                        <option value="Con Arete">Con Arete</option>
                        <option value="Sin Arete">Sin Arete</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="listCert">Certificado</label>
                    <select class="form-select" id="listCert" name="listCert">
                        <option value="Certificado">Cuenta con certificado</option>
                        <option value="NO certificado">No cuenta con certificado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="txtTipo">Tipo</label>
                    <select class="form-select" id="txtTipo" name="txtTipo">
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
                </div>

                <div class="form-group">
                    <label class="form-label" for="listStatus">En venta <span class="required">*</span></label>
                    <select class="form-select" id="listStatus" name="listStatus" required>
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="listEstatus">Estatus</label>
                    <select class="form-select" id="listEstatus" name="listEstatus">
                        <option value="Disponible">Disponible</option>
                        <option value="Reservado">Reservado</option>
                        <option value="Vendido">Vendido</option>
                        <option value="Enviado">Enviado</option>
                    </select>
                </div>

                <!-- Partes del nuevo form -->
                <div class="form-group">
                    <label class="form-label" for="file-input">Cargar imágenes:</label>
                    <input type="file" id="file-input" name="imagenes-cargadas[]" multiple style="display:none;">
                    <button type="button" id="add-images" class="btn btn-primary" style="background: #425b28; border-color: #425b28">Agregar imágenes</button>
                    <div id="image-container" class="d-flex flex-wrap mt-3"></div>
                    <input type="hidden" name="deleted_images" id="deleted_images">
                    <input type="hidden" name="images" id="images" value="">
                </div>

                <div class="form-group">
                    <label class="form-label" for="video">Cargar video:</label>
                    <input type="file" name="video" id="video" accept="video/mp4, video/avi, video/mov, video/mpeg, video/quicktime">
                </div>

                <div class="modal-footer">
                    {{-- <div id="loading-icon" class="loading-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="40" height="40">
                        <img src="{{url('/static/images/loading.png')}}" alt="Loading">
                    </div> --}}
                    <button type="button" class="btn btn-secondary" onclick="closeModal()" style="background:red; border-color: red;">Cerrar</button>
                    <button type="submit" class="btn btn-primary" style="background: #425b28; border-color: #425b28;">SUBIR</button>
                </div>
            </form>
        </div>
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

{{-- Functions for edit --}}
<script>
    function openEditProductModal(productId) {
        const url = `getComInfo/${productId}`;
        const container = $('#comEditInfoContainer');
        container.empty();

        $.ajax({
            type: 'GET',
            url: url,
            success: function (response) {
                container.html(response);
                $('#modalForCom').modal('show');
            },
            error: function (xhr, status, error) {
                console.error('Error al cargar la información del producto:', error);
            }
        });
    }
    $(document).ready(function () {
        $('.edit-product').on('click', function () {
            const productId = $(this).data('id');
            openEditProductModal(productId);
        });
    });

</script>

<script>
    // Función para abrir el modal
    function openModal() {
        document.getElementById('addModal').style.display = 'block';
    }

    // Función para cerrar el modal
    function closeModal() {
        document.getElementById('addModal').style.display = 'none';
    }

    // Agregar evento de clic al botón
    document.getElementById('openModalButton').addEventListener('click', openModal);
</script>


<script>
    // Seleccionar todos los botones de editar
    document.querySelectorAll('.edit-product').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            openEditModal(productId);
        });
    });

    // Seleccionar el botón para abrir el nuevo modal
    document.getElementById('openAddModalButton').addEventListener('click', function() {
        openAddModal();
    });

    function openEditModal(productId) {
        const modal = document.getElementById('editModal');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Previene el scroll del body
        // Aquí puedes cargar los datos del producto según el ID
        // Por ejemplo:
        // fetchProductData(productId).then(data => {
        //     document.getElementById('nombre').value = data.nombre;
        //     // ... llenar otros campos
        // });
    }

    function openAddModal() {
        const modal = document.getElementById('addModal');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Previene el scroll del body
    }

    function closeModal() {
        const editModal = document.getElementById('editModal');
        const addModal = document.getElementById('addModal');
        editModal.style.display = 'none';
        addModal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Restaura el scroll del body
    }

    function saveChanges() {
        // Aquí puedes implementar la lógica para guardar los cambios
        const formData = new FormData(document.getElementById('editForm'));
        console.log('Guardando cambios:', Object.fromEntries(formData));
        // Después de guardar, cerrar el modal
        closeModal();
    }

    // Cerrar el modal si se hace clic fuera del contenido
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    });
</script>


@endsection
