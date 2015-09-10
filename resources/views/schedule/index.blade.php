@extends('app')


@section('htmlheader_title')
List of all classes
@endsection


@section('contentheader_title')

@endsection


@section('main-content')

<div class="box box-solid box-info">
	<div class="box-header">
		<div class="row">
			<div class="col-xs-6 col-md-12">
				<h3 class="box-title">Schedule List</h3>
			</div>

			@if(Entrust::can('create-schedule'))
			<div class="col-md-12 text-right">
				<a href= "{{url('schedule/create')}}" class="btn btn-primary" >
					<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
					Booking
				</a>
			</div>
			@endif
		</div>

	</div><!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			<div class="col-xs-5">
				<input type="text" />
			</div>
			<div class="col-xs-2 text-center">
				to
			</div>
			<div class="col-xs-5">
				<input type="text" />
			</div>
		</div>
		<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="row">
				<div class="col-sm-12 col-md-12 " id="schedule_list_table">
					<div class="row hidden-xs" id="table_header">
					
							<div class="col-md-3">
								<strong>Start Time-End Time</strong>
							</div>
							@if (!Entrust::hasRole('teacher'))
							<div class="col-md-3">
								<strong>Teacher</strong>
							</div>
							@endif
							@if (!Entrust::hasRole('student'))
							<div class="col-md-3">
								<strong>Student</strong>
							</div>
							@endif
							<div class="col-md-3">
								<strong>Status</strong>
							</div>
							@if (Entrust::can('confirm-taught-class') || Entrust::can('edit-schedule') || Entrust::can('delete-schedule'))
							<div class="col-md-2">
								<strong>Option</strong>
							</div>
							@endif
							
					</div>

					@foreach ($scheduleList as $schedule)
					<div class="row">
						
							<div class="col-md-2 col-xs-10">
								{{date('j M y H:i', strtotime($schedule->start_time))}} - {{date('H:i', strtotime($schedule->end_time))}}

							</div>
							@if (!Entrust::hasRole('teacher'))
							<div class="col-md-2 col-xs-10">
								ครู {{$schedule->teacher_nickname}} 
								<span class='visible-sm-inline visible-md-inline'><br /></span>
								({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}})
							</div>
							@endif

							@if (!Entrust::hasRole('student'))
							<div class="col-md-2 col-xs-12">
								{{$schedule->student_nickname}} 
								<span class='visible-sm-inline visible-md-inline'>
									<br/>
								</span>
								({{$schedule->student_firstname}} {{$schedule->student_lastname}})
							</div>
							@endif
							<div class="col-md-2 col-xs-12">
								{{$schedule->status}}
							</div>                         
					
							<div class="col-md-2 hidden-xs">
								<form action="{{url('schedule/confirm')}}" method="post">
									{!! csrf_field() !!}
									@if (Entrust::can('confirm-taught-class') || (Auth::user()->teachers_id == $schedule->teachers_id) )
									<input type="hidden" 
										   id="attr_schedule_{{$schedule->id}}" 
										   class_time="{{date('j M y H:i', strtotime($schedule->start_time))}} - {{date('H:i', strtotime($schedule->end_time))}}" 
										   teacher_name="ครู {{$schedule->teacher_nickname}} ({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}})" 
										   student_name="{{$schedule->student_nickname}} ({{$schedule->student_firstname}} {{$schedule->student_lastname}})" />
									<input type="hidden" name="id" value="{{$schedule->id}}">
									<input type="hidden" name="req" value="confirm">
													
									<button class="btn btn-default btn-block" type="submit" id="button_check" >Confirm Status</button>
									@endif

									@if (Entrust::can('edit-schedule'))
									<a href= "{{url('schedule/'.$schedule->id.'/edit')}}">Edit</a>	
									@endif

									@if (Entrust::can('delete-schedule'))
									<a data-toggle="modal" data-target="#cancelModal" schedule_id="{{$schedule->id}}">Cancel</a>	
									@endif
									
								</form>
							</div>

						<div class="col-md-2 visible-xs">
							<form action="{{url('schedule/confirm')}}" method="post">
								{!! csrf_field() !!}

								
									<div class="btn-group ">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										
										
										<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="glyphicon glyphicon-th"></span>
										</button>


										<ul class="dropdown-menu dropdown-menu-right">
												@if (Entrust::can('confirm-taught-class') || (Auth::user()->teachers_id == $schedule->teachers_id) )
												<li>
												<input type="hidden" 
													   id="attr_schedule_{{$schedule->id}}" 
													   class_time="{{date('j M y H:i', strtotime($schedule->start_time))}} - {{date('H:i', strtotime($schedule->end_time))}}" 
													   teacher_name="ครู {{$schedule->teacher_nickname}} ({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}})" 
													   student_name="{{$schedule->student_nickname}} ({{$schedule->student_firstname}} {{$schedule->student_lastname}})" />
												<input type="hidden" name="id" value="{{$schedule->id}}">
												<input type="hidden" name="req" value="confirm">
												
													<button class="btn btn-default btn-block" type="submit" id="button_check" >
														Confirm Status
													</button>
												</li>
												@endif

												@if (Entrust::can('edit-schedule'))
													<li>
														<a href= "{{url('schedule/'.$schedule->id.'/edit')}}" >
															Edit
														</a>
													</li>
												@endif

												@if (Entrust::can('delete-schedule'))
													<li>
														<a  data-toggle="modal" data-target="#cancelModal" schedule_id="{{$schedule->id}}">
															Cancel
														</a>
													</li>
												@endif
										
										</ul>
									</div>
							</form>
							</div>




					</div>
					<div class="row row-splitter">
						<div class="col-xs-12 visible-xs" style="height: 10px;">
						</div>
					</div>
					@endforeach


					<form action="{{url('schedule/confirm')}}" method="POST" > 


						<div class="modal fade " id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Cancel Class</h4>
									</div>
									<div class="modal-body">
										Are you sure you want to Cancel this class? (id: <span id="delete_id_message"></span>) <br />
										<span id="will_be_deleted_text">
										</span>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">No</button>

											
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="req" value="cancel">
											<input type="hidden" name="id" id="delete_id" value="">
											<button class="btn btn-warning" >
												<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"> </span> Yes
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					{{ (($scheduleList->currentPage() - 1) * $scheduleList->perPage() + 1) }}-{{ (($scheduleList->currentPage() - 1) * $scheduleList->perPage() + 1) + ($scheduleList->count() - 1)}} of {{$scheduleList->total()}}
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					{!! $scheduleList->render() !!}
				</div>
			</div>

		</div>
	</div>
</div><!-- /.box-body -->
</div>
@endsection

@section('script')
<script type="text/javascript">

$(document).ready(function(){
	$('#cancelModal').on('shown.bs.modal',function(e){

		delete_schedule_id = e.relatedTarget.attributes.schedule_id.value;
		delete_schedule_text = "<br />Class Time: " + $("#attr_schedule_"+delete_schedule_id).attr("class_time") + "<br />" + $("#attr_schedule_"+delete_schedule_id).attr("teacher_name") + "<br />" + $("#attr_schedule_"+delete_schedule_id).attr("student_name");
		
		$("#delete_id_message").html(delete_schedule_id);
		$("#will_be_deleted_text").html(delete_schedule_text);
		$("#delete_id").val(delete_schedule_id);
		
	});
});

</script>
@endsection