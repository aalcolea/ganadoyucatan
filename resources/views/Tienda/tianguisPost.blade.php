<!DOCTYPE html>
<html lang="en">
   <link rel="icon" type="image/png" href="./assets/img/cow.ico"/>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{url('/static/tienda/css/styles-form.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;700&family=Roboto+Slab:wght@300;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    

    <title>La plataforma ganadera de la península de Yucatán||Ganado Yucatán</title>
</head>
<body >
    <div class="page">
        <!-- main content -->
        <section class="containers">
            <section class="main-content">
                <h5 class="modal-title" id="titleModal">Agregar Ganado</h5>
                <div class="modal-body">
                    <form  method="POST" enctype="multipart/form-data" style="font-weight: bolder;font-size: 20px;color: black;"
                        id="formProductos" name="formProductos">  
                     @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label">Título del Anuncio <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="nombre" id="nombre">
                                </div> 
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label" for="estados">Estado:</label>
                              <select class="form-control" name="estados" id="estados">
                                  <option value=""></option>
                              </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="descripcion">Descripción del producto:</label>
                                <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label" for="ciudades">Ciudad:</label>
                                <select  class="form-control" name="ciudades" id="ciudades">
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label"> Peso del ganado <span class="required">*</span></label>
                                <input maxlength="5" class="form-control" id="pesoG" name="pesoG" type="text" placeholder="Peso en kilogramos" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Precio<span class="required">*</span></label>
                                <input maxlength="10" class="form-control" id="precio" name="precio" type="number" placeholder="Precio" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Cantidad Disponible<span class="required">*</span></label>
                                <input class="form-control" maxlength="5" id="txtStock" name="txtStock" type="text" placeholder="Numero de ejemplares" required="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">Enlace Youtube</label>
                                <input class="form-control" id="txtLink" name="txtLink" type="text" >
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Raza</label>
                                <input class="form-control" maxlength="30" id="txtRaza" name="txtRaza" type="text" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="listVacu">Vacunado</label>
                                <select class="form-control selectpicker" id="listVacu" name="listVacu">
                                    <option value="Vacunado">Vacunado</option>
                                    <option value="NO Vacunado">No Vacunado</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="lisTipo">Tipo de ganado</label>
                                <select class="form-control selectpicker" id="lisTipo" name="lisTipo" >
                                <option value="Destetes">Destetes</option>
                                <option value="Novillas">Novillas</option>
                                <option value="Ternero">Ternero</option>
                                <option value="Toro de engorda">Toro de engorda</option>
                                <option value="Vaca de engorda">Vaca de engorda</option>
                                <option value="Vaquillona">Vaquillona</option>
                                <option value="Vaquillonas preñadas">Vaquillonas preñadas</option>
                                <option value="Ganado para matadero">Ganado para matadero</option>
                                <option value="Vaca terminada<">Vaca terminada</option>
                                <option value="Toro terminado">Toro terminado</option>
                                <option value="Novillonas de registro">Novillonas de registro</option>
                                <option value="Novillonas preñada">Novillonas preñadas</option>
                                <option value="Toro para cebar">Toro para cebar</option>
                                <option value="Vaca para cebar">Vaca para cebar</option>
                                <option value="Vaca Semiterminada">Vaca Semiterminada</option>
                                <option value="Toro Semiterminado">Toro Semiterminado</option>
                                <option value="Toro Castrado">Toro Castrado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="listArete">Arete</label>
                                <select class="form-control selectpicker" id="listArete" name="listArete" >
                                <option value="arete">Con Arete</option>
                                <option value="SinArete">Sin-Arete</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="listCert">Certicado</label>
                                <select class="form-control selectpicker" id="listCert" name="listCert" >
                                <option value="Certificado">Cuenta con certificado</option>
                                <option value="NOcertificado">NO cuenta con certificado</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-7">
                                <label class="control-label">Nombre del Propetario o Rancho<span class="required">*</span></label>
                                <input class="form-control" id="propietario" name="propietario" type="text" placeholder="Nombre del propietario" required="">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="control-label">Número telefónico<span class="required">*</span></label>
                                <input maxlength="10" class="form-control" id="numero" name="numero" type="number" placeholder="Numero" required="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="custom-file-upload"  for="imagen1">cargar imagen:</label><br>
                                <input type="file" name="imagen1" id="imagen1">
                                <div class="image-wrapper">
                                    <img id="prev1" height="100" width="150" style="object-fit: cover;" />
                                    <button class="delete-button" type="button" style="display: none;">Eliminar</button>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="custom-file-upload"  for="imagen2">cargar imagen:</label><br>
                                <input type="file" name="imagen2" id="imagen2">
                                <img id="prev2" height="100" width="150" style="object-fit: cover;" />
                                <button class="delete-button" type="button" style="display: none;">Eliminar</button>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="custom-file-upload"  for="imagen3">cargar imagen:</label><br>
                                <input type="file" name="imagen3" id="imagen3">
                                <img id="prev3" height="100" width="150" style="object-fit: cover;" />
                                <button class="delete-button" type="button" style="display: none;">Eliminar</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="custom-file-upload"  for="imagen4">cargar imagen:</label><br>
                                <input type="file" name="imagen4" id="imagen4">
                                <img id="prev4" height="100" width="150" style="object-fit: cover;" />
                                <button class="delete-button" type="button" style="display: none;">Eliminar</button>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="custom-file-upload"  for="imagen5">cargar imagen:</label><br>
                                <input type="file" name="imagen5" id="imagen5">
                                <img id="prev5" height="100" width="150" style="object-fit: cover;" />
                                <button class="delete-button" type="button" style="display: none;">Eliminar</button>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="custom-file-upload"  for="imagen6">cargar imagen:</label><br>
                                <input type="file" name="imagen6" id="imagen6">
                                <img id="prev6" height="100" width="150" style="object-fit: cover;" />
                                <button class="delete-button" type="button" style="display: none;">Eliminar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="custom-file-upload"  for="imagen7">cargar imagen:</label><br>
                                <input type="file" name="imagen7" id="imagen7">
                                <img id="prev7" height="100" width="150" style="object-fit: cover;" />
                                <button class="delete-button" type="button" style="display: none;">Eliminar</button>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="custom-file-upload"  for="imagen8">cargar imagen:</label><br>
                                <input type="file" name="imagen8" id="imagen8">
                                <img id="prev8" height="100" width="150" style="object-fit: cover;" />
                                <button class="delete-button" type="button" style="display: none;">Eliminar</button>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="custom-file-upload"  for="imagen9">cargar imagen:</label><br>
                                <input type="file" name="imagen9" id="imagen9">
                                <img id="prev9" height="100" width="150" style="object-fit: cover;" />
                                <button class="delete-button" type="button" style="display: none;">Eliminar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        margin-top: 10px;">
                                <button id="btnActionForm" class="btn btn-dark btn-sm btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Subir al sistema</span></button>
                            </div>
                        </div>
                        <br>
                    </form> 
                </div>
            </section>
            <section class="side-content">
                <div></div>
                <p>Ganado Yucatán</p>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="384" height="315" src="https://www.youtube.com/embed/_GjITm43bwA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="margin-block-start: 450px;"></iframe>
                        </div>  
            </section>
        </section>
    </div>

</body>
</html>
<script src="https://ganadoyucatan.com/tienda_virtual/Assets/tienda/vendor/sweetalert/sweetalert.min.js"></script>   
<script>
  for (let i =1; i<=9;i++){
    const imageContainer = document.querySelector(`#imagen${i}`).parentElement;
    const deleteButton = document.createElement('button');
    deleteButton.classList.add('delete-button');
    deleteButton.textContent = 'Eliminar';
    deleteButton.style.display = 'none';
    deleteButton.style.position = 'relative';
    deleteButton.style.bottom = '100px';
    deleteButton.style.left = '35px';
    deleteButton.style.borderRadius = '5px';
    deleteButton.style.backgroundColor = 'red';
    deleteButton.style.color = 'white';
    deleteButton.style.width = '46%'
    imageContainer.appendChild(deleteButton);

    deleteButton.addEventListener('click', (e)=> {
        e.preventDefault();
        document.querySelector(`#imagen${i}`).value = null;
        document.querySelector(`#prev${i}`).src = null;
        deleteButton.style.display = 'none';
    });

    document.querySelector(`#imagen${i}`).addEventListener('change', (e) => {
        const file = e.target.files[0];
        const prevImage = document.querySelector(`#prev${i}`);
        if(file){
            prevImage.src = URL.createObjectURL(file);
            deleteButton.style.display = 'none';
        }else {
            prevImage.src = '';
            deleteButton.style.display = 'none';
        }
    });


    // agrega el evento de carga de imagen al input
    document.querySelector(`#imagen${i}`).addEventListener('change', (event) => {
        const file = event.target.files[0];
        const prevImage = document.querySelector(`#prev${i}`);

        if (file) {
            prevImage.src = URL.createObjectURL(file);
            deleteButton.style.display = 'inline-block';
        } else {
            prevImage.src = '';
            deleteButton.style.display = 'none';
        }
    });
}

/*obtener valor ciudad y estado*/
const select = document.querySelector('#estados');
const selectC = document.querySelector('#ciudades');
const input = document.querySelector('#estado1');
const inputC = document.querySelector('#ciudad1');
select.addEventListener('change', function(){
  input.value = this.value;
});
selectC.addEventListener('change', function(){
  inputC.value = this.value;
});
test = "https://ganadoyucatan.com/tianguis.html?msg=subida"
if(test == window.location.href ){
        swal({
      title: '¡Listo!',
      text: 'Tu solicitud pronto será aprobada',
      icon: 'success',
      button: 'Entendido'
    });

}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>  
<script >
$(document).ready(function () {
    $.ajax({
    url: "/get-estados",
    type: "GET",
    dataType: "json",
    success: function (data) {
      $("#estados").empty();
      $("#estados").append('<option value="">Seleccione un Estado</option>');
      $.each(data, function (key, value) {
        $("#estados").append(
          '<option value="' + value.id + '">' + value.nombre + "</option>"
        );
      });
    },
  });
  $("#estados").on("change", function () {
    var estadoId = $(this).val();
    if (estadoId) {
      $.ajax({
        url: "/get-ciudades-by-estado/" + estadoId,
        type: "GET",
        dataType: "json",
        success: function (data) {
          $("#ciudades").empty();
          $.each(data, function (key, value) {
            $("#ciudades").append(
              '<option value="' + value.id + '">' + value.nombre + "</option>"
            );
          });
        },
      });
    } else {
      $("#ciudades").empty();
    }
  });
});  
</script>

