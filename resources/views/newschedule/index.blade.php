@extends('app')


@section('htmlheader_title')

@endsection


@section('contentheader_title')
<h1>New Schedule <small>Schedule List</small></h1>
@endsection


@section('main-content')
<div class="box box-solid box-default">
	<div class="box-header">
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="input-group ">
				  <input type="text" class="form-control" name="search" placeholder="Search for..." value="">
			      <span class="input-group-btn">
			        <button class="btn btn-default " type="submmit">
			        	 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			        	Search
			        </button>
			      </span>
				</div>
			</div>
			<form action="{{url('newschedule')}}" method="POST" role="form">
					{!! csrf_field() !!}
					<div class="col-sm-6">
						<div class="input-group">
							<input type="text" class="form-control pull-right" id="reservationtime" name="date">
					      	<span class="input-group-btn">
					      		<input type="submit" class="btn btn-default">
					      	</span>
					      
					    </div>
					</div>
				
			</form>
		
		
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Days/Time</th>
					@foreach($time as $time_array)
					<th>
						{{$time_array}}
					</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				

			</tbody>
		</table>
	</div>

</div>


@endsection

@section("script")
	<script type="text/javascript">
		$(document).ready(function(){
			$('#reservationtime').daterangepicker();
		})
	</script>
@endsection