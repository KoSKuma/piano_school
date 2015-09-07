@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Student <small>Deleted</small></h1>
@endsection


@section('main-content')
<div class="box">
	<div class="box-header">
		<div class="row">
			<div class="col-xs-6">
				<h3 class="box-title">Student Deleted List</h3>
			</div>
		</div>
	</div>


	<div class="box-body ">
		<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="row ">
				 <div class="col-sm-12 col-md-12 " id="schedule_list_table">
				 	<div class="row hidden-xs" id="table_header">
				 		<div class="col-md-2">
	                            <strong>Nick Name</strong>
	                    </div>
	                    <div class="col-md-2">
	                            <strong>Picture</strong>
	                    </div>
	                    <div class="col-md-2">
	                            <strong>Student Name</strong>
	                    </div>
	                    <div class="col-md-2">
	                            <strong>Student Tel.</strong>
	                    </div>
	                    <div class="col-md-2">
	                            <strong>Parent Tel.</strong>
	                    </div>
	                    <div class="col-md-2">
	                            <strong>Option</strong>
	                    </div>
				 	</div>
				 	@foreach ($deletedList as $student)
				 	<div class="row">
				 		
                        <div class="col-md-2 col-xs-10">
                               {{$student->nickname}}      
                        </div>
                        <div class="col-md-2 col-xs-10">
                               @if (!empty($student->picture))
								<img src="{{url('/uploads/profile_pictures/').'/'.$student->picture}}" height="80" />
							   @else
								<img src="{{url('/uploads/profile_pictures/')}}/default.jpg" height="80" />
							   @endif     
                        </div>
                        <div class="col-md-2 col-xs-10">
                               {{$student->firstname." ".$student->firstname}}       
                        </div>
                        <div class="col-md-2 col-xs-10">
                               {{ substr($student->student_phone ,0,3)."-".substr($student->student_phone ,3,3)."-".substr($student->student_phone ,6)}}      
                        </div>
                        <div class="col-md-2 col-xs-10">
                               {{ substr($student->parent_phone ,0,3)."-".substr($student->parent_phone  ,3,3)."-".substr($student->parent_phone  ,6)}}      
                        </div>
                  
                        <form action="{{url('student/restore')}}" method="post">
                        	 {!! csrf_field() !!}
	                        <div class="col-md-2 col-xs-10">
	                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 
                                 <input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
	                            <button type="submit" ><span>restore</span></button> 

	                        </div>
                    	</form>
				 	</div>
				 	@endforeach
				 </div>	
			</div>
		</div>
	</div>
</div>

@endsection


@section('script')

@endsection