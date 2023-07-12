<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="{{url('/static/css/login.css') }}">    
    <link rel="stylesheet" type="text/css" href="{{url('/static/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&family=Poppins:wght@100;500&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{url('/static/css/admin/style.css') }}">
	<title>@yield('title') Ganado Yucatan</title>
</head>
<body>
     <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{url('/')}}/userspics/{{Auth::user()->foto}}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{Auth::user()->nombres}}</p>
{{--           <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></p> //falta asignar el innerjoin con nombres de rol
 --}}        </div>
      </div>
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
        
	@section('content')

	@show
</body>