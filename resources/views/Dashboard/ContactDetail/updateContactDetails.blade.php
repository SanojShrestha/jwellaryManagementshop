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
@if (count($errors) > 0)
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<?php $id=$contactDetails->id; ?>
  <form class="form-horizontal" action="{{ asset('contactDetails')."/".$id }}" method="post">
    {!! csrf_field()!!}
    {!! method_field('PUT')!!}
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="Address" placeholder="Enter Address" value="{{ $contactDetails->Address  }}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" name="email" for="pwd">Email:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="email" id="pwd" placeholder="Enter Email" value="{{ $contactDetails->email }}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2"  for="pwd">PhoneNumber:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"  name="phone" id="pwd" placeholder="Enter PhoneNumber" value="{{ $contactDetails->phone  }}">
      </div>
    </div>

  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
@stop

