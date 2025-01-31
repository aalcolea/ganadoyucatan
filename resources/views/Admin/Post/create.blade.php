@extends('Admin.sidebar')
@section('main')
<main class="app-content">    
    <div class="app-title">
      <div> 
        <h1 style="color: black;">Crear nuevo post</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" required>
                <br>
                <label for="content">Contenido:</label>
                <textarea name="content" id="content" required></textarea>
                <br>
                <label for="image">Imagen:</label>
                <input type="file" name="image" id="image">
                <br>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>
</main>
@endsection