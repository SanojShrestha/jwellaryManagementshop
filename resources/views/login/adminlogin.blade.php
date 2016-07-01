<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>
    admin/login
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/css/adminLogin.css">
  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script  src="js/angular.min.js"></script>
<div class="container" >
  
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
  @if (count($errors) > 0)
  <div class="alert alert-info">
    <ul>
      @foreach ($errors->all() as $error)
      {{ $error }}
      <br>
      @endforeach
    </ul>
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

         <button type="submit" ng-disabled="myForm.$invalid" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
       </form>
       <br>
       <!-- forgot password link  -->
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


