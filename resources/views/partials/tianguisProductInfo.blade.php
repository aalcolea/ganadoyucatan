           <table class="table table-bordered">
          <tbody>
            <tr>
              <td> Raza:</td>
              <td>{{$product->raza}}</td>
            </tr>
            <tr>
              <td>Vendedor:</td>
              <td>{{$product->propietario}}</td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td>{{$product->precio}}</td>
            </tr>
            <tr>
              <td>Tipo:</td>
              <td>{{$product->tipo}}</td>
            </tr>
            <tr>
              <td>Ubicacion:</td>
              <td>{{$product->ciudad}} {{$product->location->nombre}}</td>
            </tr>
            <tr>
              <td>Número:</td>
              <td>{{$product->numero}}</td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td>{{$product->descripcion}}</td>
            </tr>
            <tr>
              <td>Fotos de referencia:</td>
              <td>
                @foreach($images as $i)
                  <img src="{{ asset('uploads/tianguis/'.substr($product->datecreated, 0, 10).'/'.$i['ruta'].'.webp')}}" style="max-width: 100%; height: 100px;">
                @endforeach
              </td>
            </tr>
          </tbody>
        </table>