@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Student: {{$student->user->firstname.' '.$student->user->lastname}}</h1>
@endsection


@section('main-content')
<div class="row">
	<form action="{{url('student/restore')}}" method="post">
					{!! csrf_field() !!}
					<!-- Single button -->
					<div class="col-sm-11  text-right">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" id="delete_id" value="{{$student->id}}">
						
							
						@if (Entrust::can('edit-student'))
						<a href= "{{url('student/'.$student->id.'/edit')}}" class="btn btn-default btn-flat btn-sm">
							<i class="fa fa-edit"></i>
							Edit
						</a>
						@endif

						@if (Entrust::can('delete-student'))
						<a class="btn btn-danger btn-flat btn-sm"
						   data-toggle="modal" 
						   data-target="#myModal" 
						   student_id="{{$student->id}}" 
						   student_name="{{$student->nickname . '(' . $student->firstname . ' ' . $student->lastname . ')'}}">
						   <i class="fa fa-trash"></i>
						   Delete
						</a>	
						@endif
					</div>
	</form>
</div>

<div class="row">

	 <div class="col-md-3 col-sm-1 ">
     </div>

     <div class="col-md-2 col-sm-3 hidden-xs ">
     	@if(empty($student->user->picture))
				<img   class="img-responsive img-thumbnail img-student" src="{{url('/uploads/profile_pictures/default.jpg')}}" height="200" />
		@else
				<img  class="img-responsive img-thumbnail img-student" src="{{url('/uploads/profile_pictures/').'/'.$student->user->picture}}" height="200" />
		@endif
     </div>


        <div class="col-md-1 col-sm-2 hidden-xs ">
                <br/>
                <div class="row">
                    <b>Name</b>
                </div>
                <div class="row">
                    <b>Tel.</b>
                </div>
                <div class="row">
                    <b>Parent Tel.</b>
                </div>
                 <div class="row">
                    <b>E-mail</b>
                </div>
                <div class="row">
                    <b>DateofBirth</b>
                </div>
                <div class="row">
                    <b>hours.</b>
                </div>
          
        </div>

        <div class="col-md-3 col-sm-5 hidden-xs ">
            <div class="row">
                <br/>
                {{ $student->user->lastname.'   '.$student->user->lastname.'  '.'('.$student->user->nickname.')'}}
            </div>
            <div class="row hidden-xs">
               	{{substr($student->student_phone,0,3)."-".substr($student->student_phone,3,3)."-".substr($student->student_phone,6)}}
            </div>
            <div class="row">
             	{{substr($student->parent_phone,0,3)."-".substr($student->parent_phone,3,3)."-".substr($student->parent_phone,6)}}
            </div>
            <div class="row">
            	{{$student->user->email}}
            </div>
            <div class="row">
                {{date('j F Y' ,strtotime($student->user->date_of_birth))}}
            </div>
            <div class="row">
 				 @foreach($times as $time)  
                     {{$time['textHours']}} 
                 @endforeach					            
            </div>
            <div class="row">    
            </div>
        </div>
</div>


<div class="visible-xs  col-xs-12" >
            <div class="visible-xs visible-sm  col-xs-3">
            </div>
            <div class="visible-xs   col-xs-6">
                @if(empty($student->user->picture))
					<img   class="img-responsive img-thumbnail img-student" src="{{url('/uploads/profile_pictures/default.jpg')}}" height="200" />
				@else
					<img  class="img-responsive img-thumbnail img-student" src="{{url('/uploads/profile_pictures/').'/'.$student->user->picture}}" height="200" />
				@endif
            </div>
            <div class="visible-xs  col-xs-3">
            </div>
</div>

            <div class="visible-xs  col-xs-1">
            </div>

             <div class="visible-xs  col-xs-4" >
                <br/>
                   <div class="row">
                        <b>Name</b>
                    </div>
                    <div class="row">
                        <b>Tel.</b>
                    </div>
                    <div class="row">
                        <b>E-mail</b>
                    </div>
                    <div class="row">
                        <b>DateofBirth</b>
                    </div>
                    <div class="row">
                        <b>hours.</b>
                    </div>
             </div>  

            <div class="visible-xs   col-xs-6" >  
                <div class="row">
                    <br/>
                   {{$student->user->nickname}}
                </div>
                <div class="row">
                   {{$student->user->email}}
                </div>
                <div class="row">
                   {{date('j F Y' ,strtotime($student->date_of_birth))}}
                </div>
                <div class="row">
                   {{$student->user->email}}
                </div>
                 <div class="row">
                    @foreach($times as $time)  
                         {{$time['textHours']}}
                    @endforeach
                </div>
              </div>

<div class="row">
    </br>
    <div class="col-md-2">
    </div>
</div>

<div class="col-md-2">
	</br>
</div>
<div class="row">
 <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Schedule</h3>
            </div>
            <div class="box-body">

                <div class="col-sm-12 col-md-12 ">
                    <div class="row hidden-xs hidden-sm" id="table_header">
                    
                        <div class="col-md-4">
                            <strong>Class Date</strong>
                        </div>
                        
                        <div class="col-md-4">
                            <strong>Teacher </strong>
                        </div>
                        
                        <div class="col-md-4">
                            <strong>Status</strong>
                        </div>
                              
                    </div> 
                </div>


                <div class="row">
                    @foreach($schedules as $schedule)
                            <div class="col-md-4 col-xs-10">
                                {{date('j M y H:i', strtotime($schedule->start_time))}} - {{date('H:i', strtotime($schedule->end_time))}}                      

                            </div>
                            
                            <div class="col-md-4 col-xs-10">
                                {{'ครู'.$schedule->teacher_nickname}}
                                <span class='visible-sm-inline visible-md-inline'><br /></span>
                                ({{$schedule->teacher_firstname}} {{$schedule->teacher_lastname}})
                            </div>
                        
                            <div class="col-md-4 col-xs-12">
                                {{$schedule->status}}
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
</div>

<form action="" method="POST" id="confirm-delete"> 

				<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Delete Student</h4>
							</div>
							<div class="modal-body">
								Are you sure you want to delete <span id="delete_message"></span>? 
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="btn btn-danger" >
										<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"> </span> Delete
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>

</form>
	




				



@endsection


@section('script')
<!-- InputMask -->
<script src="{{url("plugins/input-mask/jquery.inputmask.js")}}" type="text/javascript"></script>
<script src="{{url("plugins/input-mask/jquery.inputmask.date.extensions.js")}}" type="text/javascript"></script>
<script src="{{url("plugins/input-mask/jquery.inputmask.extensions.js")}}" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
	$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	$("[data-mask]").inputmask();
});
</script>
@endsection