@extends('home/layout/master')
@section('content')
<section>
  <div class="jumbotron">
	<div class="container">
   <div class="content-top">
    <h1>prduct by  {{ $category_name }}</h1>
    <hr>
    <div class="row">
     @foreach($productList as $product)
     <div class="col-md-4 col-sm-6  col-xs-6 col-lg-4 thumbnail" style="padding:30px;text-align: center;">
       <a href="{{ url('singleProduct',['id'=>$product->id]) }} " ><img  class="img-responsive" src="{{ asset('uploads/product_images')."/".$product->product_firstImage }}" style="height:160px;width:100%;" alt="">
       <h3>{{ $product->product_name}}</h3>
      
        </a>
          <br>
      <button class="btn btn-primary btn-lg">Add to  Cart</button> 
    
      </div>

      @endforeach
    </div>
  {!! $productList->render() !!}
  </div>

</div>

</div>

</section>

@stop