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
  <div class="jumbotron">
	<div class="container">
   <div class="content-top">
    <h1>Our Latest jwellary Items</h1>
    <hr>
    <div class="row">
     @foreach($productList as $product)
     <div class="col-md-4 col-sm-6  col-xs-6 col-lg-4" style="padding:30px;text-align: center;">
       <a href="{{ url('singleProduct',['id'=>$product->id]) }} "  class="thumbnail"><img  class="img-responsive" src="{{ asset('uploads/product_images')."/".$product->product_firstImage }}" style="height:160px;width:100%;" alt="">
       <h3>{{ $product->product_name}}</h3>
        <br>
      <button class="btn btn-primary btn-lg">Add to  Cart</button> 
        </a>
    
      </div>

      @endforeach
    </div>

  </div>

</div>
</div>

</section>

@stop