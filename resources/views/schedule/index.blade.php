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

			<div class="col-xs-12 col-sm-4 box-tools pull-right">
				<form action="{{url('/schedule')}}" method="GET">
					<div class="has-feedback">
						<input class="form-control input-sm" name="search" id="searchBox" placeholder="Search..." type="text" value="{!! $searchResult['keyword'] !!}"/>
						<input type="hidden" name="date" value="{{$date}}" />
						<span class="glyphicon glyphicon-search form-control-feedback with-white-bg" id="search-icon"></span>
					</div>
				</form>
			</div>
		</div>

	</div><!-- /.box-header -->
	<div class="box-body">
		@if (isset($searchResult['keyword']))
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
			<div class="col-xs-12">
				<div class="col-xs-1 text-right col-sm-offset-3 col-md-offset-4">
					<a href="{{url('/schedule?date=' . date('Y-m-d', strtotime('-1 day', strtotime($date))))}}" class="btn btn-default btn-flat">
						<i class="glyphicon glyphicon-chevron-left"></i>
					</a>
	            </div>
				<div class="col-xs-10 col-sm-4 col-md-2">
					<div class="input-group" id="select-date-input">
	                    <input class="form-control" type="text" name="human-select-date" id="human-select-date" value="{{date('j M Y', strtotime($date))}}" />
	                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	                </div>
	                <input type="hidden" name="date" id="date" value="{{$date}}" />
	            </div>
	            <div class="col-xs-1">
					<a href="{{url('/schedule?date=' . date('Y-m-d', strtotime('+1 day', strtotime($date))))}}" class="btn btn-default btn-flat">
						<i class="glyphicon glyphicon-chevron-right"></i>
					</a>
	            </div>
			</div>
			<div class="col-xs-12" style="height:12px;">
			</div>
		</div>
		<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="row">
				<div class="col-sm-12 col-md-12 " id="schedule_list_table">
					<div class="row hidden-xs" id="table_header">
					
						<div class="col-md-2">
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
						<div class="col-md-1">
							<strong>Status</strong>
						</div>
						@if (Entrust::can('confirm-taught-class') || Entrust::can('edit-schedule') || Entrust::can('delete-schedule'))
						<div class="col-md-3">
							<strong>Option</strong>
						</div>
						@endif
							
					</div>

					@foreach ($schedules as $schedule)
					<div class="row">
						
							<div class="col-md-2 col-xs-10">
								{{date('j M y H:i', strtotime($schedule->start_time))}} - {{date('H:i', strtotime($schedule->end_time))}}

							</div>
							@if (!Entrust::hasRole('teacher'))
							<div class="col-md-3 col-xs-10">
								ครู {{$schedule->teacher_nickname}} 
								<span class='visible-sm-inline visible-md-inline'><br /></span>
								({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}})
							</div>
							@endif

							@if (!Entrust::hasRole('student'))
							<div class="col-md-3 col-xs-12">
								{{$schedule->student_nickname}} 
								<span class='visible-sm-inline visible-md-inline'>
									<br/>
								</span>
								({{$schedule->student_firstname}} {{$schedule->student_lastname}})
							</div>
							@endif
							<div class="col-md-1 col-xs-12">
								{{$schedule->status}}
							</div>                         
					
							<div class="col-md-3 hidden-xs">
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
													
									<button class="btn btn-default btn-flat" type="submit" id="button_check" >
										<i class="fa fa-check"></i>
										Status
									</button>
									@endif

									@if (Entrust::can('edit-schedule'))
									<a href= "{{url('schedule/'.$schedule->id.'/edit')}}" class="btn btn-default btn-flat">
										<i class="fa fa-edit"></i>
										Edit
									</a>	
									@endif

									@if (Entrust::can('delete-schedule'))
									<a class="btn btn-danger btn-flat" data-toggle="modal" data-target="#cancelModal" schedule_id="{{$schedule->id}}">
										<i class="fa fa-trash"></i>
										Cancel
									</a>	
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
										<h4 class="modal-title" id="myModalLabel">Cancel</h4>
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
					{{ (($schedules->currentPage() - 1) * $schedules->perPage() + 1) }}-{{ (($schedules->currentPage() - 1) * $schedules->perPage() + 1) + ($schedules->count() - 1)}} of {{$schedules->total()}}
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					@if (isset($searchResult['keyword']))
						{!! $schedules->appends(['search' => $searchResult['keyword']])->render() !!}
					@else
						{!! $schedules->render() !!}
					@endif
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

	$('#select-date-input').daterangepicker({
		"singleDatePicker": true,
		"showDropdowns": true,
		"startDate": "{{date('d/m/Y', strtotime($date))}}",
		"minDate": "01/01/2000",
		"format": 'DD/MM/YYYY',
	}, function(date){
		$("#human-select-date").val(moment(date.format('YYYY-MM-DD')).format('D MMM YYYY'));
		$("#date").val(date.format('YYYY-MM-DD'));
		window.location.href = "{{url('/schedule?date=')}}"+ $('#date').val();
	});

});

</script>
@endsection