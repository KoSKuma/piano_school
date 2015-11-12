@extends('app')


@section('htmlheader_title')
Teacher Schedule
@endsection


@section('contentheader_title')
<h1>Teacher Schedule <small> 
	@foreach ($teachers as $teacher) 
		@if($teacher->id == $teacher_id)
			{{"ครู".$teacher->nickname}} 
		@endif
	@endforeach

</small></h1>
@endsection


@section('main-content')

<div class="box  box-solid box-default">
	<div class="box-header">
		<form action="{{url('teacherschedule')}}" method="POST" role="form" id="dateform">
			<div class="row hidden-xs">
				<div class="col-sm-7">
						{!! csrf_field() !!}
						<div class="input-group ">
							<label>Select Teacher</label>
							<select name="teacher" class="form-control" id="select_teacher" >
								@foreach ($teachers as $teacher)
									<option value="{{$teacher->id}}" <?php
										if($teacher->id == $teacher_id){
											echo "selected";
										}
									 ?> >{{"ครู".$teacher->nickname." "."(".$teacher->firstname." ".$teacher->lastname.")"}}</option>
								@endforeach
							</select>

						</div>
				</div>
				<div class="col-sm-5">
					<label>Select Date Range</label>
					<div class="input-group">
						<div class="input-group-addon">
		                  <i class="fa fa-calendar"></i>
		                </div>
							<input type="text" class="form-control pull-right" id="reservationtime" name="date" 
							value =" <?php 
								if($date_request!=NULL){
									echo $date_request;
								}else {
									 $date = new DateTime();
									 $today =$date->format('m/d/Y');
									 echo $today.' - '.$today;	
										
								} ?> " 
							>
					      
				    </div>
				</div>	
			</div>		
		</form>
		<form action="{{url('teacherschedule')}}" method="POST" role="form" id="dateform-mobile">
			<div class="row visible-xs" >
					{!! csrf_field() !!}
					<div class="col-xs-10">
						<div class="input-group">
							 <span class="input-group-btn">
						        <button class="btn btn-default" type="button" id="prevday">
						        	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true" ></span>
						        </button>
						      </span>
							<input type="text" class="form-control" id="reservationtime-mobile" name="date" 
								value = "<?php 
									if($date_request!=NULL){
										echo $date_request;
									}else {
										 $date = new DateTime();
										 $today =$date->format('m/d/Y');
										 echo $today.' - '.$today;		
									} ?>">
							<span class="input-group-btn">
						         <button class="btn btn-default" type="button" id="nextday">
						        	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span>
						        </button>
						    </span>
					    </div>
					</div>
					<div class="col-xs-2">
						<button type="button" class="btn  pull-right  btn-circle btn-xs" id="btn-show-hide">
							<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
						</button>
					</div>
			</div>
			<div class="row" id="sliding">
					<div class="col-sm-7">
							<div class="input-group ">
								<label>Select Teacher</label>
								<select name="teacher" class="form-control" id="select_teacher" >
									@foreach ($teachers as $teacher)
										<option value="{{$teacher->id}}" <?php
											if($teacher->id == $teacher_id){
												echo "selected";
											} 
										 ?> >
										 {{"ครู".$teacher->nickname." "."(".$teacher->firstname." ".$teacher->lastname.")"}}
										</option>
									@endforeach
								</select>
							</div>
								<button type="submit" class="btn btn-default btn-block">Submit</button>
					</div>
			</div>
		</form>
	</div>
	<div class="box-body">
		
		<div class="row">
			<div class="col-sm-12" style="height:10px"></div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-hover table-bordered " id="tabel-teacher-schedule">
				<thead>
					<tr>
						<th style="text-align:center">Time/Days</th>
						@foreach($date_range_selected as  $key=>$date)
							<th style="text-align:center">
								<a href="{{url('schedule/create')}}/?teacher={{$teacher_id}}&day={{$key}}" class="link-color" >
									<i class="fa fa-plus-square-o"></i>
									<b >{{$date}}</b>
								</a>
							</th>
						@endforeach
					</tr>
					
				</thead>
				<tbody>
					@foreach($time_in_config as $time_in_header)
						<tr>
								
							<td   align="center">
								{{$time_in_header}}
							</td>
								
								@foreach($date_range_selected as  $key=>$date)
								<?php 

										$student_name ='';
										$schedule_id = '';
								?>		
								<?php	 if(isset($schedule_of_teacher[$date][$time_in_header]))
										{	
											$student_name = $schedule_of_teacher[$date][$time_in_header];  
											$schedule_id = $schedules_id[$date][$time_in_header];
											?>
											<td class="schedule-on-table" bgcolor="#3cd481" onclick="document.location.href='{{url('schedule/'.$schedule_id.'/edit')}}/?teacher={{$teacher_id}}&day={{$key}}&time={{$time_in_header}}' "  align="center"> <font color="white"><b>{{$student_name}}</b>  </font></td>	

								<?php   } 
										else {
										?>	<td ></td>
								<?php		}

								?>		
								@endforeach
						
						</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
</div>


@endsection

@section("script")

<script src="{{ asset('/js/schedule_date_custom.js')}}" type="text/javascript"></script>

@endsection