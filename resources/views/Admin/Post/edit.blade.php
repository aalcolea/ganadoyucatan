@extends('Admin.sidebar')
@section('main')
<main class="app-content">    
    <div class="app-title">
      <div> 
        <h1 style="color: black;">Editar post</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" required>
                <br>
                <label for="content">Contenido:</label>
                <textarea name="content" id="content" required>{{ $post->content }}</textarea>
                <br>
                <label for="image">Imagen:</label>
                <input type="file" name="image" id="image">
                <br>
                <button type="submit">Actualizar</button>
            </form>
        </div>
    </div>
</main>
@endsection