@extends('home/layout/master')
@section('content')

{{-- <div class="banner">
		<div class="container">
		


			<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider">
			    <li>
					
						<div class="banner-text">
							<h3>Welcome to jwellary managemetn shop</h3>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor .</p>
						<a href="single.html">Learn More</a>
						</div>
				
				</li>
			
			</ul>
		</div>

	</div>
	</div> --}}
	<!-- *********************************** BANNER TEXT ENDS HERERE *******************-->

<!--***************************************CONTENT SECTION GOES HERE ***********************************************-->
<div class="content">
	<div class="container">
	<div class="content-top">
		<h1>NEW RELEASED</h1>
		<div class="grid-in">
		 @foreach($productList as $product)
			<div class="col-md-4 grid-top" style="padding:30px;
    text-align: center;">
				<a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img  class="img-responsive" src="{{ asset('uploads/product_images')."/".$product->product_firstImage }}" style="height:350px" alt="">
							<div class="b-wrapper">
									<h3 class="b-animate b-from-left    b-delay03 ">
										<span>{{ $product->product_name}} </span>	
									</h3>
								</div>
				</a>
		

			<p><a href="/">{{ $product->product_note }}</a></p>
			</div>
		
		      @endforeach
					<div class="clearfix"> </div>
		</div>
	
	</div>

</div>

@stop