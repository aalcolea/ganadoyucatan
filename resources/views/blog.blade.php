@extends('layout')
@section('content')
<div class="tienda-section">
    <div class="banner-main-blog">
        <h1>Noticias</h1>
        <p>¡Bienvenidos a las últimas noticias sobre ganadería! <br>
            exploraremos los avances más recientes, desafíos y <br>
            tendencias en la industria ganadera a nivel mundial
        </p>
    </div>
    <div class="container-blog">
        <div class="card-blog">
            <img class="img-products" src="{{ asset('static/images/fondo-blog.jpg') }}" alt="">
            <div class="text-content">
                <hr>
                <h2>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h2>
                <p class="description">lorem</p>
                <button>Ver noticia</button>
            </div>
        </div>
        <div class="card-blog">
            <img class="img-products" src="{{ asset('static/images/fondo-blog.jpg') }}" alt="">
            <div class="text-content">
                <hr>
                <h2>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h2>
                <p class="description">lorem</p>
                <button>Ver noticia</button>
            </div>
        </div>
        <div class="card-blog">
            <img class="img-products" src="{{ asset('static/images/fondo-blog.jpg') }}" alt="">
            <div class="text-content">
                <hr>
                <h2>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h2>
                <p class="description">lorem</p>
                <button>Ver noticia</button>
            </div>
        </div>
    </div>
</div>
@endsection
