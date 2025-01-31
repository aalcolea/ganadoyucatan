@extends('Admin.sidebar')
@section('main')
<main class="app-content">    
    <div class="app-title">
      <div>
          <h1><i class="fas fa-user-tag"></i>Blog</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
        	<a href="{{ route('posts.create') }}" class="btn btn-primary">Crear nuevo post</a>
		    <ul>
		        @foreach ($posts as $post)
		            <li>
		                <h2>{{ $post->title }}</h2>
		                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="100">
		                <p>{{ Str::limit($post->content, 100) }}</p>
		                <a href="{{ route('posts.show', $post->id) }}">Leer más</a>
		                <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
		                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
		                    @csrf
		                    @method('DELETE')
		                    <button type="submit">Eliminar</button>
		                </form>
		            </li>
		        @endforeach
		    </ul>
        </div>
    </div>
</main>

@endsection