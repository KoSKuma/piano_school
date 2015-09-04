@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Teacher <small>Deleted</small></h1>
@endsection


@section('main-content')
<div class="box">
	<div class="box-header">
		<div class="row">
			<div class="col-xs-6">
				<h3 class="box-title">Teacher Deleted List</h3>
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
				 	<div class="row">
				 		
                        <div class="col-md-2 col-xs-10">
                               ครู{{$teacher->nickname}}      
                        </div>
                        <div class="col-md-2 col-xs-10">
                               @if (!empty($teacher->picture))
								<img src="{{url('/uploads/profile_pictures/').'/'.$teacher->picture}}" height="80" />
							   @else
								<img src="{{url('/uploads/profile_pictures/')}}/default.jpg" height="80" />
							   @endif     
                        </div>
                        <div class="col-md-2 col-xs-10">
                               {{$teacher->firstname." ".$teacher->lastname}}       
                        </div>
                        <div class="col-md-2 col-xs-10">
                               {{ substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}}      
                        </div>

                        <form action="{{url('teacher/restore')}}" method="post">
                        	 {!! csrf_field() !!}
	                        <div class="col-md-2 col-xs-10">
	                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 
                                 <input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">
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