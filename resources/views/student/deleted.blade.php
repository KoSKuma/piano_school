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
                               {{$student->lastname}}      
                        </div>
                        <div class="col-md-2 col-xs-10">
                               {{$student->student_phone}}      
                        </div>
                        <div class="col-md-2 col-xs-10">
                               {{$student->parent_phone}}      
                        </div>


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