@extends('Dashboard/layouts/dashboarlayout')
@section('title')
category/all

@stop

@section('contents')
@if (count($errors) > 0)
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>add new category here</h3>
<hr>
 <form class="form-horizontal" action="{{ url('category') }} "  method="post" role="form">
  {!! csrf_field()!!}
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">category name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="category_name" value="{{ old('category_name') }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">category description :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd"  name="category_description" value="{{ old('category_description') }}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
  </div>
</form>


@stop
