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
			<form action="{{url('/teacher')}}" method="GET">
				@if (Entrust::can('create-teacher'))
				<div class="col-xs-12  text-left visible-xs" >
					<a href= "{{url('teacher/create')}}" class="btn btn-primary bg-primary custom-font" >
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
				        <button class="btn btn-default custom-to-black " type="submmit">
				        	 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				        	Search
				        </button>
				      </span>
					</div>
				</div>
				@if (Entrust::can('create-teacher'))
				<div class="col-sm-7  text-right hidden-xs col-md-8" >
					<a href= "{{url('teacher/create')}}" class="btn btn-primary bg-primary custom-font" >
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
					</a>
				</div>
				@endif
			</form>
		</div>
	</div>


	<div class="box-body ">
		<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
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

			<div class="row ">
				 <div class="col-sm-12 col-xs-12 col-md-11 col-md-offset-1" id="teacher_list_table">
				 	<div class="row hidden-xs hidden-sm" id="table_header">
						<div class="col-sm-2 col-xs-4 col-header vcenter">
							<span><strong>Profile Picture</strong></span>
						</div>
						<div class="col-sm-2 col-header vcenter">
							<span><strong>Nick Name</strong></span>
						</div>
						<div class="col-sm-3 col-header vcenter">
							<span><strong>Full name</strong></span>
						</div>
						<div class="col-sm-2 col-header vcenter">
							<span><strong>Teacher Tel.</strong></span>
						</div>
						<div class="col-sm-3 col-header vcenter">
							<span><strong>Option</strong></span>
						</div>
				</div>
				@foreach ($teachersList as $teacher)
		 		<div class="row ">
			 			<div class="col-sm-2 col-xs-4" id="profile-picture">
							@if (!empty($teacher->picture))
							<img class=" img-thumbnail table-profile-picture" src="{{url('/uploads/profile_pictures/').'/'.$teacher->picture}}"  width="70px">
							@else
							<img class=" img-thumbnail table-profile-picture" src="{{url('/uploads/profile_pictures/')}}/default.jpg" width="70px" />
							@endif       
						</div>
						<div class="col-sm-2 hidden-xs">
							ครู{{$teacher->nickname}}  
						</div>
						<div class="col-sm-3 hidden-xs">
							{{$teacher->firstname." ".$teacher->lastname}}       
						</div>
						<div class="col-sm-2 hidden-xs">
							{{ substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}}      
						</div>

						<div class="col-xs-6 visible-xs">
							ครู{{$teacher->nickname}} <br>
							{{$teacher->firstname." ".$teacher->lastname}} <br>
							{{ substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}} 

						</div>

	                    <form action="{{url('teacher/restore')}}" method="post">
	                    	{!! csrf_field() !!}
	                    	<!-- Single button -->
	                    	<div class="col-sm-2 hidden-xs">
	                    		<div class="btn-group ">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                            <input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">
								    <button type="submit" class="btn  btn-default btn-flat btn-sm">
								    	<i class="fa fa-reply"></i> Restore 
								    </button>
								</div>
	                    	</div>
	                	</form>
						<form action="{{url('teacher/restore')}}" method="post">
	                		<div class="col-xs-2 visible-xs ">
		            	
			                	{!! csrf_field() !!}
			            		<div class="btn-group">
				                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			                        <input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">
								    <button type="submit" class="btn btn-default btn-flat btn-xs">
								    	<i class="fa fa-reply"></i>
								    </button>
			            		</div>
			            	</div>
		            	</form>
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