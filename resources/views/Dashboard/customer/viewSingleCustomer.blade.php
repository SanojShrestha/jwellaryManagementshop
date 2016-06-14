@extends('Dashboard/layouts/dashboarlayout')
@section('title')
category/all
@stop
@section('contents')
<h3>single customer view</h3>

<div class="row">
<div class="col-md-5">
<h3>product details</h3>
<hr>
<h4>name: {{ $singleCustomer->product_name }}</h4>
<h4>phoneNumber :{{ $singleCustomer->customer_phoneNumber }}</h4>
<h4>Addresss:{{ $singleCustomer->customer_address }}</h4>
<h4>email Address :{{ $singleCustomer->customer_email }}</h4>
<h4>created_at{{ $singleCustomer->created_at }}</h4>
<h4>category id:{{ $singleCustomer->customer_shortInfo }}</h4>
</div>
<div class="col-md-7">
<h3>customer image</h3>
<hr>
<img src="{{ asset('uploads/customer_images')."/".$singleCustomer->customer_image}}" height="350" width="400">
</div>
</div>
</div>


</div>
</div>
@stop
