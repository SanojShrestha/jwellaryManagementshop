<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sangam jwellary shop</title>
	<link   href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
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
          <li class="active"><a href="{{ url('/')}}">Home<span class="sr-only">(current)</span></a></li>
          <li><a href="{{url('showProducts')}}">Products</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Choose Categories<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              {{-- category list --}}
              <?php $category=new App\product_category();
              $categoryList=$category::all();

              ?>
              @if(count($categoryList))
              @foreach($categoryList as $category)
              <li><a href="#">{{$category->category_name}}</a></li>
              @endforeach
              @endif
            </ul>
          </li>
          <li><a href="{{url('about')}}">about us</a></li>
          <li><a href="{{url('contact')}}">contact us</a></li>

        </ul>
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

<hr>
<section footer>
  <footer class="footer">
    <div class="container">
      <div class="row">
              <div class="col-md-4 col-sm-4 c0l-lg-4  col-md-offset-1 col-sm-offset-1 " style="border-right:2px solid #ccc;padding-left:20px;">

          <h3>Our categories</h3>
          <ul class="list-unstyled">
             @if(count($categoryList))
              @foreach($categoryList as $category)
              <li><a href="#">{{$category->category_name}}</a></li>
              @endforeach
              @endif
          </ul>                        
        </div>
        <div class="col-md-4 col-sm-4 c0l-lg-4  col-md-offset-1 col-sm-offset-1 ">
          <h3>our address</h3>
          <ul class="list-unstyled">
         <p class="addressInfo"><span class="   glyphicon glyphicon-home"><span> bhartpur, chitwan </span> </p>
         <p class="addressInfo"><span class="   glyphicon glyphicon-envelope"></span><span> sanojsth42@gmail.com</span> </p>
         <p class="addressInfo"><span class="     glyphicon glyphicon-earphone"><span>984541891812 </span></p>
         <p class="addressInfo"> <span class="   glyphicon glyphicon-envelope"><span>3213-2342-3424-2342 </span></p>
          </ul>
          </div>
          
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-7 col-md-7 col-xs-12">
            <ul class="list-inline">
              <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">products</a></li>
              <li><a href="#">contact us</a></li>
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
