@extends('Dashboard/layouts/dashboarlayout')
@section('title')
category/all

@stop

@section('contents')

<h3>edit category</h3>
<?php $id=$category->id; ?>
<hr>
 <form  method="post" class="form-horizontal"  action="{{ asset('category')."/".$id }}" role="form">
  {!! csrf_field()!!}
  <input type="hidden" name="_method" value="PUT">

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">category name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="category_name" value=" {{ $category->category_name   }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">category description :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd"  name="category_description" value="{{ $category->catgory_description }}" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
    </div>
  </div>
</form>


@stop
