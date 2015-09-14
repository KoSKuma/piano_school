@extends('app')


@section('htmlheader_title')
List of all classes
@endsection


@section('contentheader_title')
@if(Entrust::hasRole('admin'))
<h1>Schedule <small>List of all Schedule</small></h1>
@endif
@if(Entrust::hasRole('teacher'))
<h1>Schedule <small>List of teacher's Schedule</small></h1>
@endif
@endsection


@section('main-content')

<div class="box box-solid box-default">
	<div class="box-header">
		<div class="row">
				<form action="{{url('/schedule')}}" method="GET">
					@if(Entrust::can('create-schedule'))
					<div class="col-xs-12  text-left visible-xs" >
						<a href= "{{url('schedule/create')}}" class="btn btn-primary custom-font" >
							<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
							Booking
						</a>
					</div>
					@endif
					<div class="row">
						<div class="col-xs-12" style="height:10px">
						</div>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-4  ">
						<div class="input-group ">
						  <input type="text" class="form-control" name="search" placeholder="Search for..." value="@if(!is_null($searchResult['keyword'])){{$searchResult['keyword']}}@endif">
					      <span class="input-group-btn">
					        <button class="btn btn-default " type="submmit">
					        	 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					        	Search
					        </button>
					      </span>
						</div>
					</div>
					@if(Entrust::can('create-schedule'))
					<div class="col-sm-7  text-right hidden-xs col-md-8" >
						<a href= "{{url('schedule/create')}}" class="btn btn-primary custom-font" >
							<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
							Booking
						</a>
					</div>
					@endif
					
				</form>
		

		

		</div>

	</div><!-- /.box-header -->
	<div class="box-body">
		@if (isset($searchResult['keyword']) && !empty($searchResult['keyword']))
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
				<div class="col-xs-2 col-sm-4 text-right" style="height:34px;">
					<span>
						<a href="{{url('/schedule?date=' . date('Y-m-d', strtotime('-1 day', strtotime($date))))}}@if(isset($searchResult['keyword']) && !empty($searchResult['keyword'])){{'&search='.$searchResult['keyword']}}@endif" 
							class="btn btn-responsive btn-default btn-flat">
							<i class="glyphicon glyphicon-chevron-left"></i>
						</a>
					</span>
	            </div>
				<div class="col-xs-8 col-sm-3">
					<div class="input-group" id="select-date-input">
	                    <input class="form-control" type="text" name="human-select-date" id="human-select-date" value="{{date('j M Y', strtotime($date))}}" />
	                    <span class="input-group-addon btn-responsive"><i class="glyphicon glyphicon-calendar"></i></span>
	                </div>
	                <input type="hidden" name="date" id="date" value="{{$date}}" />
	            </div>
	            <div class="col-xs-2 col-sm-5 " style="height:34px;">
	            	<span>
						<a href="{{url('/schedule?date=' . date('Y-m-d', strtotime('+1 day', strtotime($date))))}}@if(isset($searchResult['keyword']) && !empty($searchResult['keyword'])){{'&search='.$searchResult['keyword']}}@endif" class="btn btn-responsive btn-default btn-flat">
							<i class="glyphicon glyphicon-chevron-right"></i>
						</a>
					</span>
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
							<strong>Class Time</strong>
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
							<strong>Action</strong>
						</div>
						@endif
							
					</div>
					<div class="row">
                            <div class="col-xs-12" style="height:10px">
                            </div>
                    </div>





					@foreach ($schedules as $schedule)
					
					<div class="row @if($date == date('Y-m-d')) schedule-today @elseif(strtotime($date) < strtotime(date('Y-m-d'))) schedule-passed @endif" >
						
							<div class="col-md-2 col-xs-10 hidden-xs">
								 {{date('H:i', strtotime($schedule->start_time))}} -
								 {{date('H:i', strtotime($schedule->end_time))}}
							<div class="row">
                         		  <div class="col-xs-12" style="height:10px"></div>
                    		</div>
							</div>
							
							@if (!Entrust::hasRole('teacher'))
							<div class="col-md-3 col-xs-10 hidden-xs">
								ครู {{$schedule->teacher_nickname}} 
								<span class='visible-sm-inline visible-md-inline'><br /></span>
								({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}})
							</div>
							@endif

							@if (!Entrust::hasRole('student'))
							<div class="col-md-3 col-xs-12 hidden-xs">
								{{$schedule->student_nickname}} 
								<span class='visible-sm-inline visible-md-inline'>
									<br/>
								</span>
								({{$schedule->student_firstname}} {{$schedule->student_lastname}})
							</div>
							@endif
							<div class="col-md-1 col-xs-12 hidden-xs">
								@if (App\helpers\TextHelper::isStatus($schedule->status, 1))
									<span class="class-finished">	
								@elseif (App\helpers\TextHelper::isStatus($schedule->status, 2))
									<span class="class-reserved">
								@elseif (App\helpers\TextHelper::isStatus($schedule->status, 3))
									<span class="class-canceled">
								@endif
									{{$schedule->status}}
								</span>
							</div>  
							<div class="col-xs-10 visible-xs">
								{{date('j M Y ',strtotime($schedule->start_time))}} 
								 {{date('H:i', strtotime($schedule->start_time))}} -
								 {{date('H:i', strtotime($schedule->end_time))}} <br>

							 	@if (!Entrust::hasRole('teacher'))
								ครู{{$schedule->teacher_nickname}} 
								<span class='visible-sm-inline visible-md-inline'><br /></span>
								({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}})
								<br>
								@endif 

								@if (!Entrust::hasRole('student'))
								{{$schedule->student_nickname}} 
								<span class='visible-sm-inline visible-md-inline'></span>
								({{$schedule->student_firstname}} {{$schedule->student_lastname}})
								<br>
								@endif
								
								@if (App\helpers\TextHelper::isStatus($schedule->status, 1))
									<span class="class-finished">	
								@elseif (App\helpers\TextHelper::isStatus($schedule->status, 2))
									<span class="class-reserved">
								@elseif (App\helpers\TextHelper::isStatus($schedule->status, 3))
									<span class="class-canceled">
								@endif
									{{$schedule->status}}
								</span>

								<div class="row ">
									<div class="col-xs-12" style="height:20px"></div>
								</div>

							
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
									<input type="hidden" name="date" value="{{$date}}" />
									<input type="hidden" name="id" value="{{$schedule->id}}">
									<input type="hidden" name="req" value="confirm">
													
									<button class="btn btn-default btn-flat btn-sm" type="submit" id="button_check"  >
										<i class="fa fa-check"></i>
										Finished 
									</button>
									@endif

									@if (Entrust::can('edit-schedule'))
									<a href= "{{url('schedule/'.$schedule->id.'/edit')}}" class="btn btn-default btn-flat btn-sm"  >
										<i class="fa fa-edit"></i>
										Edit
									</a>	
									@endif

									@if (Entrust::can('confirm-taught-class'))
									<a class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#cancelModal" schedule_id="{{$schedule->id}}" <?php if($schedule->status=='Finished') echo 'disabled'; ?>>
										<i class="fa fa-close"></i>
										Cancel
									</a>	
									@endif
									
								</form>
							</div>

						<div class="col-xs-2 visible-xs">
							<form action="{{url('schedule/confirm')}}" method="post">
								{!! csrf_field() !!}
									<div class="btn-group ">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="button" class="btn btn-default btn-xs btn-flat dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
											<input type="hidden" name="date" value="{{$date}}" />
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
					@if (isset($searchResult['keyword']) && !empty($searchResult['keyword']))
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
		$("#human-select-date").val(moment(date.format('YYYY-MM-DD')).format('D MMM YY'));
		$("#date").val(date.format('YYYY-MM-DD'));
		window.location.href = "{{url('/schedule?date=')}}"+ $('#date').val();
	});

});

</script>
@endsection