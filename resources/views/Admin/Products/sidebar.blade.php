<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <meta name="routName" content="{{ Route::currentRouteName() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&family=Poppins:wght@100;500&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="{{url('/static/css/admin/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{url('/static/css/admin/hamburgers.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{url('/static/css/admin/hamburgers.css') }}">
<link rel="stylesheet" type="text/css" href="{{url('/static/css/admin/main.css') }}">{{-- 
<link rel="stylesheet" type="text/css" href="{{url('/static/css/admin/bootstrap-select.min.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{url('/static/js/admin/bootstrap.min.js') }}">
<link rel="stylesheet" type="text/css" href="{{url('/static/js/admin/bootstrap-select.min.js') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{url('/static/js/admin/popper.min.js') }}">
<link rel="stylesheet" type="text/css" href="{{url('/static/js/admin/bootstrap.js') }}">
<link rel="stylesheet" type="text/css" href="{{url('/static/css/admin/bootstrap/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{url('/static/css/admin/bootstrap/bootstrap.min.css"') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>

    <header class="app-header">
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-bars"></i></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user fa-lg"></i>
            
        </button>
        {{-- <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i style="color: black" class="fa fa-user fa-lg"></i></a> --}}
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="/usuarios/perfil"><i class="fa fa-user fa-lg"></i> Ajustes de Perfil
            </a></li>
            <li><a class="dropdown-item" href="/logout"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </header>
     <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <img class="app-sidebar__user-avatar" src="{{url('/static/images/logo.svg')}}" alt="Logo" style="width: 350px;margin-inline-start: -50px;margin-bottom: -45px;margin-top: -55px;" >
      <div class="app-sidebar__user"><img style="margin-inline-start: 35%;" class="app-sidebar__user-avatar" src="{{url('/')}}/userspics/{{Auth::user()->foto}}" alt="User Image"></div>
        <div>
          <p class="app-sidebar__user-name" style="margin-inline-start: 25%;">{{Auth::user()->nombres}}</p>
{{--           <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></p> //falta asignar el innerjoin con nombres de rol
 --}}        </div>
      
      <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="{{url('/admin')}}/products" target="_blank">
                <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                <span class="app-menu__label">Catálogo</span>
            </a>
        </li>
        {{-- <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?> //Completar innerjoin con permisos --}}
        <li>
            <a class="app-menu__item" href="{{url('/admin')}}/dashboard">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Estadísticas</span>
            </a>
        </li>
        {{-- <?php } ?> --}}
        <?php if(Auth::user()->rolid == '1'){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{url('/admin')}}/usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                <li><a class="treeview-item" href="{{url('/admin')}}/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            </ul>
        </li>
        <?php } ?>
       <!--  <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/clientes">
                <i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="app-menu__label">Clientes</span>
            </a>
        </li>
        <?php } ?> -->
        <?php if(Auth::user()->rolid == '1' || Auth::user()->rolid == '6'){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-archive" aria-hidden="true"></i>
                <span class="app-menu__label">Tu tienda</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <?php if(Auth::user()->rolid == '1' || Auth::user()->rolid == '6'){ ?>
                <li><a class="treeview-item" href="{{url('/admin')}}/productos"><i class="icon fa fa-circle-o"></i> Carga tu ganado aquí
                </a></li>
                <?php } ?>
                <?php if(Auth::user()->rolid == '1' || Auth::user()->rolid == '6'){ ?>
                <li><a class="treeview-item" href="{{url('/admin')}}/ranchos"><i class="icon fa fa-circle-o"></i> Carga tus ranchos aquí
                </a></li>
                <?php } ?>
                <?php if(Auth::user()->rolid == '1'){ ?>
                <li><a class="treeview-item" href="{{url('/admin')}}/ganado"><i class="icon fa fa-circle-o"></i> Ganado Subido</a></li>
                <?php } ?>
                <?php if(Auth::user()->rolid == '1'){ ?>
                <li><a class="treeview-item" href="{{url('/admin')}}/TianguisAdmin"><i class="icon fa fa-circle-o"></i> Tianguis Ganadero</a></li>
                <?php } ?>
                <?php if(Auth::user()->rolid == '1'){ ?>
                <li><a class="app-menu__item" href="{{url('/admin')}}/expo">
                <i class="fa fa-star" aria-hidden="true"></i><span class="app-menu__label">Exposicon</span></a></li><?php } ?>
            </ul>
        </li>
        <?php } ?>
{{--         <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/pedidos">
                <i class="app-menu__icon fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="app-menu__label">Promociones</span>
            </a>
        </li>
         <?php } ?>

        <?php if(!empty($_SESSION['permisos'][MSUSCRIPTORES]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/suscriptores">
                <i class="app-menu__icon fas fa-user-tie" aria-hidden="true"></i>
                <span class="app-menu__label">Suscriptores</span>
            </a>
        </li>
         <?php } ?> --}}
{{-- Activar estos emnsajes solo en prod porque reciben datos directos --}}
         <?php if(Auth::user()->rolid == '1'){ ?>
        <li>
            <a class="app-menu__item" href="{{url('/admin')}}/contactos">
                <i class="app-menu__icon fas fa-envelope" aria-hidden="true"></i>
                <span class="app-menu__label">Mensajes Admin</span>
            </a>
        </li>
         <?php } ?>
 {{--         <?php if(!empty($_SESSION['permisosMod']['r'])){ ?>
            <?php 
            $conn = mysqli_connect("localhost", "lz9kr6l1o9ym", 'Qlyjptf8$Vz%', "GanadoYucatan1");
$personaid = $_SESSION['idUser'];
$query = mysqli_query($conn, "SELECT * FROM mensaje WHERE status = 1 AND vendedorid = '$personaid'");
$mensajes = array();
while ($row = mysqli_fetch_assoc($query)) {
  $mensajes[] = $row;
}
  ?> 
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/mensajes">
                <i class="app-menu__icon fas fa-envelope" aria-hidden="true"></i>
                <span class="app-menu__label">Mensajes <b style="background-color: #9f0f00; border-radius: 20%;"><?php echo count($mensajes); ?></b></span>
            </a>
        </li>
         <?php } ?>
         <?php if(!empty($_SESSION['permisos'][MDPAGINAS]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/paginas">
                <i class="app-menu__icon fas fa-file-alt" aria-hidden="true"></i>
                <span class="app-menu__label">Páginas</span>
            </a>
        </li>
         <?php } ?>--}}

        <li>
            <a class="app-menu__item" href="{{url('/logout')}}">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Cerrar Sesión</span>
            </a>

      </ul>
    </aside>
	@section('content')

	@show
</body>