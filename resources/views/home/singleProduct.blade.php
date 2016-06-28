@extends('home/layout/master')
@section('content')
<div class="jumbotron">
	<div class="container">
     <h1>{{ $singleProduct->product_name}}</h1>
    <hr>
   <div class="row">
   @if(!empty($singleProduct->product_firstImage)) 
   <div class="col-md-6 col-sm-6 col-lg-6">
  <img src="{{ asset('uploads/product_images')."/".$singleProduct->product_firstImage }}"  style="height:400px;width:100%">
   </div>
  @endif
    @if(!empty($singleProduct->product_secondImage)) 
      <div class="col-md-6 col-sm-6 col-lg-6">
     <img src="{{ asset('uploads/product_images')."/".$singleProduct->product_secondImage }}"  style="height:400px;width:100%">
     </div>
    @endif
  </div>
  <h2>product quantity: {{$singleProduct->product_quantity}}</h2>
   <p>{{$singleProduct->product_note}}</p>
   <br>
   <button class="btn btn-primary btn-lg">Add to Cart</button>
  </div>
</div>
@stop