@extends('admin.sidebar')
@section('main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style type="text/css">
  .control-label{
    color: #d79e46;
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
            <h1>Ganado Genético
                <br><button style="background-color: #d79e46;border-color: #d79e46;" class="btn btn-primary" id="agregar1" type="button"data-bs-toggle="modal" data-bs-target="#agregar"> <i class="fas fa-plus-circle"></i> Publicar Ganado</button>
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
                        <tr>
                          <th>Nombre</th>
                          <th>Raza</th>
                          <th>Precio</th>
                          <th>En venta</th>
                          <th>Estatus</th>
                          <th>Rancho</th>
                          <th>Ubicación</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $p)
                          <tr>
                            <td>{{$p->nombre}}</td>
                            <td>{{$p->raza}}</td>
                            <td>{{$p->precio}}</td>
                            <td>@if($p->status == 1)<span class="badge badge-success">Activo</span>@else <span class="badge badge-danger">Inactivo</span>@endif</td>
                            <td>@if($p->estatus == 1) <span class="badge badge-success">Disponible</span>@elseif($p->estatus == 2)<span class="badge badge-warning">Reservado</span> @elseif($p->estatus == 3)<span class="badge badge-danger">Vendido</span> @else <span class="badge badge-info">Enviado</span>@endif</td>
                            <td>{{$p->rancho}}</td>
                            <td>{{$p->location->nombre}}</td>
                            <td><button style="background-color:#d79e46;border-color: #d79e46;" class="btn btn-info btn-sm" onclick="openProductInNewTab('{{$p->idproducto}}', '{{$p->ruta}}')" target="_blank" title="Ver producto"><i class="far fa-eye"></i></button><button class="btn btn-primary  btn-sm editProductBtn" data-id="{{$p->idproducto}}" id="editProduct" title="Editar producto"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger btn-sm" onClick="" title="Eliminar producto"><i class="far fa-trash-alt"></i></button></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregar" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div style="background: #d79e46; border-color:#d79e46;" class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Agregar Ganado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {!!Form::open(['url'=> 'admin/products/addNewGen', 'files' => true, 'style' => 'padding: 0;'])!!}
          {{-- <form id="formProductos" name="formProductos" class="form-horizontal" action="{{url('admin/products/addNewGen')}}" method="POST" style="padding: 0;"> --}}
              @csrf
              <input type="hidden" id="idProducto" name="idProducto" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="destacado" id="destacado">
                <label class="form-check-label" for="destacado">
                  Marcar deste producto como <b>destacado</b>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="checkbox" name="premium" id="premium">
                <label class="form-check-label" for="premium">
                  Este producto es calidad <b style="color: #d79e46;">premium<b>
                </label>
              </div>
              <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                      <label class="control-label">Título del Anuncio <span class="required">*</span></label>
                      <input class="form-control" maxlength="100" id="txtNombre" name="txtNombre" type="text" required="">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Características</label>
                      <textarea class="form-control" maxlength="1000" id="txtDescripcion" name="txtDescripcion" ></textarea>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Enlance Youtube</label>
                      <input class="form-control" id="txtLink" name="txtLink" type="text" >
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="estados">Estado:</label>
                      <select class="form-control" name="estados" id="estados">
                          <option value=""></option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ciudades">Ciudad:</label>
                        <select  class="form-control" name="ciudades" id="ciudades">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="comisarias">Comisarias:</label>
                        <select class="form-control"  name="comisarias" id="comisarias">
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <div class="form-group">
                          <label class="control-label"> Peso del ganado <span class="required">*</span></label>
                          <input maxlength="5" class="form-control" id="txtCodigo" name="txtCodigo" type="text" placeholder="Peso en kilogramos" required="">
                          
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-group">
                          <label class="control-label"> Edad del ganado <span class="required">*</span></label>
                          <input maxlength="5" class="form-control" id="txtEdad" name="txtEdad" type="number" placeholder="Edad en años" required="">
                          
                      </div>
                    </div>
                  </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Precio <span class="required">*</span></label>
                            <input maxlength="11" class="form-control" id="txtPrecio" name="txtPrecio" type="text" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Cantidad Disponible<span class="required">*</span></label>
                            <input class="form-control" maxlength="5" id="txtStock" name="txtStock" type="number" required="">
                        </div>
                          <div class="form-group col-md-6">
                            <label class="control-label">Nombre del rancho</label>
                            <input class="form-control" maxlength="50" id="txtRancho" name="txtRancho" type="text" >
                        </div>
                         <div class="form-group col-md-6">
                            <label class="control-label">Raza</label>
                            <select class="form-control selectpicker" id="txtRaza" name="txtRaza" >
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
                        </div>
                       <div class="form-group col-md-6">
                            <label class="control-label" for="listVacu">Vacunado</label>
                            <select class="form-control selectpicker" id="listVacu" name="listVacu">
                              <option value="Vacunado">Vacunado</option>
                              <option value="NO Vacunado">No Vacunado</option>
                            </select>
                      </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="listArete">Arete</label>
                            <select class="form-control selectpicker" id="listArete" name="listArete" >
                              <option value="Con Arete">Con Arete</option>
                              <option value="Sin Arete">Sin Arete</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="listCert">Certicado</label>
                            <select class="form-control selectpicker" id="listCert" name="listCert" >
                              <option value="Certificado">Cuenta con certificado</option>
                              <option value="NO certificado">NO cuenta con certificado</option>
                            </select>
                        </div> 
                        <div class="form-group col-md-6">
                            <label class="control-label" class="control-label">Tipo</label>
                            <select class="form-control selectpicker" id="txtTipo" name="txtTipo" >
                              <option value="Toro">Toro</option>
                              <option value="Torete">Torete</option>
                              <option value="Novillonas de registro puro">Novillonas de registro puro</option>
                              <option value="Destetes de resgistro puro">Destetes de resgistro puro </option>
                              <option value="Semental joven">Semental joven</option>
                              <option value="Semental">Semental</option>
                            </select>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="listStatus">En venta <span class="required">*</span></label>
                            <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                              <option value="1">Activo</option>
                              <option value="2">Inactivo</option>
                            </select>
                        </div>                        
                        <div class="form-group col-md-6">
                            <label class="control-label"   for="listEstatus">Estatus</label>
                            <select class="form-control selectpicker" id="listEstatus" name="listEstatus" >
                              <option value="1">Disponible</option>
                              <option value="2">Reservado</option>
                              <option value="3">Vendido</option>
                              <option value="4">Enviado</option>
                            </select>
                        </div>
                    </div>
                </div>
              </div>
              <div class="container">
                    <input type="file" id="file-input" name="imagenes-cargadas[]" multiple style="display:none;">
                    <button type="button" id="add-images" class="btn btn-primary" style="background: #d79e46; border-color: #d79e46">Agregar imágenes</button>
                    <br>
                    <div id="image-container" class="d-flex flex-wrap mt-3" >
                        <!-- Imágenes aquí -->
                    </div>
                <div id="hidden-inputs"></div>
                <input type="hidden" name="deleted_images" id="deleted_images">
                <input type="hidden" name="images" id="images" value="">
              </div>
              <div class="tile-footer">
      <div class="modal-footer">
<div id="loading-icon" class="loading-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="40" height="40">
  <img src="{{url('/static/images/loading.png')}}">
</div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background:red; border-color: red;">Cerrar</button>
        {!!Form::submit('SUBIR', ['class' => 'btn btn-primary', 'style' => 'background: #d79e46; border-color: #d79e46;', 'id' => 'enviarBtn'])!!}
      </div>      
              </div>
        {!!Form::close()!!} {{-- </form>
 --}}      </div>
    </div>
  </div>
</div>
 <div class="modal fade" id="modalForGen" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="userEditInfoContainer"></div>
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

<script>
let imagesArray = [];
let deletedImages = [];
let maxFiles = 12;

  document.getElementById('agregar1').addEventListener('click', () => {
  let container = document.getElementById('image-container');
    container.innerHTML = ''
  });;

function updateImagesInput() {
    let imagesInput = document.getElementById('images');
    imagesInput.value = JSON.stringify(imagesArray);
    let imageWrapper = document.querySelector('.image-wrapper[data-index="0"]');
    let firstImageWrapper = document.querySelector('.image-wrapper');
    let imageWrappers = document.querySelectorAll('.image-wrapper');
    imageWrappers.forEach((imageWrapper) => {
        if (imageWrapper.getAttribute('data-index') !== '0') {
            imageWrapper.style.border = '';
            imageWrapper.style.borderRadius = '';
            let label = imageWrapper.querySelector('.image-label');
            if (label) {
                label.remove();
            }
        } else {
            imageWrapper.style.border = '3px inset #a250ff';
            imageWrapper.style.borderRadius = '5px';
            let label = imageWrapper.querySelector('.image-label');
            if (label) {
                label.innerHTML = 'Imagen principal';
            } else {
                label = document.createElement('div');
                label.classList.add('image-label');
                label.innerHTML = 'Imagen principal';
                imageWrapper.appendChild(label);
            }
        }
    });
    if (!imageWrapper) {
        firstImageWrapper.style.border = '3px inset #a250ff';
        firstImageWrapper.style.borderRadius = '5px';
        label = document.createElement('div');
        label.classList.add('image-label');
        label.innerHTML = 'Imagen principal';
        firstImageWrapper.appendChild(label);
    }
}
function addImage(image) {
    let container = document.getElementById('image-container');
    container.innerHTML = '';
    let newImage = document.createElement('div');
    newImage.setAttribute('class', 'image-wrapper');
    newImage.style.position = 'relative';
    newImage.style.marginInlineEnd = '10px';
    newImage.style.marginBlockEnd = '5px';
    newImage.style.marginBlockStart = '5px';
    newImage.style.maxHeight =  '125';
    console.log(image);
    newImage.setAttribute('data-path', image.path);
    newImage.innerHTML = `
        <img style="width: 10rem; height: 7.5rem" src="{{ url('/') }}${image.url}" alt="Image">
        <div class="loading-text" style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Cargando...</div>
        <button type="button" class="delete-image" style="  position: absolute;top: 0;right: 0;width: 30px;height: 30px;background-color: #f3395b;border-radius: 50%;color: white;font-size: 18px;text-align: center;line-height: 27px;vertical-align: middle;cursor: pointer;border: none;" data-path="${image.path}">&#x2715;</button>
    `;
    container.appendChild(newImage);
    imagesArray.push(image);
    updateImagesInput();
    let imageElement = newImage.querySelector('img');
    imageElement.onload = function() {
        newImage.querySelector('.loading-text').style.display = 'none';
    }
}

function deleteImage(imagePath) {
    console.log("Image path:", imagePath);
    let container = document.getElementById('image-container');
    let imageWrapper = container.querySelector(`.image-wrapper[data-path="${imagePath}"]`);
    console.log(imageWrapper);
    container.removeChild(imageWrapper);
    imagesArray = imagesArray.filter(image => image.path !== imagePath);
    updateImagesInput();
}
function updateImageOrder(){
  let container = document.getElementById('image-container');
  let imageWrapper = container.querySelectorAll('.image-wrapper');
  imagesArray = [];
  for (let i = 0; i < imagesWrappers.length; i++){
    let imageId = parseInt(imageWrappers[i].getAttribute('data-id'));
    let image = {
      id: imageId,
      order: i
    };
    imagesArray.push(image);
  }
  updateImagesInput();
}
function handleAddImage(file) {
    let loadingIcon = document.getElementById('loading-icon');
    loadingIcon.style.display = 'block';
    document.getElementById('enviarBtn').disabled = true;
    let formData = new FormData();
    formData.append('uploaded_image', file);
    formData.append('action', 'add');
    formData.append('_token', '{{ csrf_token() }}');

    fetch('{{ route('product.image_action') }}', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            let image = {
                path: data.image.path,
                url: '/uploads/' + data.image.path
            };
            addImage(image);
            loadingIcon.style.display = 'none';
            document.getElementById('enviarBtn').disabled = false;
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('loading-icon').style.display = 'none';
            loadingIcon.classList.remove('rotate');
            document.getElementById('add-images').disabled = false;
        });
}

