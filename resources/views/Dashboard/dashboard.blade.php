@extends('Dashboard/layouts/dashboarlayout')
@section('title')
admin/login

@stop

@section('contents')

<h1>Welcome {{Session::get('username')}}</h1>

@stop
