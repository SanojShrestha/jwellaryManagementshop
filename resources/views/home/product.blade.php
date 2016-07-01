@extends('home/layout/master')
@section('content')
<section>
<script>
@if(Session::has('success'))
alert('{{ Session::get('success') }}');
@endif
@if(Session::has('failled'))
alert('{{ Session::get('failled') }}');
@endif

</script>
  <div class="jumbotron">
	<div class="container">
   <div class="content-top">
    <h1>Our Latest jwellary Items</h1>
  <hr>
      @if(count($productList))
      @foreach(array_chunk($productList->all(),3) as $row)
      <div class="row">
       @foreach($row as $product)
       <div class="col-md-4 col-sm-4 col-lg-4 thumbnail " style="text-align: center;padding:50px;">
         <a href="{{ url('singleProduct',['id'=>$product->id]) }} "><img  class="img-responsive" src="{{ asset('uploads/product_images')."/".$product->product_firstImage }}" style="height:160px;width:100%;" alt="">
           <h3>{{ $product->product_name}}</h3>
         </a>
         <br>
         @if(Auth::user())
         <div class="row">
         <div class="col-md-3 col-sm-3  col-lg-3 pull-left">
         <h5 style="font-size:16px;color:">Rs:{{ $product->product_price}}</h5>
         </div>
        <div class="col-md-9 col-sm-9 col-lg-9 pull-right">
         <form action="{{ url('add_to_cart') }} " method="post">
          <input type="hidden" name="ordered_user" value="{{ Auth::user()->name }}">
          <input type="hidden" name="order_user_id" value="{{ Auth::user()->id }}">
          <input type="hidden" name="product_name" value="{{ $product->product_name}}">
          <input type="hidden" name="product_price" value="{{ $product->product_price}}">
          <input type="hidden" name="product_category"  value="{{ $product->category_name}}">
          {!! csrf_field()!!}
          <input type="submit" class="btn btn-primary "  value="Add To Cart">
        </form>
        </div>
        </div>
        @endif 

      </div>

      @endforeach
    </div>
    <br>
  @endforeach
  {!! $productList->render() !!}
  @else
  <h2>product item are not avilable</h2>
  @endif


  </div>

</div>

</div>

</section>

@stop