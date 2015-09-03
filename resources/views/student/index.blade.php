@extends('app')


@section('htmlheader_title')
Sample page
@endsection


@section('contentheader_title')

@endsection


@section('main-content')
<style>
.example-modal .modal {
	position: relative;
	top: auto;
	bottom: auto;
	right: auto;
	left: auto;
	display: block;
	z-index: 1;
}
.example-modal .modal {
	background: transparent!important;
}
</style>
<div class="box">
	<div class="box-header">
		<div class="row">
			<div class="col-xs-6">
				<h3 class="box-title">Student List</h3>
			</div>
			
			<div class="col-xs-12 text-right">
				@if (Entrust::can('create-student'))
				<a href= "{{url('student/create')}}" class="btn btn-default" >
					<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
				</a>
				@endif
			</div>
			

			
			<div class="col-xs-12 text-right">
							</div>
			
		</div>
	</div><!-- /.box-header -->
	<div class="box-body">
		<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="row">
				<div class="col-sm-12">
					<table 
					id="example2" 
					class="table table-bordered table-hover dataTable" 
					role="grid" aria-describedby="example2_info">
					<thead>
						<tr role="row">
							<th 
							class="sorting_asc" 
							tabindex="0" 
							aria-controls="example2" 
							rowspan="1" colspan="1" 
							aria-label="Rendering engine: activate to sort column descending" 
							aria-sort="ascending">Student Detail</th>

							<th class="sorting" 
							tabindex="0" 
							aria-controls="example2" 
							rowspan="1" colspan="1" 
							aria-label="Platform(s): activate to sort column ascending">Option</th>

						</tr>
						<tr>
							<td class="hidden-xs hidden-sm">
								<div class="row">
									<div class="col-md-2 hidden-xs hidden-sm"><b>Nick Name</b></div>
									<div class="col-md-2 hidden-xs hidden-sm"><b>Picture</b></div>
									<div class="col-md-3 hidden-xs hidden-sm"><b>Student Name</b></div>
									<div class="col-md-2 hidden-xs hidden-sm"><b>Student Tel.</b></div>
									<div class="col-md-2 hidden-xs hidden-sm"><b>Parent Tel.</b></div>
								</td>

							</tr> 
						</thead>
						<tbody>

							@foreach ($studentlist as $student)
							<tr role="row" class="odd">
								<td class="sorting_1"> 
									<div class="row">
										<div class="col-md-2 col-xs-12"> {{$student->nickname}} </div>  
										<div class="col-md-2 col-xs-12">
											@if (!empty($student->picture))
											<img src="{{url('/uploads/profile_pictures/').'/'.$student->picture}}" height="80" />
											@else
											<img src="{{url('/uploads/profile_pictures/')}}/default.jpg" height="80" />
											@endif
										</div>   
										<div class="col-md-3 col-xs-12"> {{$student->firstname."  ".$student->lastname}} </div>

										<div class="col-md-2 col-xs-12">
											<!-- <div class="visible-xs ">Student:</div> -->

											{{$student->student_phone}}
											<span class="visible-xs-inline">(Student)</span>
										</div>

										<div class="col-md-2 col-xs-12">
											<!-- <div class=" visible-xs">Parent:</div> -->
											{{$student->parent_phone}}
											<span class="visible-xs-inline">(Parent)</span>
										</div>
									</div>
								</td>
								<td>
									@if (Entrust::can('view-student'))
									<a href= "{{url('student/'.$student->id)}}" class="btn btn-default" >
										<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
									</a>
									@endif

									@if (Entrust::can('edit-student'))
									<a href= "{{url('student/'.$student->id.'/edit')}}" class="btn btn-default" >
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</a>
									@endif

									@if (Entrust::can('delete-student'))
									<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" student_id="{{$student->id}}" student_name="{{$student->nickname . '(' . $student->firstname . ' ' . $student->lastname . ')'}}">
										<span class="fa fa-trash" aria-hidden="true"> </span>
									</button>
									@endif
								</td>
							</tr>
							@endforeach

							<form action="" method="POST" id="confirm-delete"> 


								<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Delete student</h4>
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
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><!-- /.box-body -->
</div>
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