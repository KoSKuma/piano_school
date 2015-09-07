@extends('app')


@section('htmlheader_title')
Sample page
@endsection


@section('contentheader_title')

@endsection


@section('main-content')

<div class="box box-solid box-info">
	<div class="box-header">
		<div class="row">
			<div class="col-xs-6">
				<h3 class="box-title">Student List</h3>
			</div>
			
			<div class="col-xs-12 text-right">
				@if (Entrust::can('create-student'))
				<a href= "{{url('student/create')}}" class="btn btn-primary" >
					<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
				</a>
				@endif
			</div>
		</div>
	</div><!-- /.box-header -->

	<div class="box-body">
		<div class="row">
			<div class="col-sm-12 col-md-12 " id="schedule_list_table">
				<div class="row hidden-xs hidden-sm" id="table_header">
					<div class="col-md-2 col-xs-2">
						<div class="col-md-2">
							<strong>Picture</strong>
						</div>
					</div>

					<div class="col-md-10 col-xs-8">
						<div class="col-md-2">
							<strong>Nick Name</strong>
						</div>
						<div class="col-md-3">
							<strong>Full name</strong>
						</div>
						<div class="col-md-2">
							<strong>Student Tel.</strong>
						</div>
						<div class="col-md-2">
							<strong>Parent Tel.</strong>
						</div>
						<div class="col-md-2">
							<strong>Option</strong>
						</div>
					</div>
				</div>
			</div>
		</div>
		@foreach ($studentList as $student)
		<div class="row ">
			<div class="col-md-2 col-xs-2">

				<div class="col-xs-12 ">
					@if (!empty($student->picture))
					<img class="img-responsive img-thumbnail" style="min-width:52px; left:-10px; position:relative;" src="{{url('/uploads/profile_pictures/').'/'.$student->picture}}"  >
					@else
					<img class="img-responsive img-thumbnail" style="min-width:52px; left:-10px; position:relative;" src="{{url('/uploads/profile_pictures/')}}/default.jpg"   />
					@endif       
				</div>
			</div>
			<div class="col-md-10 col-xs-8">

				<div class="col-md-2 ">
					{{$student->nickname}} 
				</div>
				<div class="col-md-3">
					{{$student->firstname."  ".$student->lastname}}       
				</div>
				<div class="col-md-2 ">
					{{ substr($student->student_phone  ,0,3)."-".substr($student->student_phone   ,3,3)."-".substr($student->student_phone  ,6)}}      
				</div>
				<div class="col-md-2 ">
					{{substr($student->parent_phone  ,0,3)."-".substr($student->parent_phone   ,3,3)."-".substr($student->parent_phone  ,6)}}      
				</div>

				<form action="{{url('student/restore')}}" method="post">
					{!! csrf_field() !!}
					<!-- Single button -->
					<div class="col-md-2 hidden-xs">
						<div class="btn-group ">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
							
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								
								<span class="sr-only">Toggle Dropdown</span>
								Select Action
								<span class="caret"></span>
							</button>


							<ul class="dropdown-menu">
								@if (Entrust::can('view-student'))
									<li>
										<a href= "{{url('student/'.$student->id)}}" >
											View
										</a>
									</li>
									@endif
									
								@if (Entrust::can('edit-student'))
									<li>
										<a href= "{{url('student/'.$student->id.'/edit')}}">
											Edit
										</a>
									</li>
									@endif

									@if (Entrust::can('delete-student'))
									<li>
										<a data-toggle="modal" data-target="#myModal" student_id="{{$student->id}}" student_name="{{$student->nickname . '(' . $student->firstname . ' ' . $student->lastname . ')'}}">
											Delete
										</a>
									</li>
								@endif

							</ul>
						</div>
					</div>
				</form>
			</div>
			<div class="visible-xs col-xs-2 ">
				<form action="{{url('student/restore')}}" method="post">
					{!! csrf_field() !!}
					<!-- Single button -->
					<div class="btn-group  " >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">

						<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-th"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right">
							@if (Entrust::can('view-student'))
							<li><a href= "{{url('student/'.$student->id)}}">View</a></li>
							@endif

							@if (Entrust::can('edit-student'))
							<li><a href= "{{url('student/'.$student->id.'/edit')}}">Edit</a></li>
							@endif

							@if (Entrust::can('delete-student'))
							<li><a 
								
								data-toggle="modal" 
								data-target="#myModal" 
								teacher_id="{{$student->id}}" 
								teacher_name="{{$student->nickname . ' (' . $student->firstname . ' ' . $student->lastname . ')'}}">
								Delete
							</a></li>
							@endif

							
						</ul>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12" style="height:24px">
			</div>
		</div>
		@endforeach

	</div>
</div>

<form action="" method="POST" id="confirm-delete"> 

				<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Delete Teacher</h4>
							</div>
							<div class="modal-body">
								Are you sure you want to delete <span id="delete_message"></span>? 
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="btn btn-danger" >
										<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"> </span> Delete
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</form>
	

<script type="text/javascript">

$('#myModal').on('shown.bs.modal',function(e){
	$('#myInput').focus();
	console.log(e);
	delete_student_id = e.relatedTarget.attributes.student_id.value;
	delete_student_name = e.relatedTarget.attributes.student_name.value;

	$("#delete_message").html(delete_student_name);
	$("#confirm-delete").attr("action", "{{url('student')}}"+"/"+delete_student_id);
});

</script>
@endsection