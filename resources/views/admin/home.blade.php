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
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Class Time</th>
						<th>Teacher</th>
						<th>Student</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($scheduleList as $schedule)
					<tr>
						<td >{{date('j M Y G:i', strtotime($schedule->start_time))}} - {{date('G:i', strtotime($schedule->end_time))}}</td>
						<td>{{$schedule->teacher_nickname}} 
							<span class='visible-sm-inline visible-md-inline'><br /></span>
							({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}})
						</td>
						<td>
							{{$schedule->student_nickname}} 
							<span class='visible-sm-inline visible-md-inline'><br />
							</span>({{$schedule->student_firstname}} {{$schedule->student_lastname}})
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>

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