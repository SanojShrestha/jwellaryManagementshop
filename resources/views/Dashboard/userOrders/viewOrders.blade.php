@extends('Dashboard/layouts/dashboarlayout')
@section('title')category/all @stop
@section('contents')
<h2>all order is listed here/ &nbsp; &nbsp; &nbsp; <a href="{{  url('order/create')  }}">add  new order</a></h2>
<hr>

@if(Session::has('success'))
<div class="alert alert-success ">
  <h4>{{ Session::get('success') }}</h4>
</div>
@endif
@if(count($orderList) > 0)
<table class="table table-hover table-bordered">
	<thead>
		<th>s.n</th>
		<th>product name</th>
		<th>product category</th>
		<th>order by</th>
		<th>price</th>
		<th>order date</th>
		<th>action</th>
	</thead>
	<tbody>
		<?php   $i=1; ?>
		@foreach($orderList as $order)
		<tr>
			<td> {{ $i++}}</td>
			<td> <a href="order/{{$order->id }}">{{  $order->product_name  }}</a> </td>
			<td> {{  $order->product_category }} </td>
			<td> {{  $order->ordered_user }} </td>
			<td> {{ $order->product_price }}</td>
			<td> {{  $order->created_at}} </td>
			<td width="220">
				<a style="display:inline-block;">
				<form  method="post" action="userOrders/{{ $order->id }}">
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
{!! $orderList->render() !!}
@stop
