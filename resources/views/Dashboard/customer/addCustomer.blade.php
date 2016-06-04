@extends('Dashboard/layouts/dashboarlayout')
@section('title')
customer/Add
@stop
@section('contents')
<h3>add new customer here</h3>
<hr>
@if(Session::has('failled'))
<div class="alert alert-success ">
  <h4>{{ Session::get('failled') }}</h4>
</div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="form-horizontal" action="{{url('customer')}}" method="post"  enctype="multipart/form-data" role="form">
  {!! csrf_field()!!}
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">customer name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="customer_name" value="{{ old('customer_name') }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">customer address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd"  name="customer_address" value="{{ old('customer_address') }}" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">phone number</label>
    <div class="col-sm-10">
      <input type="number"  class="form-control" id="pwd"  name="customer_phoneNumber" value="{{ old('customer_phoneNumber') }}" >
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Email Address</label>
    <div class="col-sm-10">
      <input type="email"   id="pwd" class='form-control' name="customer_email" value="{{ old('customer_email') }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">customer image:</label>
    <div class="col-sm-10">
      <input type="file"  id="pwd"  name="customer_image" value="{{ old('customer_image') }}">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">short info</label>
    <div class="col-sm-10">
      <textarea  class="form-control"  name="customer_shortInfo" rows="5" style="width:100%;">
      {{ old('customer_shortInfo') }} </textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Add Customer</button>
    </div>
  </div>
</form>
@stop
