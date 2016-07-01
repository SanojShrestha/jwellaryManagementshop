@extends('Dashboard/layouts/dashboarlayout')
@section('title')
admin/login

@stop

@section('contents')
<style>
.jumbotron {
  padding-top: 30px;
  padding-bottom: 30px;
  margin-bottom: 30px;
  color: inherit;
  background-color: #eee;
}

</style>
  <div class="jumbotron">
@if(Session::has('success'))
<div class="alert alert-success ">
  <h2>{{ Session::get('success') }}</h2>
</div>
@endif
<h1>Welcome {{Session::get('username')}}</h1>
    <p> you can edit,delete, update your content here</p> 
  </div>
@stop
