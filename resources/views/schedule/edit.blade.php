@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Schedule<small>Update</small></h1>
@endsection


@section('main-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Schedule</h3>
            </div><!-- /.box-header -->

            <!-- form start -->
            <form class="form-horizontal" role="form" action="{{url("schedule/".$scheduleById->id)}}" method="post"> 
                <input type="hidden" name="_method" value="PUT">

                {!! csrf_field() !!}

                <div class="box-body">
                    @if ($errors->has())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                        @endforeach
                    </div>
                    @endif


                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="teacher_name">Teacher Name</label>
                        <div class="col-sm-8">
                            <select name="teachers_id" class="form-control" id="teachers_id" >                                                                    
                                @foreach ($teacherlist as $teacher)
                                    <option value="{{$teacher->id}}" <?php
                                        if($teacher->id == $scheduleById->teachers_id) {
                                                echo "selected";
                                        } ?>
                                          > {{$teacher->nickname." "."(".$teacher->firstname." ".$teacher->lastname.")"}}
                                    </option>

                                @endforeach
                            </select>

                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="student_name">Student Name</label>
                        <div class="col-sm-8">
                           <select name="students_id" class="form-control" id="student_id" >                              
                                @foreach ($studentlist as $student)
                                    <option value="{{$student->id}}" <?php
                                        if($student->id == $scheduleById->students_id) {
                                                echo "selected";
                                        } ?>
                                          > {{$student->nickname." "."(".$student->firstname." ".$student->lastname.")"}}
                                    </option>
                                @endforeach
                        </select>

    
                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="start_time">Class Date</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                            <input type="text" class="form-control" name="class_date_display" id="class_date_display" value="{{date('j M Y ', strtotime($scheduleById->start_time) )}}" />
                                <div class="input-group-addon">
                                   <i class="fa fa-calendar"></i>
                                </div>
                            <input type="hidden" id="class_date" name="class_date" value="{{date('Y-m-d', strtotime($scheduleById->start_time) )}}"/>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="start_time">Class Time</label>
                        <div class="col-sm-3">
                            <div class="bootstrap-timepicker">
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input type="text" class="form-control" name="start_time_display" id="start_time_picker" value="{{date('H:i', strtotime($scheduleById->start_time) )}}" />
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                <input type="hidden" id="class_start_time" name="class_start_time" value="{{date('H:i:s', strtotime($scheduleById->start_time) )}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1 center-text">
                            to
                        </div>

                        <div class="col-sm-3">
                            <div class="bootstrap-timepicker">
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input type="text" class="form-control" name="end_time_display" id="end_time_picker" value="{{date('H:i', strtotime($scheduleById->end_time) )}}" />
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                <input type="hidden" id="class_end_time" name="class_end_time" value="{{date('H:i:s', strtotime($scheduleById->end_time) )}}"/>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="location">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="location" id="location" value="{{$scheduleById->location}}"/>
                        </div>
                    </div>

                    <div class="box-footer text-center">
                        <input type="submit" class="btn btn-primary" name="Save" value="Update" id="save" />
                    </div>

                </div>
                
            </form>  
        

        </div>
    </div>
</div>

@endsection


@section('script')
<!-- InputMask -->
<script src="{{url("plugins/input-mask/jquery.inputmask.js")}}" type="text/javascript"></script>
<script src="{{url("plugins/input-mask/jquery.inputmask.date.extensions.js")}}" type="text/javascript"></script>
<script src="{{url("plugins/input-mask/jquery.inputmask.extensions.js")}}" type="text/javascript"></script>
<script src="{{url("plugins/daterangepicker/daterangepicker.js")}}" type="text/javascript"></script>
<script src="{{url("plugins/timepicker/bootstrap-timepicker.js")}}" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("[data-mask]").inputmask();
});
</script>

<script>
$(document).ready(function(){
    $('#save').click(function(){
        /*var teacher_name = $(this).attr('data-teacher-name');
        var teacher_id = $(this).attr('data-teacher-id');

        console.log(teacher_name);*/

        var teacher = $("#teacher_id :selected").val(); 
/*        $('#teacher_id').val(teacher_id);
        $('#teacher_name').val(teacher_name);
        $('#teacher_id_input').val(teacher_id);*/

    });

    $('.select-student').click(function(){
/*        var student_name = $(this).attr('data-student-name');
        var student_id = $(this).attr('data-student-id');

        $('#student_id').val(student_id);
        $('#student_name').val(student_name);
        $('#student_id_input').val(student_id);
*/
    });

    $('#class_date_display').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "startDate": moment(),
        "minDate": moment(),
        "format": 'DD/MM/YYYY',
    }, function(date){
        //console.log('Class date: ' + date.format('YYYY-MM-DD'));
        $("#class_date").val(date.format('YYYY-MM-DD'));
    });

    //$("#start_time_picker").timepicker();
    $("#start_time_picker").timepicker(
        {
            showMeridian: false
        }).on('hide.timepicker', function(e) {

    $("#class_start_time").val( ("0" + e.time.hours).slice(-2) + ":" + ("0" + e.time.minutes).slice(-2) + ":" + "00");
  });


    
    $("#end_time_picker").timepicker(

        {
           showMeridian: false 
        }).on('hide.timepicker', function(e) {

     $("#class_end_time").val( ("0" + e.time.hours).slice(-2) + ":" + ("0" + e.time.minutes).slice(-2) + ":" + "00");
    });




});
</script>
@endsection

@section('style')
<link rel="stylesheet" href="{{url("plugins/timepicker/bootstrap-timepicker.css")}}" />
@endsection