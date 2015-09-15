@extends('app')


@section('htmlheader_title')
List of all classes
@endsection


@section('contentheader_title')
<h1>Homepage<small>Admin</small></h1>
@endsection


@section('main-content')


	<div class="box box-solid box-default">
		<div class="box-header">
			<div class="row">
				<div class="col-xs-6">
					<h3 class="box-title">All Schedule</h3>
				</div>
			<!-- 	<div class="col-xs-6 text-right">
					<a href= "{{url('schedule/create')}}" class="btn btn-default" >
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
					</a>
				</div> -->
			</div>
		</div><!-- /.box-header -->

		<div class="box-body">
			<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
				<div class="row">
					
					<div class="col-sm-12" id="schedule_list_table">

						<div class="row hidden-xs" id="table_header">
							<div class="col-sm-2">
								<strong>Class Time</strong>
							</div>
							<div class="col-sm-3">
								<strong>Teacher</strong>
							</div>
							<div class="col-sm-3">
								<strong>Student</strong>
							</div>
						
						</div>

						@foreach ($scheduleList as $schedule)
						<div class="row">
							<div class="col-md-2 hidden-xs">
								{{date('j M Y G:i', strtotime($schedule->start_time))}} - {{date('G:i', strtotime($schedule->end_time))}}
							</div>
							<div class="col-md-3 hidden-xs">
								{{$schedule->teacher_nickname}} 
								<span class='visible-sm-inline visible-md-inline'><br /></span>
								({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}})

							</div>
							<div class="col-md-3 hidden-xs">
								{{$schedule->student_nickname}} <span class='visible-sm-inline visible-md-inline'><br /></span>({{$schedule->student_firstname}} {{$schedule->student_lastname}})
							</div>
							<div class="col-md-3 hidden-xs">
								{{$schedule->student_nickname}} <span class='visible-sm-inline visible-md-inline'><br /></span>({{$schedule->student_firstname}} {{$schedule->student_lastname}})
							</div>
							
								<div class="col-xs-12 visible-xs">
									<span><b>Date : </b></span>{{date('j M Y G:i', strtotime($schedule->start_time))}} - {{date('G:i', strtotime($schedule->end_time))}}<br>
									<span><b>Teacher : </b></span>{{$schedule->teacher_nickname}} <span class='visible-sm-inline visible-md-inline'><br /></span>({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}}) <br>
									<span><b>Student : </b></span>{{$schedule->student_nickname}} <span class='visible-sm-inline visible-md-inline'><br /></span>({{$schedule->student_firstname}} {{$schedule->student_lastname}})

								</div>
							



						</div>

						<div class="row row-splitter visible-xs">
							<div class="col-xs-12 visible-xs" style="height: 10px;">
							</div>
						</div>

						<div class="row row-splitter hidden-xs">
							<div class="col-xs-12 " style="height: 10px;">
							</div>
						</div>
						@endforeach


						<form action="" method="POST" id="confirm-delete"> 


							<div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Delete Teacher</h4>
										</div>
										<div class="modal-body">
											Are you sure you want to delete this class? (id: <span id="delete_id_message"></span>) <br />
											<span id="will_be_deleted_text">
											</span>
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

					</div>
				</div>
			</div>
		</div>
	</div><!-- /.box-body -->


@endsection

@section('script')
<script type="text/javascript">

$('#deleteModal').on('shown.bs.modal',function(e){
	delete_schedule_id = e.relatedTarget.attributes.schedule_id.value;
	delete_schedule_text = "<br />" + $("#attr_schedule_"+delete_schedule_id).attr("class_time") + "<br />" + $("#attr_schedule_"+delete_schedule_id).attr("teacher_nickname") + "<br />" + $("#attr_schedule_"+delete_schedule_id).attr("student_nickname");

	$("#delete_id_message").html(delete_schedule_id);
	$("#will_be_deleted_text").html(delete_schedule_text);
	$("#confirm-delete").attr("action", "{{url('schedule')}}"+"/"+delete_schedule_id);
});

</script>
@endsection