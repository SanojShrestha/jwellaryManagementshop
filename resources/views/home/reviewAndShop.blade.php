@extends('home/layout/master')
@section('content')
<div class="jumbotron" style="border:1px solid #ccc;">
<hr>

	<div class="container">
	@if(Session::has('success'))
<div class="alert alert-success text-center">
  <h3 class="text-center">{{ Session::get('success') }}</h3>
  <a href="/"><button class="btn btn-primary btn-lg">Go to shop again</button></a>
</div>
@endif
		<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
             <?php $i=1; ?>
			@if(count($cartItems)) 
			@foreach($cartItems as $items)
			<div class="thumbnail">
			<span class="text-left">{{ $i++}}</span><p class="text-center">{{ $items->product_name  }}</p> 
				<?php 
				$productInstace=new App\product();
				$productImg=$productInstace::select('product_firstImage')->where('product_name', $items->product_name)->first();
				$productImg->product_firstImage;
				?>
			<img src="{{$productImg}}" style="height:150px; width:300px">
		</div>
			@endforeach
		<h3>total: <span> {{ $totalPrice}} </span></h3>
		<hr>
     <form action="{{ url('order')}}" method="post">
      {!! csrf_field()!!}
	   <input type="submit" value="Shop Now" class="btn btn-primary btn-lg btn-block">
	 </form>
			@endif

		</div>
		@stop;

