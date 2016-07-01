@extends('Dashboard/layouts/dashboarlayout')
@section('title')people Feedback @stop
@section('contents')
<h1> people Feedback list!</h1>
<hr>
@if(Session::has('success'))
<div class="alert alert-success ">
  <h4>{{ Session::get('success') }}</h4>
</div>
@endif
<div class="table-responsive"> 
  @if(count($feedbackList))         
  <table class="table table-hover table-bordered table-stripted">
    <thead>
      <tr>
        <th>Name</th>
        <th>email</th>
        <th colspan="2">comment</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($feedbackList as $feedback)
      <tr>
        <td>{{ $feedback->name  }}</td>
        <td>{{ $feedback->email }}</td>
        <td colspan="2" >{{ $feedback->comment  }}</td>
           <td><a style="display:inline-block;">
				<form  method="post" action="{{ url('DeletePeopleFeedback')."/".$feedback->id  }}">
						{!! csrf_field()!!}
			<input type="submit" value="delete" class="btn btn-danger delete">
					</form>
				</a>
			</td>

      </tr>
     @endforeach

    </tbody>
</table>
@else 
<h2>sorry no feedback is getted at all !!!!!</h2>
@endif
</div>

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

@stop