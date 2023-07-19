@extends('admin.products.sidebar')
<style >
* {
  font-family: sans-serif;
}

body {
  background: rgba(0, 247, 255, 1)
}

.parent {
/*  display: flex;
  flex-direction: column;
  align-items: center;*/
}

.parent button {
/*  background-color: #48abe0;*/
  color: white;
  border: none;
  padding: 5px;
  font-size: 31px;
  height: 130px;
  width: 130px;
/*  box-shadow: 0 2px 4px darkslategray;
*/  cursor: pointer;
  transition: all 0.2s ease;
}

.parent button:active {
  background-color: #48abe0;
  box-shadow: 0 0 2px darkslategray;
  transform: translateY(2px);
}

.parent button:not(:first-child) {
  margin-top: 10px;
}
}

</style>
<main class="app-content" style="background: #fff;">
<div class="parent">
	<div class="container text-center" style="margin-block-start: 15%;">
		  <div class="row">
		  	    <div class="col">
  <button style="border-radius: 20%;"><a href="{{url('admin/products/addNewGen')}}"><img style="width: 100%;height: 100%;object-fit: cover;border-radius: 20%;" src="{{url('/static/images/genetico.png')}}"></button>
  	<article style="  background: linear-gradient(to right, hsl(53.6, 67.5%, 49.4%), hsl(25.3, 100%, 59%));-webkit-background-clip: text;-webkit-text-fill-color: transparent;text-align: center;"></a>
  		<h1>Ganado <br>	 Gentico</h1>
	</article>
		  	    </div>		  	    <div class="col">
  <button style="border-radius: 20%;"><a href="{{url('admin/products/addNewCom')}}"><img style="width: 100%;height: 100%;object-fit: cover;border-radius: 20%;" src="{{url('/static/images/tianguis.png')}}"></button>
  	<article style="  background: linear-gradient(to right, hsl(82, 100%, 13.9%), hsl(87.3, 65.8%, 54.1%));-webkit-background-clip: text;-webkit-text-fill-color: transparent;text-align: center;"></a>
  		<h1>Ganado comercial</h1>
	</article>
		  	    </div>		  	    <div class="col">
  <button style="border-radius: 20%;"><a href="{{url('admin/products/addNewSub')}}"><img style="width: 100%;height: 100%;object-fit: cover;border-radius: 20%;" src="{{url('/static/images/subasta.png')}}"></button>
  	<article style="  background: linear-gradient(to right, hsl(0, 80.3%, 60.2%), hsl(0, 97.5%, 31.6%));-webkit-background-clip: text;-webkit-text-fill-color: transparent;text-align: center;"></a>
  		<h1>Subasta Ganadera</h1>
	</article>
		  	    </div>
		  	</div>
		  </div>
</div>
</main>