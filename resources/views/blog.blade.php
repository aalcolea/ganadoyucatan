@extends('layout')
@section('content')
<div class="tienda-section">
    <div class="banner-main-blog">
        <h1>Noticias</h1>
        <p>¡Bienvenidos a las últimas noticias sobre ganadería! <br>
            Exploraremos los avances más recientes, desafíos y <br>
            tendencias en la industria ganadera a nivel mundial.
        </p>
    </div>

    <div class="container-blog">
        @foreach($posts as $post)
        <div class="card-blog">
            <img class="img-products" 
                 src="{{ asset($post->image ? 'storage/' . $post->image : 'static/images/fondo-blog.jpg') }}" 
                 alt="Imagen de {{ $post->title }}">

            <div class="text-content">
                <hr>
                <h2>{{ $post->title }}</h2>
                <p class="description">{{ Str::limit($post->content, 100, '...') }}</p>
                <a href="{{ route('posts.show', $post->id) }}">
                    <button>Ver noticia</button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pagination">
        {{ $posts->links() }}
    </div>
</div>
@endsection
