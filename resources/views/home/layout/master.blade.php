
<!DOCTYPE html>
<html>
<head>
<title>New Store A Ecommerce Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
<link href="{{asset('site/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<script src="{{asset('site/js/jquery.min.js')}}"></script>
<link href="{{asset('site/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href="{{asset('site/css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{asset('site/js/memenu.js')}}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="{{asset('site/js/simpleCart.min.js')}}"> </script>
</head>
<body>
<!--****************************THIS SECTION HEADER OF OUR SITE ********************************************-->
<div class="header">
<!-- *********************************THIS SECTION FOR TOP HEADER STYLING ***********************************8 -->
	<div class="header-top">
		<div class="container">
			<div class="search">
					<form>
						<input type="text" value="Search " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
						<input type="submit" value="Go">
					</form>
			</div>
			<div class="header-left">		
					<ul>
						<li ><a href="login.html"  >Login</a></li>
						<li><a  href="register.html"  >Register</a></li>

					</ul>
					<div class="cart box_1">
						<a href="checkout.html">
						<h3> <div class="total">
							<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
							<img src="{{asset('site/images/cart.png') }}" alt=""/></h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

					</div>
					<div class="clearfix"> </div>
			</div>
				<div class="clearfix"> </div>
		</div>
		</div>
		<!-- ********************************* TOP HEADER STYLING ENDS ***********************************8 -->

		<!--- THIS SECTION GOGES FOR NAVIGATION  BAR STYLE************************************ -->
		<div class="container">
			<div class="head-top">
				<div class="logo">
					<a href="index.html"><img src="{{ asset('images/logo.png') }}" alt=""></a>	
				</div>
		  <div class=" h_menu4">
				<ul class="memenu skyblue">
					  <li class="active grid"><a class="color6" href="index.html">Home</a></li>	
				<li><a class="color6"href="blog.html">Blog</a></li>				
				<li><a class="color6" href="contact.html">Conact</a></li>
   
                    @if (Auth::guest())
                        <li><a class="color6" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="color6" href="{{ url('/register') }}">Register</a></li>
                    @else
                        
                                <li><a class="color6" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>  {{ Auth::user()->name }} Logout</a></li>
                     
                    @endif
   
			  </ul> 
			</div>
				
				<div class="clearfix"> </div>
		</div>
		</div>

	</div>
	<!--*************************NavBAR SECTION ENDS ************************************ -->
   <!--************************ tHIS IS FOR BANNER TEXT IN SLIDER ************************************************* -->

   @yield('content')
	
<!-- ************************************THIS SECTION IS FOR FOOTER ******************************************** -->
<div class="footer">
				<div class="container">
			<div class="footer-top-at">
			
				<div class="col-md-4 amet-sed">
				<h4>MORE INFO</h4>
				<ul class="nav-bottom">
						<li><a href="#">How to order</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="contact.html">Location</a></li>
						<li><a href="#">Shipping</a></li>
						<li><a href="#">Membership</a></li>	
					</ul>	
				</div>
				<div class="col-md-4 amet-sed ">
				<h4>CONTACT US</h4>
				
					<p>
Contrary to popular belief</p>
					<p>The standard chunk</p>
					<p>office:  +12 34 995 0792</p>
					<ul class="social">
						<li><a href="#"><i> </i></a></li>						
						<li><a href="#"><i class="twitter"> </i></a></li>
						<li><a href="#"><i class="rss"> </i></a></li>
						<li><a href="#"><i class="gmail"> </i></a></li>
						
					</ul>
				</div>
				<div class="col-md-4 amet-sed">
					<h4>Newsletter</h4>
					<p>Sign Up to get all news update
and promo</p>
					<form>
						<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
						<input type="submit" value="Sign up">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-class">
		<p >© 2015 New store All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		</div>
		</div>
<!-- **************************************FOOTER SECTION ENDS ************************************* -->
</body>
</html>
			