
 <html>
  <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dasboardstyle.css') }}">
  <script  src="{{asset('js/angular.min.js') }}"></script>
  <script src="{{asset('js/jquery.min.js') }}"></script>
  <script src="{{asset('js/bootstrap.min.js') }}"></script>
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
    <nav class="navbar  navbar-static-top" style="background-color:#263238;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="{{asset('/dashboard/dashboard')}}">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
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
                PRODUCTS </a>
               <ul class="subMenu " >                            
               <li><a href="{{url('product') }} ">view  products</a></li>
               <li><a href="{{  url('product/create')  }}">add products</a></li>
               </ul>
             </li>
             <!-- for events and news -->
             <li class="mainMenuItem events">
              <a href="#"><i class="fa fa-newspaper-o"></i>&nbsp;
               CATEGORIES </a>
               <ul class="subMenu">
                <li><a href="{{url('category') }} ">view  Category</a></li>
               <li><a href="{{  url('category/create')  }}">add Category</a></li>
               </ul>
             </li>
             <!-- for posta -->
             <li class="mainMenuItem posts">
              <a href="#"><i class="fa fa-folder-o"></i> &nbsp;CUSTOMERS</a>
              <ul class="subMenu">
               <li><a href="{{url('customer') }} ">view  Customer</a></li>
               <li><a href="{{  url('customer/create')  }}">add Customer</a></li>
              </ul>
            </li>
            <!-- for pages -->
            <li class="mainMenuItem pages">
              <a href="#"> <i class="fa fa-file-o"></i> &nbsp;
               Pages</a>
               <ul class="subMenu">
               </ul>
             </li>
             <!-- for users -->
             <li class="mainMenuItem users">
              <a href="#"><i class="fa fa-users"></i>&nbsp;
               Users</a>
               <ul class="subMenu">
               </ul>
             </li>
             <!-- for media  -->
             <li class="mainMenuItem media">
              <a href="#"><i class="fa fa-file-video-o"></i>&nbsp;
               Media</a>
               <ul class="subMenu">
               </ul>
             </li>
             <li class="mainMenuItem settings">
              <a href="#"><i class="fa fa-cogs"></i> &nbsp; Settings</a>
              <ul class="subMenu">

              </ul>
            </li>
            <!-- for album -->
            <li class="mainMenuItem albums">
              <a href="#"> <i class="fa fa-picture-o"></i>&nbsp; Album</a>
              <ul class="subMenu">
              </ul>
            </li>
            <!-- for slider -->
            <li class="mainMenuItem sliders">
              <a href="#"><i class="fa fa-sliders"></i>&nbsp;
               Slider</a>
               <ul class="subMenu">
               </ul>
             </li>   
             <!-- for subscribers     -->
             <li class="mainMenuItem subscribes">
              <a href="#"><i class="fa fa-check-circle-o"></i> &nbsp; Subscriber</a>
              <ul class="subMenu">
              </ul>
            </li>
            <!-- for contact form -->

            <li class="mainMenuItem contacts">
              <a href="#"><i class="fa fa-envelope"></i> &nbsp; Contact Form</a>
              <ul class="subMenu">
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
