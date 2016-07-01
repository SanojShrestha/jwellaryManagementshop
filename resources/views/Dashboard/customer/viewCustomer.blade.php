@extends('Dashboard/layouts/dashboarlayout')
@section('title')category/all @stop
@section('contents')
<h2>all customer is listed here/ &nbsp; &nbsp; &nbsp; <a href="{{  url('customer/create')  }}">add  new customer</a></h2>
<hr>
@if(Session::has('success'))
<div class="alert alert-success ">
  <h4>{{ Session::get('success') }}</h4>
</div>
@endif
@if(count($customerList) > 0)
<table class="table table-hover table-bordered">
	<thead>
		<th>s.n</th>
		<th>customer name</th>
		<th>customer Address</th>
		<th>phoneNumber</th>
		<th>EmailAdress</th>
		<th>customer image</th>
		<th>created at</th>
		<th>action</th>
	</thead>
	<tbody>
		<?php   $i=1; ?>
		@foreach($customerList as $customer)
		<tr>
			<td> {{ $i++}}</td>
			<td> <a href="customer/{{$customer->id }}">{{  $customer->customer_name  }}</a> </td>
			<td> {{  $customer->customer_address }} </td>
			<td> {{  $customer->customer_phoneNumber }} </td>
			<td> {{  $customer->customer_email }} </td>
	
			 <td><img src="{{ asset('uploads/customer_images')."/".$customer->customer_image}}" height="100" width="100"></td>
			<td> {{  $customer->created_at}} </td>
			<td width="220">
				<a href="customer/{{$customer->id }}/edit"><button type="button" class="btn btn-primary">edit</button></a>
				<a style="display:inline-block;">
				<form  method="post" action="customer/{{ $customer->id }}">
						{!! csrf_field()!!}
						{!! method_field('delete')!!}
			<input type="submit" value="delete" class="btn btn-danger delete">
					</form>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@else
<h3> currently there is no item in category list</h3>
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
{!! $customerList->render() !!}
@stop
