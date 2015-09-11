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
			<form action="{{url('/student')}}" method="GET">
				@if (Entrust::can('create-student'))
				<div class="col-xs-12  text-left visible-xs" >
					<a href= "{{url('student/create')}}" class="btn btn-primary  custom-font" >
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
					</a>
				</div>
				@endif
				<div class="row">
					<div class="col-xs-12" style="height:10px">
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4  ">
					<div class="input-group ">
					  <input type="text" class="form-control" name="search" placeholder="Search for...">
				      <span class="input-group-btn">
				        <button class="btn btn-default custom-to-black" type="submmit">
				        	 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				        	Search
				        </button>
				      </span>
					</div>
				</div>
				@if (Entrust::can('create-student'))
				<div class="col-sm-7  text-right hidden-xs col-md-8" >
					<a href= "{{url('student/create')}}" class="btn btn-primary custom-font" >
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
					</a>
				</div>
				@endif
			</form>
		</div>
	</div>


	<div class="box-body ">
		@if (isset($searchResult))
		<div class="row">
			<div class="col-xs-2 hidden-sm"></div>
		    <div class="col-xs-8 alert bg-gray color-palette">
		        <div class="col-xs-12">
		        	Search for {{$searchResult['keyword']}}, found {{$searchResult['count']}} results
		        </div>
		    </div>
		</div>
		@endif
		<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="row ">
				<div class="col-sm-12 col-md-11 col-md-offset-1 " id="schedule_list_table">
					<div class="row hidden-xs hidden-sm" id="table_header">
						
							<div class="col-sm-2 col-header vcenter">
								<span><strong>Profile Picture</strong></span>
							</div>
							<div class="col-sm-3 col-header vcenter">
								<span><strong>Name</strong></span>
							</div>
							<div class="col-sm-2 col-header vcenter">
								<span><strong>Student Tel.</strong></span>
							</div>
							<div class="col-sm-2 col-header vcenter">
								<span><strong>Parent Tel.</strong></span>
							</div>
							<div class="col-sm-3 col-header vcenter">
								<span><strong>Option</strong></span>
							</div>
					</div>

					@foreach ($deletedList as $student)
					<div class="row">
						<div class="col-sm-2 col-xs-4">
							@if (!empty($student->picture))
							<img class="img-thumbnail table-profile-picture" src="{{url('/uploads/profile_pictures/').'/'.$student->picture}}"  width="70px">
							@else
							<img class="img-thumbnail table-profile-picture" src="{{url('/uploads/profile_pictures/')}}/default.jpg"  width="70px" />
							@endif       
						</div>
						<div class="col-sm-3 hidden-xs">
							{{$student->firstname."  ".$student->lastname}} ({{$student->nickname}})
						</div>
						<div class="col-sm-2 hidden-xs">
							{{ substr($student->student_phone  ,0,3)."-".substr($student->student_phone   ,3,3)."-".substr($student->student_phone  ,6)}}      
						</div>
						<div class="col-sm-2 hidden-xs">
							{{substr($student->parent_phone  ,0,3)."-".substr($student->parent_phone   ,3,3)."-".substr($student->parent_phone  ,6)}}      
						</div>
						<div class="col-xs-6 visible-xs">
							{{$student->nickname}} <br>
							{{$student->firstname."  ".$student->lastname}}  <br>
							<span><b>Student Tel.</b></span><br>
							{{substr($student->student_phone  ,0,3)."-".substr($student->student_phone   ,3,3)."-".substr($student->student_phone  ,6)}}<br>
							<span><b>Parent Tel.</b></span><br>
							{{substr($student->parent_phone  ,0,3)."-".substr($student->parent_phone   ,3,3)."-".substr($student->parent_phone  ,6)}} <br>
						</div>

						<form action="{{url('student/restore')}}" method="post">
							{!! csrf_field() !!}
							<!-- Single button -->
							<div class="col-md-2 hidden-xs">
								<div class="btn-group ">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
									<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
										
									<button type="submit" class="btn  btn-default btn-flat btn-sm">
									    	<i class="fa fa-reply"></i> Restore 
									   </button>
								</div>
							</div>
						</form>
						
						<div class="visible-xs col-xs-2 ">
							<form action="{{url('student/restore')}}" method="post">
								{!! csrf_field() !!}
								<!-- Single button -->
								<div class="btn-group  " >
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">

									<button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
						<div class="col-xs-12" style="height:10px">
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