@extends('header')
@section('title', 'Login -')
@section('content')
    <link rel="stylesheet" href="{{url('/static/new/css/login.css')}}">
	<script src="https://kit.fontawesome.com/e9dc34ceb0.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
                <!-- @if(Session::has('message'))
                        <div class="alert alert-{{Session::get('typealert')}}" style="display:none;">
                            {{Session::get('message')}}
                            @if ($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                            @endif
                            <script >
                                $('.alert').slideDown();
                                setTimeout(function(){ $('.alert').slideUp(); }, 50000);
                            </script>
                        </div>
                @endif
    <div class="container_login">
        <div class="forms-container">
            <div class="signin-signup">
            	{!! Form::open(['url' => '/login', 'class' => 'sign-in-form']) !!}
{{--                 <form action="{{url('/login')}}" class="sign-in-form" id="formLogin" name="formLogin">
 --}}                    <h2 class="title">Bienvenido de nuevo</h2>
                    <div class="input-field">
                        <i class="fa-solid fa-phone"></i>
                        <input type="text" id="email" name="email" placeholder="Telefono">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <div id="alertLogin" class="text-center"></div>
                    <div class="form-group">
{{--                     	{!!Form::submit('Entra', ['class' => 'btn-solid"'])!!} --}}
                       <button class="btn-solid" type="submit">
                            <div>
                                <p>Entra</p>
                                <img src="https://img.icons8.com/external-those-icons-lineal-those-icons/24/000000/external-right-arrows-those-icons-lineal-those-icons-3.png"/>
                            </div>
                        </button>
                    </div>

                    <p class="social-text">Visita nuestras redes sociales:</p>

                    <div class="social-media">
                        <a href="https://www.facebook.com/ganadoyucatan" class="social-icon">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/Ganado_Yuc/?fbclid=IwAR14J1yJrsZBGvzOn4mn6NV-ArlgUL1OK7kvOJ0DfBvX5HD9EOV7jX7dmlo" class="social-icon">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <!-- <a href="#" class="social-icon">
                            <i class="fa-brands fa-google"></i>
                        </a>
                    </div>
{{--                 </form>
 --}}                {!! Form::close() !!}

                <form action="" class="sign-up-form">
                    <h2 class="title">Te damos la bienvenida Ganadero</h2>
                    <h3 class="subtitle">Disfruta de los beneficios de la plataforma <br> gratis por 7 dias</h3>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Nombre">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-phone"></i>
                        <input type="text" placeholder="Telefono">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Contraseña">
                    </div>
                    <button class="btn-solid" type="submit">
                        <div>
                            <p>Entra</p>
                            <img src="https://img.icons8.com/external-those-icons-lineal-those-icons/24/000000/external-right-arrows-those-icons-lineal-those-icons-3.png"/>
                        </div>
                    </button>

                    <p class="social-text">O entra con:</p>

                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-content">
                <div class="content_login">
                    <h3>¿Eres nuevo?</h3>
                    <p>Da click aquí para suscribirte y obtener la prueba gratis</p>
                    <button class="btn transparent" id="sign-up-btn" onclick="location.href='{{url(('/register'))}}'">Registrate</button>
                </div>
                <img src="https://ganadoyucatan.com/assets/img/stylized-cow-line-art.svg" alt="" class="image">
            </div>

            <div class="panel right-content">
                <div class="content_login">
                    <h3>¿Ya estás registrado?</h3>
                    <p>Da click aquí para subir tus productos y ver las solicitudes de compras</p>
                    <button class="btn transparent" id="sign-in-btn" type="submit">Inicia sesión</button>
                </div>
                <img src="./assets/img/vaquita.png" alt="" class="image">
            </div>
        </div>
    </div>-->
    <div class="container-login">
        <div class="login-form">
            <img src="{{url('/static/new/iconos/logo-red.png')}}" alt="">
            <p class="main-text">BIENVENIDO DE NUEVO</p>
            <P class="secondary-text">Disfruta de los beneficios de tu suscripción anual</P>
            {!! Form::open(['url' => '/login', 'class' => 'sign-in-form', 'id' => 'formLogin', 'name' => 'formLogin']) !!}
            @csrf
                <hr>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" id="email" name="email" placeholder="Telefono">
                </div>
                <div class="form-group">
                    <label for="telefono">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                </div>
                {!!Form::submit('Entra', ['class' => 'mainButton'])!!}
                {{-- <button class="mainButton" type="submit">Entrar</button> --}}
           {!! Form::close() !!}
        </div>
    </div>

