@extends('Dashboard/layouts/dashboarlayout')
@section('title')category/all @stop
@section('contents')
<h2>all product is listed here/ &nbsp; &nbsp; &nbsp; <a href="{{  url('product/create')  }}">add  new product</a></h2>
<hr>
@if(Session::has('success'))
<div class="alert alert-success ">
  <h4>{{ Session::get('success') }}</h4>
</div>
@endif
@if(count($productList) > 0)
<table class="table table-hover table-bordered">
	<thead>
		<th>s.n</th>
		<th>product name</th>
		<th>product quantity</th>
		<th>product weight</th>
		<th>product_note</th>
		<th>category id</th>
		<th>created at</th>
		<th>update at</th>
		<th>action</th>
	</thead>
	<tbody>
		<?php   $i=1; ?>
		@foreach($productList as $product)
		<tr>
			<td> {{ $i++}}</td>
			<td> {{  $product->product_name  }} </td>
			<td> {{  $product->product_quantity }} </td>
			<td> {{  $product->product_weight }} </td>
			<td> {{  $product->product_note }} </td>
			<td> {{  $product->category_id }} </td>
			<td> {{  $product->created_at }} </td>
			<td> {{  $product->updated_at }} </td>
			<td width="220">
				<a href="product/{{$product->id }}/edit"><button type="button" class="btn btn-primary">edit</button></a>
				<a style="display:inline-block;">
					<form  method="post" action="product/{{ $product->id }}">
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
{!! $productList->render() !!}
@stop
