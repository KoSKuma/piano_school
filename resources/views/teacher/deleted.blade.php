@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Teacher <small>Deleted</small></h1>
@endsection


@section('main-content')
<div class="box box-solid box-danger">
	<div class="box-header ">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="box-title">Teacher Deleted List</h3>
			</div>
		</div>
	</div>


	<div class="box-body ">
		<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

			<div class="row ">
				 <div class="col-sm-12 col-md-12 " id="schedule_list_table">
				 	<div class="row hidden-xs hidden-sm" id="table_header">
				 		
	                    <div class="col-md-2">
	                            <strong>Picture</strong>
	                    </div>
	                    <div class="col-md-2">
	                            <strong>Nick Name</strong>
	                    </div>
	                    <div class="col-md-2">
	                            <strong>Full name</strong>
	                    </div>
	                    <div class="col-md-2">
	                            <strong>Teacher Tel.</strong>
	                    </div>
	                    <div class="col-md-2">
	                            <strong>Option</strong>
	                    </div>
				 	</div>

				 	@foreach ($teachersList as $teacher)
					 	

				 		<div class="row ">
					 		<div class="col-md-12 col-xs-10">
						 		<div class="col-md-2 col-xs-4 ">
			                      @if (!empty($teacher->picture))
									<img class="img-responsive img-thumbnail"  style="min-width:52px; left:-10px; position:relative;" src="{{url('/uploads/profile_pictures/').'/'.$teacher->picture}}"  >
								  @else
									<img class="img-responsive img-thumbnail"  src="{{url('/uploads/profile_pictures/')}}/default.jpg"   />
								  @endif       
	                        	</div>

						 		<div class="col-md-2 ">
		                               ครู{{$teacher->nickname}}  
		                        </div>
		                        <div class="col-md-2 ">
		                               {{$teacher->firstname." ".$teacher->lastname}}       
		                        </div>
		                        <div class="col-md-2 ">
		                               {{ substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}}      
		                        </div>

		                        <form action="{{url('teacher/restore')}}" method="post">
		                        	{!! csrf_field() !!}
		                        	<!-- Single button -->
		                        	<div class="col-md-2 hidden-xs">
		                        		<div class="btn-group ">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
				                            <input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">
				                            <!-- <button type="button" class="btn btn-default">Select Action</button> -->
				                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						                        
						                        Select Action&nbsp;&nbsp;  
						                        <span class="sr-only">Toggle Dropdown </span>
						                        <span class="caret"></span>
						                    </button>

										  
										  <ul class="dropdown-menu">
										    <button type="submit" class="btn  btn-block">Restore</button>
										    
										  </ul>
										</div>
		                        	</div>
		                    	</form>
	                    	</div>
	                    	<div class="visible-xs col-xs-2">
	                    		<form action="{{url('teacher/restore')}}" method="post">
	                        	{!! csrf_field() !!}
	                        	<!-- Single button -->
	                        		<div class="btn-group  " >
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
			                            <input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">

									  <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="glyphicon glyphicon-th"></span>
									  </button>
									  <ul class="dropdown-menu dropdown-menu-right">
									    <button type="submit" class="btn  btn-block ">Restore</button>
									    
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
</div>

@endsection


@section('script')

@endsection