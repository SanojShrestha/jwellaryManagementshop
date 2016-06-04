
@extends('Dashboard/layouts/dashboarlayout')
@section('title')
customer/Add
@stop
@section('contents')
<h3>add new customer here</h3>
<hr>
@if(Session::has('failled'))
<div class="alert alert-warning ">
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
<?php $id=$editCustomer->id; ?>
<form class="form-horizontal" action="{{ asset('customer')."/".$id }}" method="post"  enctype="multipart/form-data" role="form">
  {!! csrf_field()!!}
    {!! method_field('PUT')!!}
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">customer name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="customer_name" value="{{ $editCustomer->customer_name }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">customer address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd"  name="customer_address" value="{{ $editCustomer->customer_address }}" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">phone number</label>
    <div class="col-sm-10">
      <input type="number"  class="form-control" id="pwd"  name="customer_phoneNumber" value="{{ $editCustomer->customer_phoneNumber}}" >
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Email Address</label>
    <div class="col-sm-10">
      <input type="email"   id="pwd" class="form-control"  name="customer_email" value="{{ $editCustomer->customer_email }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2"  style="margin-top:20px;" for="pwd">customer image:</label>
    <div class="col-sm-10">
     <div class="row">
     <div class="col-md-4" style="margin-top:20px;">
           <input type="file"   id="pwd"  name="customer_image" value="{{ $editCustomer->customer_image }}">
    </div>
    <div class="col-md-8">
    <img src="{{ asset('uploads/customer_images')."/".$editCustomer->customer_image}}" height="150" width="150">
    </div>
  </div>
  </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">short info</label>
    <div class="col-sm-10">
      <textarea  class="form-control" name="customer_shortInfo" rows="5" style="width:100%;">
      {{ $editCustomer->customer_shortInfo }} </textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg btn-block">update Customer</button>
    </div>
  </div>
</form>
@stop
