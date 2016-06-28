
 <html>
  <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dasboardstyle.css') }}">
  <script src="{{asset('js/jquery.min.js') }}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script  src="{{asset('js/angular.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.mainMenuItem').click(function () {
        $('.mainMenuItem').children("ul").hide();
        $(this).children("ul").show();
      });
    });
  </script>
  <title>  
    @yield('title')
  </title>
</head>
<body>
  <!-- this section goes for navbar -->
  <section>
    <nav class="navbar navbar-inverse  navbar-static-top" >
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="{{asset('/dashboard/dashboard')}}">Sangam Jwellary shop</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ asset('/') }}">view Site</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{asset('adminlogout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <!-- navbar section ends  -->
  <!-- rightside section starta  -->
  <div  class="container-fluid">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-4 col-lg-2 leftside " >
        <section>
          <div class="menuItems" >
           <ul class="menu" >
             <!-- for dashaborrd -->
             <li class="mainMenuItem dashboard" > 
              <a href="#"><i class="fa fa-tachometer"></i> &nbsp;
                products</a>
               <ul class="subMenu " >                            
               <li><a href="{{url('product') }} ">view  products</a></li>
               <li><a href="{{  url('product/create')  }}">add products</a></li>
               </ul>
             </li>
             <!-- for events and news -->
             <li class="mainMenuItem events">
              <a href="#"><i class="fa fa-newspaper-o"></i>&nbsp;
               categories</a>
               <ul class="subMenu">
                <li><a href="{{url('category') }} ">view  Category</a></li>
               <li><a href="{{  url('category/create')  }}">add Category</a></li>
               </ul>
             </li>
           {{--   <!-- for posta -->
             <li class="mainMenuItem posts">
              <a href="#"><i class="fa fa-folder-o"></i> &nbsp;customers</a>
              <ul class="subMenu">
               <li><a href="{{url('customer') }} ">view  Customer</a></li>
               <li><a href="{{  url('customer/create')  }}">add Customer</a></li>
              </ul>
            </li> --}}
            <!-- for pages -->
             <li class="mainMenuItem pages">
              <a href="#"> <i class="fa fa-file-o"></i> &nbsp;
               users</a>
               <ul class="subMenu">
                <li><a href="{{url('user') }} ">view users</a></li>
               </ul>
             </li>
            <li class="mainMenuItem pages">
              <a href="#"> <i class="fa fa-file-o"></i> &nbsp;
              contactDetail</a>
               <ul class="subMenu">
                <li><a href="{{url('contactDetails') }} ">viewDetail</a></li>
               </ul>
             </li>
            <li class="mainMenuItem pages">
              <a href="#"> <i class="fa fa-file-o"></i> &nbsp;
               Orders</a>
               <ul class="subMenu">
                <li><a href="{{url('customer') }} ">view Orders</a></li>
               </ul>
             </li>
           <li class="mainMenuItem pages">
              <a href="#"> <i class="fa fa-file-o"></i> &nbsp;
               People feedback</a>
               <ul class="subMenu">
                <li><a href="{{url('userFeedback') }} ">view feedback</a></li>
               </ul>
             </li>
            
          </ul>
        </div>
      </section>
    </div>
    <!-- end of the section of the leftside items -->
    <!-- this section for rightside -->
    <div class=" col-md-10 col-sm-9 col-lg-10 col-xs-8 rightside">
      <section style="padding:20px">
       @yield('contents')
      </section>
    </div>
  </div>
<!-- end of row -->
</div>
<!-- end of container -->
<!-- end of rightside section -->
</body>
<!-- end of boydy -->
<html>
