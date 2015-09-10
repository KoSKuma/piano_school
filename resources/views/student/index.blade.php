@extends('app')


@section('htmlheader_title')
List of all Students
@endsection


@section('contentheader_title')
<h1>Student <small>List of all students</small></h1>
@endsection


@section('main-content')

<div class="box box-solid box-default">
	<div class="box-header">
		<div class="row">

			<form action="{{url('/teacher')}}" method="GET">
				@if (Entrust::can('create-teacher'))
				<div class="col-xs-12  text-left visible-xs" >
					<a href= "{{url('teacher/create')}}" class="btn btn-primary bg-primary custom-font" >
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
					</a>
				</div>
				@endif
				<div class="row">
					<div class="col-xs-12" style="height:10px">
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4  ">
				
					<div class="input-group ">
					  <input type="text" class="form-control" name="search" placeholder="Search for...">
				      <span class="input-group-btn">
				        <button class="btn btn-default " type="submmit">
				        	 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				        	Search
				        </button>
				      </span>
					</div>
				
				</form>
			</div>

			@if (Entrust::can('create-student'))
			<div class="col-sm-7  text-right hidden-xs col-md-8" >
				<a href= "{{url('student/create')}}" class="btn btn-primary" >
					<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
				</a>
			</div>
			@endif
		</div>

	</div><!-- /.box-header -->

	<div class="box-body">
		@if (isset($searchResult))
		<div class="row">
			<div class="col-xs-2 hidden-sm"></div>
		    <div class="col-xs-8 alert bg-gray color-palette">
		        <div class="col-xs-12">
		        	Search for {{$searchResult['keyword']}}, found {{$searchResult['count']}} results
		        </div>
		    </div>
		</div>
		@endif
		<div class="row">
			<div class="col-sm-12 col-md-12 " id="schedule_list_table">
				<div class="row hidden-xs hidden-sm" id="table_header">
					<div class="col-md-2 col-xs-2">
						<div class="col-xs-12 col-header vcenter">
							<span><strong>Picture</strong></span>
						</div>
					</div>

					<div class="col-md-10 col-xs-8">
						<div class="col-md-4 col-header vcenter">
							<span><strong>Name</strong></span>
						</div>
						<div class="col-md-2 col-header vcenter">
							<span><strong>Student Tel.</strong></span>
						</div>
						<div class="col-md-2 col-header vcenter">
							<span><strong>Parent Tel.</strong></span>
						</div>
						<div class="col-md-2 col-header vcenter">
							<span><strong>Option</strong></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		@foreach ($students as $student)
		<div class="row ">
			<div class="col-md-2 col-xs-2">

				<div class="col-xs-12 visible-xs">
					@if (!empty($student->picture))
					<img class="img-responsive img-thumbnail table-profile-picture" style="min-width:52px; left:-10px; position:relative;" src="{{url('/uploads/profile_pictures/').'/'.$student->picture}}"  >
					@else
					<img class="img-responsive img-thumbnail table-profile-picture" style="min-width:52px; left:-10px; position:relative;" src="{{url('/uploads/profile_pictures/')}}/default.jpg"   />
					@endif       
				</div>

				<div class="col-xs-12 hidden-xs">
					@if (!empty($student->picture))
					<img class="img-responsive img-thumbnail table-profile-picture" src="{{url('/uploads/profile_pictures/').'/'.$student->picture}}"  >
					@else
					<img class="img-responsive img-thumbnail table-profile-picture" src="{{url('/uploads/profile_pictures/')}}/default.jpg"   />
					@endif       
				</div>
			</div>
			<div class="col-md-10 col-xs-8">

				<div class="col-md-4 ">
					{{$student->firstname."  ".$student->lastname}} ({{$student->nickname}})
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
					<div class="col-md-4 hidden-xs">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
						@if (Entrust::can('view-student'))
						<a href= "{{url('student/'.$student->id)}}" class="btn btn-default btn-flat btn-sm">
							<i class="fa fa-eye"></i>
							View
						</a>
						@endif
							
						@if (Entrust::can('edit-student'))
						<a href= "{{url('student/'.$student->id.'/edit')}}" class="btn btn-default btn-flat btn-sm">
							<i class="fa fa-edit"></i>
							Edit
						</a>
						@endif

						@if (Entrust::can('delete-student'))
						<a class="btn btn-danger btn-flat btn-sm"
						   data-toggle="modal" 
						   data-target="#myModal" 
						   student_id="{{$student->id}}" 
						   student_name="{{$student->nickname . '(' . $student->firstname . ' ' . $student->lastname . ')'}}">
						   <i class="fa fa-trash"></i>
						   Delete
						</a>	
						@endif
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

						<button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

	</div><!--End Student List Table -->
	<div class="row">
		<div class="col-xs-12 text-center">
			@if (isset($searchResult))
				{!! $students->appends(['search' => $searchResult['keyword']])->render() !!}
			@else
				{!! $students->render() !!}
			@endif
		</div>
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