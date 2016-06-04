@extends('Dashboard/layouts/dashboarlayout')
@section('title')
category/all
@stop
@section('contents')
<h3>single product view</h3>

<div class="row">
<div class="col-md-4" >
<h3>product details</h4>
<hr>
<h4>name: {{ $singleProduct->product_name}}</h4>
<h4>quantity:{{ $singleProduct->product_quantity}}</h4>
<h4>weight: {{ $singleProduct->product_weight}}</h4>
<h4>product note{{ $singleProduct->product_note}}</h4>
<h4>category id: {{ $singleProduct->category_id}}</h4>
</div>
<div class="col-md-8">
<h3>product image</h3>
<hr>
<div class="row">
<div class="col-md-6" style="border-left:1px solid blue">
<img src="{{ asset('uploads/product_images')."/".$singleProduct->product_firstImage}}" height="300" width="300"/>
</div>
<div class="col-md-6">
<img src="{{ asset('uploads/product_images')."/".$singleProduct->product_secondImage}}" height="300" width="300" />
</div>
</div>


</div>
</div>
@stop
