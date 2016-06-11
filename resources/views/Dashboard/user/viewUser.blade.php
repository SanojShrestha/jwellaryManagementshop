@extends('Dashboard/layouts/dashboarlayout')
@section('title')category/all @stop
@section('contents')
<h2>all users is listed here</h2>
<hr>
@if(Session::has('success'))
<div class="alert alert-success ">
  <h4>{{ Session::get('success') }}</h4>
</div>
@endif
@if(count($userList) > 0)
<table class="table table-hover table-bordered">
	<thead>
		<th>s.n</th>
		<th>name</th>
		<th>email</th>
		<th>phone Number</th>
		<th>Address</th>
		<th>action</th>
	</thead>
	<tbody>
		<?php   $i=1; ?>
		@foreach($userList as $user)
		<tr>
			<td> {{ $i++}}</td>
			<td>{{  $user->name  }}</a> </td>
			<td> {{  $user->email}} </td>
			<td> {{  $user->phone_number }} </td>
			<td> {{  $user->address }} </td>
			 <td width="220">
			
					<form  method="post" action="user/{{ $user->id }}">
						{!! csrf_field()!!}
						{!! method_field('delete')!!}
						<input type="submit" value="delete" class="btn btn-danger delete">
					</form>
	
			</td> 
		</tr>
		@endforeach
	</tbody>
</table>
@else
<h3> currently there is no usrer in list list</h3>
@endif

<script>

	 $(document).ready(function ()
	 {  
	   $('.delete').on('click', function(e) 
	   {
	 	$confirmation=confirm("Are you sure to delete");
	 	if($confirmation)
	 	{ return true; }
	 	else { e.preventDefault(); return false; }
	      e.preventDefault();
	    });
     });
</script>
{!! $userList->render() !!}
@stop
