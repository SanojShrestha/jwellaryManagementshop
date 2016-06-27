@extends('Dashboard/layouts/dashboarlayout')
@section('title')
contctDetail/Add
@stop
@section('contents')
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
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-8 col-lg-8">
<h3>contact details here</h3>
  <form class="form-horizontal" role="form">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
@stop