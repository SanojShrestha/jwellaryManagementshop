@extends('userProfile.master')
@section('content')
  <h1>welcome {{ Auth::user()->name }}</h1>
@if(Session::has('success'))
<div class="alert alert-success ">
  <h4>{{ Session::get('success') }}</h4>
</div>
@endif
<h2> <a href="userProfile/{{Auth::user()->id }}/edit">Update  Your profile</a></h2>
<hr>  
  <div class="jumbotron">
    <h3>Your info</h3>
    <div class="table-responsive">          
  <table class="table table-hover table-bordered table-striped">
 
      <tr>
        <th>Name</th>
          <td>{{ $userInfo->name }}</td>
      </tr>
      <tr>
        <th>Address</th>
            <td>{{ $userInfo->address  }}</td>
      </tr>
      <tr>
        <th>PhoneNumber</th>
             <td>{{ $userInfo->phone_number  }}</td>
      </tr>
      <tr>
       <th>Email Address</th>
             <td>{{ $userInfo->email }}</td>

      </tr>
  </table>
  

@stop