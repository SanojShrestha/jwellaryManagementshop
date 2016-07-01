@extends('userProfile.master')
@section('title')category/all @stop
@section('content')
<h2>Your Orders</h2>
<hr>

@if(Session::has('success'))
<div class="alert alert-success ">
  <h4>{{ Session::get('success') }}</h4>
</div>
@endif
@if(count($myOrders) > 0)
<table class="table table-hover table-bordered">
	<thead>
		<th>s.n</th>
		<th>product name</th>
		<th>price</th>
		<th>order date</th>
		<th>action</th>
	</thead>
	<tbody>
		<?php   $i=1; ?>
		@foreach($myOrders as $order)
		<tr>
			<td> {{ $i++}}</td>
			<td> <a >{{  $order->product_name  }}</a> </td>
			<td> {{ $order->product_price }}</td>
			<td> {{  $order->created_at}} </td>
			<td width="220">
				<a style="display:inline-block;">
				<form  method="post" action="userProfile/{{ $order->id }}">
						{!! csrf_field()!!}
					{!! method_field('delete')!!}
			<input type="submit" value="Cancel" class="btn btn-danger delete">
					</form>
				</a>
			</td>
		</tr>
		@endforeach
		<tr>
		<td></td>
		<td><h2>Total</h2></td>
		<td><h2>{{ $totalPrice }} </h2></td>
		<td></td>
		<td></td>
		</tr>
	</tbody>
</table>

@else
<h3> currently there is no item in orders list</h3>
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
{!! $myOrders->render() !!}
@stop
