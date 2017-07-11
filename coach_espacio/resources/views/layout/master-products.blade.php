@extends('/layout/master')
<?php
	$activePage = 'productos'; 
	$userLogin = null;
?>
@section('head')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/productos.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">

	<link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
@endsection


@section('content')
	<div class="menu-products">
		<div>
			<ul class='menu-section'>

				@foreach($categories as $cat)
					@if ((!$id AND $cat->id ==1) OR ($id AND $cat->id == $id))
						<li><a class="product-category category-selected" href="/categoria/{{$cat->id}}">{{$cat->name}}</a></li>
					@else
						<li><a class="product-category" href="/categoria/{{$cat->id}}">{{$cat->name}}</a></li>
					@endif
				@endforeach
			</ul>
		</div>
		<div>	
			<ul class='menu-section'>
				<li><a class="product-category" href="cursos.php">Ir a ver nuestros cursos</a></li>	
			</ul>
			
		</div>	
	</div>

	<div>
		<div class = "banner">
		</div>
	</div>
	
	<div class ="products-container">
	@if (!count($products))
		<div>
			<h2>Actualmente no contamos con productos de esta categoría :(</h2>
		</div>
	@else
		@foreach($products as $product)
			<a href="/producto/{{$product->id}}" class = "product-item" onmouseover="changeInfo(this)" onmouseout="overInfo(this)">
				<div class ="product-image">
					<img class="product-image-resize" src="/images/products/{{$product->picture}}">
				</div>
				

				<!-- if no stock o descuento -->
				<div class ="product-special">
				@if ($product->stock == 0)
					<img src="/images/products/noStock.png">
				@endif
				</div>	
			

				<div class ="product-title"><p>{{$product->name}} | {{$product->category->name}}</p></div>
				<div class ="info-container" >
					<div class ="product-price"><p>${{$product->price}}</p></div>
					<div class ="product-option">+ VER MÁS</div>
				</div>
			</a>
		@endforeach
	@endif
	</div>
	<script>
		function changeInfo($t){
			$t.querySelector(".product-price").style.opacity="0";
			$t.querySelector(".product-option").style.opacity="1";
		}
		function overInfo($t){
			$t.querySelector(".product-price").style.opacity="1";
			$t.querySelector(".product-option").style.opacity="0";
		}
	</script>
@endsection