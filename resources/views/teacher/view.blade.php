@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Teacher: {{ $teacher->firstname . ' ' . $teacher->lastname}}</h1>
@endsection

@section('main-content')


<div class="row">
    <form action="{{url('teacher/restore')}}" method="post">
                            {!! csrf_field() !!}
                            <!-- Single button -->
                            <div class="col-sm-11 text-right " >

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" id="delete_id" value="{{$teacher->id}}">
                            
                                @if (Entrust::can('edit-teacher'))
                                <a href= "{{url('teacher/'.$teacher->id.'/edit')}}" class="btn btn-flat btn-default btn-sm">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>
                                @endif
                                @if (Entrust::can('delete-teacher'))
                                <a 
                                    class="btn btn-flat btn-danger btn-sm"
                                    data-toggle="modal" 
                                    data-target="#myModal" 
                                    teacher_id="{{$teacher->id}}" 
                                    teacher_name="{{$teacher->nickname . ' (' . $teacher->firstname . ' ' . $teacher->lastname . ')'}}">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </a>
                                @endif

                            </div>
                        </form>
</div>


<div class="row">
        <div class="col-md-3 col-sm-2 ">
        </div>

        

        <div class="col-md-2 col-sm-3 hidden-xs ">
                @if(empty($teacher->user->picture))
                     <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/default.jpg')}}" height="200" />
                @else
                     <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/').'/'.$teacher->user->picture}}" height="200" />
                @endif
        </div>

        <div class="col-md-1 col-sm-2 hidden-xs ">
                <br/>
                <div class="row">
                    <b>Name</b>
                </div>
                <div class="row">
                    <b>Telephone</b>
                </div>
                <div class="row">
                    <b>Experience</b>
                </div>
                <div class="row">
                    <b>Degrees</b>
                </div>
                <div class="row">
                    <b>Institute:</b>
                </div>
                <div class="row">
                    <b>DateofBirth</b>
                </div>
        </div>

        <div class="col-md-3 col-sm-5 hidden-xs ">
            <div class="row">
                <br/>
                {{$teacher->user->firstname.'   '.$teacher->user->lastname.'  '.'('.$teacher->user->nickname.')'}}
            </div>
            <div class="row hidden-xs">
                {{substr($teacher->teacher_phone,0,3)."-".substr($teacher->teacher_phone,3,3)."-".substr($teacher->teacher_phone,6)}}
            </div>
            <div class="row">
                {{$teacher->experience}}
            </div>
            <div class="row">
                {{$teacher->degrees}}
            </div>
            <div class="row">
                {{$teacher->institute}} 
            </div>
             <div class="row">
                {{date('j F Y' ,strtotime($teacher->date_of_birth))}} 
            </div>
        </div>


        <div class="visible-xs  col-xs-12" >
            <div class="visible-xs visible-sm  col-xs-3">
            </div>
            <div class="visible-xs   col-xs-6">
                @if(empty($teacher->user->picture))
                     <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/default.jpg')}}" height="200" />
                @else
                     <img  class="img-responsive img-thumbnail img-teacher" src="{{url('/uploads/profile_pictures/').'/'.$teacher->user->picture}}" height="200" />
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
                    <b>Experience</b>
                </div>
                <div class="row">
                    <b>Degrees</b>
                </div>
                <div class="row">
                    <b>Institute:</b>
                </div>
                <div class="row">
                    <b>DateofBirth</b>
                </div>
        </div>  

        <div class="visible-xs   col-xs-6" >  
                <div class="row">
                <br/>
               {{'ครู'.$teacher->nickname}}
            </div>
            <div class="row">
                {{$teacher->experience}}
            </div>
            <div class="row">
                {{$teacher->degrees}}
            </div>
            <div class="row">
                {{$teacher->institute}} 
            </div>
             <div class="row">
                {{date('j F Y' ,strtotime($teacher->date_of_birth))}} 
            </div>
        </div>
</div>
<div class="row">
    </br>
    </div>


<div class="row">
    <div class="col-md-2">
</div>
    
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
               <div> 
                    <h3 class="box-title">Schedule</h3>
                        <div class="col-xs-12 text-right">
                            <a href= "{{url('schedule/create')}}" class="btn btn-primary" >
                                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                                Booking
                            </a>
                        </div>
                   
             </div>
           
            <div class="box-body">

                <div class="col-sm-12 col-md-12 " id="schedule_list_table">
                    <div class="row hidden-xs hidden-sm" id="table_header">
                    
                        <div class="col-md-4">
                            <strong>Class Date</strong>
                        </div>

                        <div class="col-md-4">
                            <strong>Student</strong>
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
                            

                            <div class="col-md-4 col-xs-12">
                                {{$schedule->student_nickname}}
                                <span class='visible-sm-inline visible-md-inline'>
                                    <br/>
                                </span>
                                ({{$schedule->student_firstname}} {{$schedule->student_lastname}})
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

    <form action="" method="POST" id="confirm-delete"> 

                <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Delete Teacher</h4>
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
    <script type="text/javascript">

$(document).ready(function(){
    $('#myModal').on('shown.bs.modal',function(e){
        $('#myInput').focus();
        console.log(e);
        delete_teacher_id = e.relatedTarget.attributes.teacher_id.value;
        delete_teacher_name = e.relatedTarget.attributes.teacher_name.value;

        $("#delete_message").html(delete_teacher_name);
        $("#confirm-delete").attr("action", "{{url('teacher')}}"+"/"+delete_teacher_id);
    });
    </script>
    @endsection