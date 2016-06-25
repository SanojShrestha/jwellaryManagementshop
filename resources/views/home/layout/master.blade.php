<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sangam jwellary shop</title>
	<link   href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
  {{-- 	<link   href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" /> --}}
  <link   href="{{asset('css/sitePageStyle.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{asset('js/jquery.min.js')}}"> </script>
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"> </script>	
  <script src="{{asset('js/angular.min.js')}}"> </script>	
   <script src="{{asset('js/sitePageJavascript.js')}}"> </script>  

</head>
<body>
  {{-- HEADING-START --}}
  <section title="heading">
    <div class="page-header">
      <div class="row">
       <div class="col-md-6 col-sm-6 col-xs-6">
         <div class="logo">
         <a href="{{ url('/') }}"><h1>SanGam <span>Shop</span></h1></a>
         </div>
       </div>
       <div class="col-md-6 col-sm-6 col-xs-6">
         <div class="cart-logo">
           <a href="#"><h1><span class="glyphicon glyphicon-shopping-cart"></span>items</h1></a>
         </div>
       </div>
     </div>
   </div>

   <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
          <li><a href="#">Products</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
    {{--   <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input class="form-control" placeholder="Search" type="text">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> --}}
            <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
    </div>
  </div>
</nav>
</section>
{{-- HEADING-CLOSED --}}
<section id="contents">

@yield('content')

</section>


<section footer>
<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6" style="">
                        <h3>Our Services</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Interior Designs</a></li>
                            <li><a href="#">Project Management</a></li>
                            <li><a href="#">House Renovation</a></li>
                            <li><a href="#">Constructions</a></li>
                        </ul>                        
                    </div>
                     <div class="col-md-6 col-sm-6 ">
                      <h3>our location</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Interior Designs</a></li>
                            <li><a href="#">Project Management</a></li>
                            <li><a href="#">House Renovation</a></li>
                            <li><a href="#">Constructions</a></li>
                        </ul
                    </div>
                   
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-7 col-md-7">
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                        </ul>   
                    </div>
                    <div class="col-sm-5 col-md-5 text-right">
                        <span>&copy; 2016. All Right Reserved. Bpress</span> 
                    </div>
                </div>
            </div>
        </footer>

  </section>


</body>
</html>
