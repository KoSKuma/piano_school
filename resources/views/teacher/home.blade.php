@extends('app')


@section('htmlheader_title')
List of all classes
@endsection


@section('contentheader_title')
<h1>Homepage<small>{{"ครู".Auth::user()->nickname}} </small></h1>
@endsection

@section('main-content')

<div class="box box-solid box-default">
	<div class="box-header">
		<form action="{{url('home')}}" method="POST" role="form" id="dateform">
			{!! csrf_field() !!}
			<div class="row">
				<div class="col-xs-12 col-sm-4 pull-left hidden-xs">
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
		<form action="{{url('home')}}" method="POST" role="form" id="dateform-mobile">
			{!! csrf_field() !!}
			<div class="row">
				<div class="col-xs-12 visible-xs">
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
			</div>
		</form>

	</div>

	<div class="box-body"> 
		<div class="table-responsive">
			<table class="table table-hover table-bordered " id="tabel-teacher-schedule">
				<thead>
					<tr>
						<th bgcolor="#736F6E" style="text-align:center"><font color="white" >Time/Days</font></th>
						@foreach($date_range_selected as  $key=>$date)
							<th  bgcolor="#736F6E" style="text-align:center">
								<b class="bold-text">{{$date}}</b>
							</th>
						@endforeach
					</tr>
					
				</thead>
				<tbody>
					@foreach($time_in_config as $time_in_header)
						<tr>
								
							<td  bgcolor="#A0A0A0" align="center">
								<font color="#ffffff">{{$time_in_header}}</font>
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
											<td onclick="document.location.href='{{url('schedule/'.$schedule_id.'/edit')}}/?teacher={{$teacher_id}}&day={{$key}}&time={{$time_in_header}}' " bgcolor="#C0D0FF" align="center"> {{$student_name}} </td>	

								<?php   } 
										else {
										?>	<td bgcolor="#FFFFFF"></td>
								<?php		}

								?>		
								@endforeach
						
						</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	

	</div>

</div>



@endsection

@section("script")
<script src="{{ asset('/js/schedule_date_custom.js')}}" type="text/javascript"></script>
	
@endsection