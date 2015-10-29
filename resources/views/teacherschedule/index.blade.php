@extends('app')


@section('htmlheader_title')
Teacher Schedule
@endsection


@section('contentheader_title')
<h1>Teacher Schedule <small>Schedule List</small></h1>
@endsection


@section('main-content')
<div class="box box-solid box-default">
	<div class="box-header">
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-sm-7">
				<form action="{{url('teacherschedule')}}" method="POST" role="form">
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
						<input type="text" class="form-control pull-right" id="reservationtime" name="date" value="{{$date_request}}">
				      	<span class="input-group-btn">
				      		<input type="submit" class="btn btn-default">
				      	</span>
			    </div>
			</div>			
		</form>
			</div>
		<div class="row">
			<div class="col-sm-12" style="height:10px"></div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-hover table-bordered " id="tabel-teacher-schedule">
				<thead>
					<tr>
						<th bgcolor="#736F6E" style="text-align:center"><font color="white" >Time/Days</font></th>
						@foreach($date_range_selected as  $key=>$date)
							<th  bgcolor="#736F6E" style="text-align:center">
								<a href="{{url('schedule/create')}}/?teacher={{$teacher_id}}&day={{$key}}" class="link-color" ><b >{{$date}}</b></a>
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
										?>	<td bgcolor="#FFFFFF">{{$student_name}}</td>
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

	<script type="text/javascript">
		$(document).ready(function(){
			$('#reservationtime').daterangepicker();

		
		})
	</script>


@endsection