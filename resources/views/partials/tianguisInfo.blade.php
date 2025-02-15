{!!Form::open(['url'=> 'admin/products/postProductInfo/'.$product->idproducto, 'files' => true, 'style' => 'padding: 0;'])!!}
          {{-- <form id="formProductos" name="formProductos" class="form-horizontal" action="{{url('admin/products/addNewGen')}}" method="POST" style="padding: 0;"> --}}
              @csrf
              <input type="hidden" id="idProducto" name="idProducto" value="{{$product->idproducto}}">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                      <label class="control-label">Título del Anuncio <span class="required">*</span></label>
                      <input class="form-control" maxlength="100" id="txtNombre" name="txtNombre" type="text" value="{{$product->nombre}}" required="">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Características</label>
                      <textarea class="form-control" maxlength="1000" id="txtDescripcion" name="txtDescripcion" >{{$product->descripcion}}</textarea>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Enlance Youtube</label>
                      <input class="form-control" id="txtLink" name="txtLink" type="text"value="{{$product->link}}">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="estados">Estado:</label>
                      <select class="form-control" name="estados" id="estados">
                        <option value="1" {{ $product->estado == 1 ? 'selected' : '' }}>Yucatán</option>
                        <option value="2" {{ $product->estado == 2 ? 'selected' : '' }}>Campeche</option>
                        <option value="3" {{ $product->estado == 3 ? 'selected' : '' }}>Quintana Roo</option>
                        <option value="4" {{ $product->estado == 4 ? 'selected' : '' }}>Chiapas</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ciudades">Ciudad:</label>
                        <select  class="form-control" name="ciudades" id="ciudades">
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <div class="form-group">
                          <label class="control-label"> Peso del ganado <span class="required">*</span></label>
                          <input maxlength="5" class="form-control" id="txtCodigo" name="txtCodigo" type="text" placeholder="Peso en kilogramos" required=""value="{{$product->peso}}">
                          
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-group">
                          <label class="control-label"> Edad del ganado <span class="required">*</span></label>
                          <input maxlength="5" class="form-control" id="txtEdad" name="txtEdad" type="number" placeholder="Edad en años" required="" value="{{$product->edad}}">
                          
                      </div>
                    </div>
                  </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Precio <span class="required">*</span></label>
                            <input maxlength="11" class="form-control" id="txtPrecio" name="txtPrecio" type="text" required="" value="{{$product->precio}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Cantidad Disponible<span class="required">*</span></label>
                            <input class="form-control" maxlength="5" id="txtStock" name="txtStock" type="number" required="" value="{{$product->stock}}">
                        </div>
                          <div class="form-group col-md-6">
                            <label class="control-label">Nombre del rancho</label>
                            <input class="form-control" maxlength="50" id="txtRancho" name="txtRancho" type="text"value="{{$product->rancho}}" >
                        </div>
                         <div class="form-group col-md-6">
                            <label class="control-label">Raza</label>
                            <select class="form-control selectpicker" id="txtRaza" name="txtRaza" >
                              <option value="{{$product->raza}}" selected disabled hidden>{{$product->raza}}</option>
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
                              <option value="{{$product->vacunado}}" selected disabled hidden>{{$product->vacunado}}</option>
                              <option value="Vacunado">Vacunado</option>
                              <option value="NO Vacunado">No Vacunado</option>
                            </select>
                      </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="listArete">Arete</label>
                            <select class="form-control selectpicker" id="listArete" name="listArete" >
                              <option value="{{$product->arete}}" selected disabled hidden>{{$product->arete}}</option>
                              <option value="Con Arete">Con Arete</option>
                              <option value="Sin Arete">Sin Arete</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="listCert">Certicado</label>
                            <select class="form-control selectpicker" id="listCert" name="listCert" >
                              <option value="{{$product->certificado}}" selected disabled hidden>{{$product->certificado}}</option>
                              <option value="Certificado">Cuenta con certificado</option>
                              <option value="NO certificado">NO cuenta con certificado</option>
                            </select>
                        </div> 
                        <div class="form-group col-md-6">
                            <label class="control-label" class="control-label">Tipo</label>
                            <select class="form-control selectpicker" id="txtTipo" name="txtTipo" >
                              <option value="{{$product->tipo}}" selected disabled hidden>{{$product->tipo}}</option>
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
                              <option value="{{$product->status}}" selected hidden>{{$product->status}}</option>
                              <option value="1">Activo</option>
                              <option value="2">Inactivo</option>
                            </select>
                        </div>                        
                        <div class="form-group col-md-6">
                            <label class="control-label"   for="listEstatus">Estatus</label>
                            <select class="form-control selectpicker" id="listEstatus" name="listEstatus" >
                              <option value="{{$product->estatus}}" selected hidden>{{$product->estatus}}</option>
                              <option value="Disponible">Disponible</option>
                              <option value="Reservado">Reservado</option>
                              <option value="Vendido">Vendido</option>
                              <option value="Enviado">Enviado</option>
                            </select>
                        </div>
                    </div>
                </div>
              </div>
              <div id="image-container" class="d-flex flex-wrap mt-3">
              <div class="container">
                    <input type="file" id="newFile-input" name="imagenes-cargadas[]" multiple style="display:none;">
                    <button type="button" id="add-Newimages" class="btn btn-primary" style="background: #d79e46; border-color: #d79e46">Agregar imágenes</button>
                  </div>
{{--                   @foreach($product->images as $image)
                      <div class="image-wrapper" data-path="{{ $image->path }}">
                          <img style="width: 10rem;height: 7.5rem;" src="{{ asset('uploads/'.$product->carpeta).'/'.$image->img.'.webp'}}" alt="imagen">
                          <button type="button" class="delete-image" data-path="{{ $image->path }}">Eliminar</button>
                      </div>
                  @endforeach --}}
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
{!!Form::close()!!}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>     
<script src="{{url('/static/js/admin/location.js') }}" >
</script>    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script >
document.getElementById('add-Newimages').addEventListener('click', () =>{
  let newFileInput = document.getElementById('newFile-input');
  newFileInput.click();
});
</script>