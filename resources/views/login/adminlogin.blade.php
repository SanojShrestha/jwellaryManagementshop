<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>
    admin/login
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script  src="js/angular.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  body{
  background-color:#263238;
}
    @media only screen and (min-width: 300px)
    {

      .modal-header, h4, .close {
        background-color:#263238;
        color:white !important;
        text-align: center;
        font-size: 15px;
      }
      .modal-footer {
        background-color: #f9f9f9;
      }
      .modal-dialog {
        width: 100%;
      }
      p a{

       font-size: 12px;
     }

   }
   @media only screen and (min-width: 360px)
   {

    .modal-header, h4, .close {
      font-size: 15px;
    }
    .modal-footer {
      background-color: #f9f9f9;
    }
    .modal-dialog {
      width: 90%;
    }
    p a{

     font-size: 14px;
   }

 }
 @media only screen and (min-width: 640px)
 {

  .modal-header, h4, .close {
    font-size: 30px;
  }
  .modal-footer {
    background-color: #f9f9f9;
  }
  .modal-dialog {
    margin:10% 10%;
    width: 65%;
  }
  p a{

   font-size: 14px;
 }

}
@media only screen and (min-width: 768px)
{

  .modal-header, h4, .close {
    font-size: 30px;
  }
  .modal-footer {
    background-color: #f9f9f9;
  }
  .modal-dialog {
    margin:10% 10%;
    width: 60%;
  }

}

@media only screen and (min-width: 990px)
{
 
.modal-footer {
  background-color: #f9f9f9;
}
.modal-dialog {
  margin:10% 22%;
  width: 50%;
}

}

@media only screen and (min-width: 1200px) 
{
 .modal-header, h4, .close {

  font-size: 30px;
}
.modal-footer {
  background-color: #f9f9f9;
}
.modal-dialog {
  margin: 10% 28%;
  width: 40%;
}

}
/* Large screens ----------- */
@media only screen and (min-width: 1500px) 
{
 .modal-header, h4, .close {

  font-size: 30px;
}
.modal-footer {
  background-color: #f9f9f9;
}
.modal-dialog {
  margin: 10% 27%;
  width: 45%;
}
}

input.ng-valid.ng-dirty{
  border:1px solid lightblue;
}
input.ng-invalid.ng-dirty{
  border: 1px solid red;
}

</style>

<div class="container" >
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="container" ng-app="login" ng-controller="loginCtrl">
    <div class="modal-dialog  col-md-12 col-sm-12 col-xs-12 ">
      <!-- modal content -->
      <div class="modal-content">
       <!-- modal header -->
       <div class="modal-header">  
        <button type="button" class="close" data-dismiss="modal"></button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
       </div>
       <div class="modal-body">
         <!-- form starts  -->
          @if(Session::has('failled'))
  <div class="alert alert-danger ">
    <p style="font-size:16px;">{{ Session::get('failled') }}</p>

  </div>
  @endif
         <form role="form" action="{{ url('checkvalidate') }}"method="post" novalidate>
          {!! csrf_field()!!}
          <!-- form  form username -->
          <div class="form-group">
            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
            <input type="text" class="form-control" name="username" ng-model="username" placeholder="Enter username" required value="{{ old('username') }}" >
            <span  id="span" style="color:red" ng-show="myForm.username.$dirty && myForm.username.$invalid">
              <span id="span" ng-show="myForm.username.$error.required">Username is required.</span>
            </span>
          </div>
          <!-- form for password  -->
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
            <input type="password" class="form-control" id="psw"  ng-model="password" name="password" placeholder="Enter password" required>
            <span  id="span" style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
             <span  id="span" ng-show="myForm.password.$error.required">password is required. </span>
           </span>
         </div>
         <!-- form for checkbox -->
         <div class="checkbox">
           <label><input type="checkbox" value="1" name="checkMe">Stay Logged In</label>
         </div>
         <!-- form buttons  -->

         <button type="submit" ng-disabled="myForm.$invalid" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
       </form>
       <br>
       <!-- forgot password link  -->
     </div>
     <!-- modal footer starts -->
     <div class="modal-footer">
     <p class="pull-right"> <a href="{{ url('forgotPassword') }}">Forgot Password</a></p>
         </div>
     </div>
     <!-- modal footer closed -->
   </div> <!-- modal content closed -->
 </div> <!--modal dialog closed -->
</div> <!-- main container class -->

<!-- angular template for form validation adn watch -->
<script>
  var app = angular.module('login', []);
  app.controller('loginCtrl', function($scope) {
    $scope.username = '';
    $scope.password = '';
    $scope.incomplete=true;
    $scope.$watch('username',function() {$scope.test();});
    $scope.$watch('password',function() {$scope.test();});
    $scope.test = function() {
      if ( $scope.username.length && $scope.password.length ){
       $scope.incomplete = false;
     }
     else {
      $scope.incomplete=true;
    }
  };

});
</script>
</body> 
<!-- body closed  -->
</html>
<!-- html closed  -->


