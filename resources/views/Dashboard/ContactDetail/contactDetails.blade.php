@extends('Dashboard/layouts/dashboarlayout')
@section('title')
contctDetail/Add
@stop
@section('contents')
<h2>you site Contact Details / &nbsp; &nbsp; &nbsp; <a href="contactDetails/{{$contactDetails->id }}/edit">update Contact details</a></h2>
<hr>
@if(Session::has('success'))
<div class="alert alert-success ">
  <h4>{{ Session::get('success') }}</h4>
</div>
@endif
    <div class="table-responsive">          
  <table class="table table-hover table-bordered table-striped">

      <tr>
        <th>Address</th>
            <td>{{ $contactDetails->Address  }}</td>
      </tr>
      <tr>
        <th>PhoneNumber</th>
             <td>{{ $contactDetails->phone  }}</td>
      </tr>
      <tr>
       <th>Email Address</th>
             <td>{{ $contactDetails->email }}</td>

      </tr>
  </table>
  </div>
@stop

