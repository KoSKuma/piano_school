@extends('app')


@section('htmlheader_title')

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
								<input type="text" class="form-control pull-right" id="reservationtime" name="date" value="{{$date}}">
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
		<table class="table table-hover table-bordered" id="tabel-teacher-schedule">
			<thead>
				<tr>
					<th bgcolor="#736F6E"><font color="white">Days/Time</font></th>
					@foreach($time as $time_array)
						<th  bgcolor="#736F6E">
							<font color="white">{{$time_array}}</font>
						</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
					@foreach($dateArray as  $key=>$day)
						<tr>
							<td bgcolor="#A0A0A0">	
									<a href="{{url('schedule/create')}}/?teacher={{$teacher_id}}&day={{$key}}" class="link-color" ><b>{{$day}}</b></a>							      			
							</td>
						
							@foreach($time as $time_key)
							<?php 
									$student_name ='';
									$schedule_id = '';
							?>		
									

							<?php	 if(isset($schedule_of_teacher[$day][$time_key]))
									{	
										$student_name = $schedule_of_teacher[$day][$time_key];  
										$schedule_id = $schedules_id[$day][$time_key];

										?>


										<td onclick="document.location.href='{{url('schedule/'.$schedule_id.'/edit')}}/?teacher={{$teacher_id}}&day={{$key}}&time={{$time_key}}' " bgcolor="#C0D0FF" align="center"> {{$student_name}} </td>
									
										
										
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


@endsection

@section("script")

	<script type="text/javascript">
		$(document).ready(function(){
			$('#reservationtime').daterangepicker();

		
		})
	</script>


@endsection