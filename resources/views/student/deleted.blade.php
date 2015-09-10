@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Student <small>Deleted</small></h1>
@endsection


@section('main-content')
<div class="box box-solid box-danger">
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
						<div class="col-md-2 col-xs-2">
							<div class="col-md-2">
								<strong>Picture</strong>
							</div>
						</div>

						<div class="col-md-10 col-xs-8">
							<div class="col-md-2">
								<strong>Nick Name</strong>
							</div>
							<div class="col-md-3">
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
					</div>
					@foreach ($deletedList as $student)
					<div class="row">
						
						<div class="col-md-2 col-xs-2">
							<div class="col-xs-12 ">
								@if (!empty($student->picture))
								<img class="img-responsive img-thumbnail"  style="min-width:52px; left:-10px; position:relative;" src="{{url('/uploads/profile_pictures/').'/'.$student->picture}}"  />
								@else
								<img class="img-responsive img-thumbnail"  style="min-width:52px; left:-10px; position:relative;" src="{{url('/uploads/profile_pictures/')}}/default.jpg"  />
								@endif
							</div>           
						</div>
						<div class="col-md-10 col-xs-8">

							<div class="col-md-2 ">
								{{$student->nickname}}   
							</div>
							<div class="col-md-3 ">
								{{$student->firstname." ".$student->lastname}}       
							</div>
							<div class="col-md-2 ">
								{{ substr($student->student_phone ,0,3)."-".substr($student->student_phone ,3,3)."-".substr($student->student_phone ,6)}}      
							</div>
							<div class="col-md-2 ">
								{{ substr($student->parent_phone ,0,3)."-".substr($student->parent_phone  ,3,3)."-".substr($student->parent_phone  ,6)}}      
							</div>


							<form action="{{url('student/restore')}}" method="post">
								{!! csrf_field() !!}
								<!-- Single button -->
								<div class="col-md-2 hidden-xs">
									<div class="btn-group ">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
										<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
											
										<button type="submit" class="btn  btn-default">
										    	<i class="fa fa-reply"></i> Restore 
										   </button>
									</div>
								</div>
							</form>
						</div>

						<div class="visible-xs col-xs-2 ">
							<form action="{{url('student/restore')}}" method="post">
								{!! csrf_field() !!}
								<!-- Single button -->
								<div class="btn-group  " >
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">

									<button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="glyphicon glyphicon-th"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-right">			
										<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
											<li>
												<button type="submit" class="btn  btn-block"><span>restore</span></button> 
											</li>
									</ul>
								</div>
							</form>
						</div>

					</div>
					<div class="row">
						<div class="col-xs-12" style="height:24px">
						</div>
					</div>
					@endforeach
				</div>

			</div>	
		</div>
	</div>


@endsection


@section('script')

@endsection