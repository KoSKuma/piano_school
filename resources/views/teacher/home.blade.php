@extends('app')


@section('htmlheader_title')
List of all classes
@endsection


@section('contentheader_title')
<h1>Homepage<small>Teacher</small></h1>
@endsection


@section('main-content')

	<div class="box box-solid box-default">
	    <div class="box-header">
	        <div class="row">
	            <div class="col-xs-12">
	                <h3 class="box-title hidden-xs">Schedule of Teacher : {{Auth::user()->firstname.Auth::user()->lastname}}</h3>
	                <h4 class="box-title visible-xs">Schedule of Teacher <br>
	                	{{Auth::user()->firstname.Auth::user()->lastname}}</h4>
	            </div>
	           
	        </div>
	    </div><!-- /.box-header -->

	    <div class="box-body">
	        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
	            <div class="row">
	
	                <div class="col-sm-12" id="schedule_list_table">

	                    <div class="row hidden-xs" id="table_header">
	                        <div class="col-sm-3">
	                            <strong>Class Time</strong>
	                        </div>
	                     
	                        <div class="col-sm-3">
	                            <strong>Student</strong>
	                        </div>
	                         
	                    </div>

	                    @foreach ($scheduleList as $schedule)
	                    <div class="row">
	                      
	                        <div class="col-md-3 col-xs-10 hidden-xs">
	                            {{date('j M Y  G:i', strtotime($schedule->start_time))}} - {{date('G:i', strtotime($schedule->end_time))}}
	                        </div>
	                    
	                        <div class="col-md-3 col-xs-12 hidden-xs">
	                            {{$schedule->student_nickname}} <span class='visible-sm-inline visible-md-inline'><br /></span>({{$schedule->student_firstname}} {{$schedule->student_lastname}})
	                        </div>
	                        <div class="col-xs-12 visible-xs">
	                        	<b>Date : </b>{{date('j M Y', strtotime($schedule->start_time))}} <br>  
	                        	<b>Time : </b>{{date('G:i', strtotime($schedule->start_time))}} -
	                        	{{date('G:i', strtotime($schedule->end_time))}}<br>
	                        	<b>Student : </b>{{$schedule->student_nickname}} 
	                        	<span class='visible-sm-inline visible-md-inline'><br /></span>({{$schedule->student_firstname}} {{$schedule->student_lastname}})
	                        </div>
	                        <div class="row">
	                        	<div class="col-xs-12 " style="height: 20px;">
	                        </div>
	                    </div>

	                        
	                    </div>

	            
	                    @endforeach
					</div>
				</div>
	    	</div>
		</div><!-- /.box-body -->
	</div>



@endsection