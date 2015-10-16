@extends('app')


@section('htmlheader_title')

@endsection


@section('contentheader_title')
<h1>New Schedule <small>Schedule List</small></h1>
@endsection


@section('main-content')
<div class="box box-solid box-default">
	<div class="box-header">
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-sm-6">
				<form action="{{url('newschedule')}}" method="POST" role="form">
					{!! csrf_field() !!}
					<div class="input-group ">
						<select name="teacher" class="form-control">
							@foreach ($teachers as $teacher)
								<option value="{{$teacher->id}}" <?php
									if($teacher->id == $teacher_id){
										echo "selected";
									}
								 ?> >{{$teacher->firstname." ".$teacher->lastname}}</option>
							@endforeach
						</select>
					</div>
			</div>
			
					<div class="col-sm-6">
						<div class="input-group">
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
		<table class="table table-hover table-bordered " >
			<thead>
				<tr>
					<th>Days/Time</th>
					@foreach($time as $time_array)
					<th>
						{{$time_array}}
					</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				
					<?php
						
					 foreach($dateArray as $day) {
					?>
						<tr>
							<td>
								<?php 
									if(isset($schedule_of_teacher[$day])) {
										echo '<b>'.$day.'</b>'; 
									} else {
										echo $day; 
									}
								?>
							</td>
							@foreach($time as $time_key)
								<?php 
									$bgcolor = '#FEFCFF';
									if(isset($schedule_of_teacher[$day][$time_key]))
									{
										$bgcolor = '#C0D0FF';
									}
								?>
								<td bgcolor="{{$bgcolor}}">

								</td>
							@endforeach
						</tr>
					<?php } ?>
					
			</tbody>
		</table>
	</div>

</div>


@endsection

@section("script")

	<script type="text/javascript">
		$(document).ready(function(){
			$('#reservationtime').daterangepicker("option","dateFormat","dd/mm/yyyy");
		})
	</script>


@endsection