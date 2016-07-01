@extends('home/layout/master')
@section('content')
{{-- SLIDER-STATRT --}}
<section title="slider" id="slider">
  <div class="container-fluid" style="padding:0px;">
    <br>
    <div class="fixthis">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="img1.jpg" alt="Chania" >
          </div>
          
          <div class="item">
            <img src="img2.jpg" alt="Flower" >
          </div>

          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>

</section>
<section id="intro">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-sm-6">
      </div>
      <div class="col-md-6 col-lg-6 col-sm-6">
      </div>

    </div>
  </div>
</section>
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
    @if (count($errors) > 0)
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                @if($product->order_user_id)
          <h2 class="btn btn-primary btn-lg">already ordered</h2>
          @else
         <div class="row">
         <div class="col-md-3 col-sm-3  col-lg-3 pull-left">
         <h5 style="font-size:16px;color:">Rs:{{ $product->product_price}}</h5>
         </div>
        <div class="col-md-9 col-sm-9 col-lg-9 pull-right">
         <form action="add_to_cart" method="post">
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
        @endif 

      </div>

      @endforeach
    </div>
    <br>
    @endforeach
  </div>
  @else 
  <h2>products items are not avilable right now</h2>
  @endif

</div>
<div class="container">
  <ul class="pager">
    <li class="previous" ><a href="{{$productList->previousPageUrl()}}">Previous</a></li>
    <li class="next"><a href="{{$productList->nextPageUrl()}}">Next</a></li>
  </ul>
</div>
</div>

</section>

@stop