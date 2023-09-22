@extends('Tienda.master')
@section('view')
	<title>Suabasta Ganadera - Ganado Yucatán</title>
	<style>
   body {
    margin-top: 0px;
    padding-top: 0px;
    font-family: 'League Spartan', sans-serif;
   }
   .wrapper {
    padding-left: 0px;
    margin-left: 0px;
   }

        .footer{
            font-family: 'League Spartan', sans-serif;
        }

        .back-main{
            display: flex;
            flex-direction: row;
            height: 30vh;
            width: 100%;
        }
        .back-main .item:nth-child(1){
            width: 60%;
            background-color: whitesmoke;
            margin-inline-start: 20%;
        }
        .list-unlisted{
          text-align: initial;
          padding: 0;
          margin: 5px 0 5px 0;

          color: #21223e;
          font-size: 12px;
          margin-right: 5px;
          margin-left: 40px;
        }
        .info-container{
            display: grid;
            justify-items: center;
        }
        .back-main .item:nth-child(2){
            width: 40%;
            background-color: #21223e;
            border-left: 5px solid yellow;
        }
        .first-plane{
            z-index: 1;
        }
        .slider{
            width: 280px;
            height: 175px;
            margin: auto;
            overflow: hidden;
            z-index: 2;
        }
        .slider ul{
            display: flex;
            padding: 0;
            width: 400%;

            animation: cambio 20s infinite;

        }
        .slider li{
            width: 100%;
            list-style: none;
        }
        .slider img{
            width: 280px;
            height: 135px;
            object-fit: cover;
            margin-top: 2rem
        
        
        }
        h3{
            font-family: sans-serif;
            text-align: center;
            margin-bottom: 4px;
            margin-top: 1px;
            color: black;
        }

        
        h3:hover{
            color: rgb(255, 255, 255);
        }
        @keyframes cambio{
            0%  {margin-left: 0;}
            20% {margin-left: 0;}

            25% {margin-left: -100%;}
            45% {margin-left: -100%;}

            50% {margin-left: -200%;}
            70% {margin-left: -200%;}

            75% {margin-left: -300%;}
            100% {margin-left: -300%;}

        }
        .banner{
            /* width: 100vw; */
            height: 50vh;
        }
        .banner img{
            width: 100%;
            height: 50vh;
            object-fit: cover;
        }
        @media (max-width: 640px){
        .banner{
          height: 25vh;
        }
        .banner img{
          width: 100%;
          height: 25vh;
          object-fit: contain;
        }
      }

        .rows{
          margin-right: -15px;
          margin-left: -15px;
          /* background-color: #21223e; */
          color: #f6c819;
        }
        .btn-infos {
          color: white;
          background-color: #f6c819;
          border-color: #21223e;
        }
        .breadcrumbs {
          padding: 8px 15px;
          margin-bottom: 20px;
          list-style: none;
          background-color: #21223e;
          border-radius: 4px;
        }

 </style>
</head>

<body>
    <div class="banner">
      <img src="{{asset('static/tienda/img/subasta-ganadera.png')}}" alt="" srcset="">
    </div>

    <div id="wrapper">

        <!-- Navigation -->
          <!--aqui termina navigation-->
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="rows">
                    <div class="col-lg-12">
                        <ol class="breadcrumbs">
                            <li>
                                <i class="fa fa-comment"></i> Subastas
                            </li>
                            <li class="active">
                                <i class="fa fa-comments"></i> Todas las subastas
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Listado de subastas -->
                <div class="rows">
				@foreach($products as $p)
                    <div class="col-sm-6 col-md-4">
                    	<div class="thumbnail">
                        	<img src="{{asset('uploads/subasta/'.$p->carpeta.'/'.$p->portada.'.webp')}}" style='height: 220px;object-fit: cover;'>
                        	    <div class="caption">
                        	        <h3>{{$p->nombre}}</h3>
                        	        <p>{{$p->fechaCiere}}</p>
                        	        <p><?php echo "$$p->min.00 - $$p->max.00"; ?></p>
                        	        <h4>Oferta actual: <b class="text-danger"><?php echo "OFERTAAKI.00"; ?></b></h4>
                        	        <p><a class='btn btn-success btn-block' href="{{url('subastas/'.$p->id_producto)}}" role='button' >Hacer Oferta</a></p>
                        	    </div>
                    	</div>
                    </div>
{{--                                       <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">
                                          <?php echo "<img src='images/productos/$imagen_p' style='height: 220px;'>";?>
                                          <div class="caption">
                                            <h3><?php echo $nombre_p; ?></h3>
                                            <p><?php print $interval->format('%a días %H horas %I minutos'); ?></p>
                                            <p><?php echo "$$min.00 - $$max.00"; ?></p>
                                            <h4>Oferta actual: <b class="text-danger"><?php echo "$0.00"; ?></b></h4>
                                            <?php echo "<p><a href='subasta.php?id=$id_subasta' class='btn btn-infos btn-block' role='button'>Primero en ofertar</a></p>";?>
                                          </div>
                                        </div>
                                      </div> --}}
                @endforeach
                </div>

            </div>
        </div>

    </div>
    <!-- /#wrapper -->
    <div class="footer">
        <div class="back-main">
            <div class="item">
                <div class="slider">
                    <ul>
                        <li><img src="https://cdn.pixabay.com/photo/2019/08/22/09/09/cow-4423003__340.jpg" alt=""></li>
                        <li><img src="https://cdn.pixabay.com/photo/2016/03/05/19/09/cows-1238273__340.jpg" alt=""></li>
                        <li><img src="https://cdn.pixabay.com/photo/2019/08/22/09/09/cow-4423003__340.jpg" alt=""></li>
                        <li><img src="https://cdn.pixabay.com/photo/2016/03/05/19/09/cows-1238273__340.jpg" alt=""></li>
                    </ul>
                  </div>
            </div>
        </div>
    </div>
 <script >
 	var closingTime = '';

 	function updatetiempo(){
 		var now = new Date().getTime();
 		var endTime = new Date(closingTime).getTime();
 		var timeRamain = endTime - now;

 		if(timeRamain < 0){
 			clearInterval(countDownInterval);
 			document.getElementById('countdown').innerHTML = '';
 		}
 	}
 </script>
    @endsection