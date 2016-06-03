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

<div class="container" >
@if(Session::has('failled'))
<div class="alert alert-success ">
<h4>{{ Session::get('failled') }}</h4>

</div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <div class="col-md-12">

    <form role="form" action="{{ url('checkvalidate') }}"method="post">
    {!! csrf_field()!!}
        <p>username:</p>
        <input type="text" class="form-control" name="username" >
        <p>password:</p>
        <input type="password" class="form-control" name="password" ><br>
        <button type="submit" class="btn btn-default"> Login</button>
    </form>
   </div>
</div>
          