function handleDeleteImage(imagePath) {
    console.log("Image path:", imagePath);
    let formData = new FormData();
    formData.append('image_path', imagePath);
    formData.append('action', 'delete');
    formData.append('_token', '{{ csrf_token() }}');

    fetch('{{ route('product.image_action') }}', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                deleteImage(imagePath);
            } else {
                alert('Error al eliminar la imagen');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
function handleUpdateImageOrder(newOrder){
  fetch('{{route('product.image_action')}}', {
    method: 'POST',
    headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
      action: 'update', 
      new_oder: newOrder
    })
  }).then(response => response.json()).then(data =>{
    if(data.error){
      alert('Error al cambiar la posición la imagen');
    }else{
      updateImageOrder();
    }
  }).catch(error => {
    console.error('Error:', error);
  });
}
/*nuevas funciones (listeners) */
document.getElementById('add-images').addEventListener('click', () => {
  let fileInput = document.getElementById('file-input');
  fileInput.click();
});
document.getElementById('file-input').addEventListener('change', (event) => {
    let files = event.target.files;
    if (imagesArray.length + files.length <= maxFiles) {
        for (let i = 0; i < files.length; i++) {
            handleAddImage(files[i]);
        }
    } else {
        alert('Has alcanzado el límite máximo de imágenes permitidas.');
    }
});
document.addEventListener('click', function (event) {
    if (event.target.matches('.delete-image')) {
        let imagePath = event.target.getAttribute('data-path');
        handleDeleteImage(imagePath);
    }
});
document.addEventListener('DOMContentLoaded', function () {
    let sortable = Sortable.create(document.getElementById('image-container'), {
        animation: 150,
        onEnd: function (evt) {
            let oldIndex = evt.oldIndex;
            let newIndex = evt.newIndex;
            let movedItem = imagesArray.splice(oldIndex, 1)[0];
            imagesArray.splice(newIndex, 0, movedItem);
            let imageWrappers = document.querySelectorAll('#image-container > div');
            for (let i = 0; i < imageWrappers.length; i++) {
                imageWrappers[i].setAttribute('data-index', i);
            }

            updateImagesInput();
        }
    });
});
  $(document).ready(function(){
     $('.editProductBtn').on('click', function(){
      var productId = $(this).data('id');
      var url = 'getProductInfo/' + productId;
      $('#userEditInfoContainer').empty();
      $.ajax({
        type: 'GET',
        url: url,
        success: function(response){
          $('#userEditInfoContainer').html(response);
          loadExistingImages(productId);
          $('#modalForGen').modal('show');
        },
        error: function(xhr, status, error){
          //recordar poner los errores
        }
      });
     });
  });
  function loadExistingImages(productId) {
      let container = document.getElementById('image-container');
      container.innerHTML = '';
      $.ajax({
          type: 'GET',
          url: 'getProductImages/' + productId,
          success: function(response) {
              response.forEach(function(imageData) {
                  const image = {
                      path: imageData.imagePath + '.webp',
                      //url: '/uploads/' + imageData.imagePath
                  };
                  //onsole.log(imageData.imagePath);
                  addImage(image);
              });
          },
          error: function(xhr, status, error) {
              //ERRORes aqui igual
          }
      });
  }
  function openProductInNewTab(id, ruta){
    const url = `/tienda/producto/${id}/${ruta}`;
    const newTab = window.open(url, '_blank');
    if(newTab){
      newTab.focus();
    }else{
      alert('El navegador bloqueó la apertura de una nueva pestaña');
    }
  }
</script>
@endsection