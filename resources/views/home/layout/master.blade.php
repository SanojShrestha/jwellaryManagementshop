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
<body ng-app="myApp">
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
         @if(Auth::user()) 
         <div class="cart-logo">
           <a data-toggle="modal" data-target="#myModal" style="cursor:pointer;"><h1><span class="glyphicon glyphicon-shopping-cart"></span>cart items<span class="caret"></span></h1></a>
         </div>
         @endif
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
              <li><a  href="{{url('productByCategories')."/".$category->category_name }} ">{{$category->category_name}}</a></li>
              @endforeach
              @endif
            </ul>
          </li>
          <li><a href="{{url('contact')}}">contact us</a></li>


        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ url('/adminlogin') }}">Adminlogin</a></li>
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a></li>
          @else
                <li><a href="{{ url('/userProfile') }}">myProfile</a></li>
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

<!-- Modal tigger from cart item to display-->
@if(Auth::user())
<div class="modal fade" id="myModal" role="dialog" ng-app="myCart" ng-controller="cartControlller">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:35px 50px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">your cart items</h4>
      </div> 
      <div class="modal-body" style="padding:40px 50px;">
        <?php $cart=new App\cart();
        $cart1=new App\cart();
        $totalPrice = DB::table('carts')
        ->where('order_user_id',Auth::user()->id)
        ->sum('product_price');

        $cartList=$cart::where('order_user_id',Auth::user()->id)->orderBy('product_name','desc')->get();
        $i=1;

        ?>
        @if(count($cartList)) 
        <table class="table table-hover table-bordered">

          <thead>
            <tr>
              <th>S.n</th>
              <th>Product_name</th>
              <th>product_price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cartList as $items)
            <tr class="rowDelete">
              <td>{{$i++}}</td>
              <td>{{ $items->product_name  }}</td>
              <td>{{ $items->product_price  }}</td>
              <td>
               <a style="display:inline-block;"  class="delete" value="{{ $items->product_name }}" > 
                <button type="button"  value="{{ $items->product_name }}" class="btn btn-danger">remove</button>
              </a>

            </td>

          </tr>
          @endforeach
          <tr>

            <td></td>
            <td><h3 style="font-weight:bold;background-color:#fff;color:#375a7f" class="pull-right">Total</h3></td>
            <td><h3 style="font-weight:bold;background-color:#fff; color:#375a7f" class="pull-left">@{{ totalPrice}}</h3></td>
          </tr>

        </tbody>
      </table>
      <div style="width:250px; margin:0 auto ;">
        <a href="{{url('reviewAndShop')}}"><button class="btn btn-primary btn-lg btn-block">Review  and Shop </button></a>
      </div>
      @else 
      <h3>you haven't added item to cart yet !</h3>
      @endif
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>
@endif

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
<script>

  var app=angular.module("myApp",[]);
  app.controller('cartControlller',function($scope,$http){
    $scope.name="";
    $scope.comment="";
    $http({
      url:"{{url('remove_from_cart') }}",
      method:"POST"
    })
    .then(function(response)
    {
      console.log("yes success");
      $scope.totalPrice=response.data;
      console.log($scope.totalPrice);
    },
    function(reson)
    {
      $scope.message("sorry error occur while doing!!!");
    });
    $scope.showMessage=false;
    $(".rowDelete").click(function()
    {
      $(this).hide();
    });
    $(".delete").click(function()
    {
     var item_name=$(this).attr("value");
     $scope.removeItemFromCart(item_name);
   })
    $scope.removeItemFromCart=function(item_name)
    {  
     var data={ product_name:item_name,user_id:@if(Auth::user()){{ Auth::user()->id}} @endif };
     $http({
      url:"{{url('remove_from_cart') }}",
      method:"POST",
      params:data
    })
     .then(function(response)
     {
      console.log("yes success");
      $scope.totalPrice=response.data;
      console.log($scope.totalPrice);
    },
    function(reson)
    {
      $scope.message("sorry error occur while doing!!!");
    })
   };

 });
</script>
</body>
</html>
