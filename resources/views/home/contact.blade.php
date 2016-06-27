@extends('home/layout/master')
@section('content')
<style>
	.form-control{
		height:50px;
		font-size:16px;
	}
	.error{
		font-size:16px;
		color:red;
	}

</style>
<script>
	var app=angular.module("formValidation",[]);
	app.controller('contactControlller',function($scope,$http){
		$scope.name="";
		$scope.comment="";
		$scope.showMessage=false;
		$scope.checkforExitingEmail=function()
		{  
			var data={ userEmail:$scope.email,userName:$scope.name,userComment:$scope.comment};
			console.log(data);
			$http({
				url:"checkforExitingEmail",
				method:"POST",
				params:data
			})
			.then(function(response)
			{
				console.log("yes success");
				$scope.data=response.data;
				$scope.message=$scope.data;
				$scope.showMessage=true;
			},
			function(reson)
			{
				$scope.message("sorry error occur while doing!!!");
			})
		};

	})
</script>

<div class='jumbotron' ng-app="formValidation" ng-controller="contactControlller">
	<div class="container">
	<div class="alert alert-success fade in" ng-show="showMessage">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>@{{ message }}</strong>
  </div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
				<form role="form" class="form-horizontal contact-form" name="myForm" novalidate >
					<div class="form-group" ng-class="{'has-error has-feedback':myForm.name.$dirty && myForm.name.$invalid }">
						<label for="usr">Name:</label>
						<input type="text" class="form-control" id="usr" name="name" ng-model="name" required>
						<span class="error" ng-show="myForm.name.$dirty && myForm.name.$invalid">
							<span ng-show="myForm.name.$error.required">name is required.</span>
						</span>

					</div>
					<div class="form-group" ng-class="{'has-error has-feedback':myForm.email.$dirty && myForm.email.$invalid}" >
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email" name="email" ng-model="email" required>
						<span class="error" ng-show="myForm.email.$dirty && myForm.email.$invalid">
							<span ng-show="myForm.email.$error.required">Email is required.</span>
							<span ng-show="myForm.email.$error.email">Invalid email address.</span>
						</span>
					</div>

					<div class="form-group" ng-class="{'has-error has-feedback':myForm.comment.$dirty && myForm.comment.$invalid}">
						<label for="comment">Comment:</label>
						<textarea class="form-control" rows="8" id="comment"  name="comment" ng-model="comment" required></textarea>
						<span class="error" ng-show="myForm.comment.$dirty && myForm.comment.$invalid">
							<span ng-show="myForm.comment.$error.required">comment is required.</span>
						</span>   
					</div>
					<div class="form-group">
						<input type="button" class="btn btn-primary btn-lg" value="submit" id='submit' ng-disabled="myForm.$invalid" ng-click="checkforExitingEmail()" >

					</div>
				</form>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6" style='padding-left:30px;'>
				<h3>Address</h3>
				<hr>
				<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet cum soluta nobis eleifend cum soluta nobis eleifend option congue nihil option congue nihil doming id quod mazim placerat facer possim assum. Typi non
				</p>
				<ul class="list-unstyled">
					<p ><span class="   glyphicon glyphicon-home"><span> bhartpur, chitwan </span> </p>
					<p ><span class="   glyphicon glyphicon-envelope"></span><span> sanojsth42@gmail.com</span> </p>
					<p ><span class="glyphicon glyphicon-earphone"><span>984541891812 </span></p>
					<p > <span class="glyphicon glyphicon-envelope"><span>3213-2342-3424-2342 </span></p>
				</ul>
			</div>
		</div>
	</div>
	

	@stop