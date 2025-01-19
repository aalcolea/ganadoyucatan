@extends('layout')
@section('content')
<div class="productTienda-section">
    <div class="banner-product--blog">
        <h1>NOTICIAS</h1>
    </div>
    <div class="container-product--Main">
        <div class="route">
            <p>Inicio<span>></span></p><p>Noticia</p><span>></span><p>Lorem ipsum</p>
        </div>
        <div class="container-notice">
            <header>
                <h1>LOREM IPSUM DOLOR SIT AMET, AMET CONSECTETUR ADIPISICING ELIT SED</h1>
                <p class="date-author">20 de agosto del 2023 | Por <a href="#">Jaime Luis</a></p>
            </header>
            <div class="imageNoticeContainer">
                <img src="{{ asset('static/images/fondo-blog.jpg') }}" alt="Cow Image">
            </div>
            <div class="contentNews">
                <div class="text-block">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit in necessitatibus expedita modi aliquam nostrum enim, dolores amet voluptas, repudiandae nihil, voluptatibus explicabo distinctio tempora sequi adipisci atque consequatur ullam.</p>
                </div>
                <div class="separator"></div>
                <div class="text-block">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quisquam itaque fugiat eius, saepe sit enim? Dolor excepturi, eius porro, maiores similique quod dolorum incidunt ratione totam corporis sed illo.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-related--blog">
        <div class="quote">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic sit nemo quidem earum temporibus alias odio eveniet molestiae praesentium itaque. Consequatur repellendus ipsa quibusdam saepe consectetur nostrum ducimus, atque ullam.
        </div>
        <div class="text-block">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. A nam iusto quia, minima consectetur, nulla, quod error eligendi voluptate pariatur ut explicabo delectus animi reiciendis harum quas unde similique dignissimos? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime id, architecto necessitatibus saepe officia impedit pariatur repudiandae deleniti possimus iure perferendis adipisci numquam eum explicabo nam facilis minima. Unde, ipsum.
            </p>
        </div>
        <div class="text-block">
            <p>
                Sed ut perspiciatis unde omnis iste natus error sit , adipisci velit, sed quia non numquam eius mo....
            </p>
        </div>
        <div class="heading"> Noticias que te pueden interesar</div>
        <div class="container-blog-related">
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
</div>

@endsection
