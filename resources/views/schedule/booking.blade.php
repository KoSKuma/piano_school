@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Schedule<small>booking</small></h1>
@endsection


@section('main-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Booking</h3>
            </div><!-- /.box-header -->

            <!-- form start -->
            <form class="form-horizontal" role="form" action="{{url("schedule")}}" method="post"> 

                {!! csrf_field() !!}
                <div class="box-body">

                @if ($errors->has())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                    @endforeach
                </div>
                @endif
                @if(isset($booking_time_error))
                    <div class="alert alert-danger">
                        <strong>Time has already booked!!!</strong><br>
                        @foreach ($booking_time_error as $booking_time_error)
                            {{'Start Time :'.$booking_time_error->start_time}} 
                            {{'End Time :'.$booking_time_error->end_time}}

                            <br>
                        @endforeach


                    </div>
                @endif
                

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="teacher_name">Teacher Name</label>
                        <div class="col-sm-8">
                            <select name="teachers_id" class="form-control" id="select_teacher" >
                                <option>Select Teacher</option>
                                @foreach ($teacherlist as $teacher)
                                    <option value="{{$teacher->id}}" <?php
                                        if($teacher->id == $teacher_id){
                                            echo "selected";
                                        }
                                     ?> 
                                     >{{"ครู".$teacher->nickname." "."(".$teacher->firstname." ".$teacher->lastname.")"}}</option>
                                @endforeach
                            </select>
                          
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="student_name">Student Name</label>
                        <div class="col-sm-8">
                             <select name="students_id" class="form-control" id="students_id" >
                                    <option>Select Student</option>
                                @foreach ($studentlist as $student)
                                    <option value="{{$student->id}}">
                                    <?php
                                        if($student->id == $student_id){
                                            echo "selected";
                                        }
                                     ?> 
                                    {{ $student->nickname." "."(".$student->firstname." ".$student->lastname.")" }}</option>
                                @endforeach
                            </select>
                             
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Class Date</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                            <input type="text" class="form-control" name="class_date_display" id="class_date_display" value="{{$day}}"/>
                                <div class="input-group-addon">
                                   <i class="fa fa-calendar"></i>
                                </div>
                            <input type="hidden" id="class_date" name="class_date" value="{{$day}}"/>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Class Time</label>
                        <div class="col-sm-3">
                            <select name="start_time" id="start_time" class="form-control">
                                @foreach($time_in_config as $time)
                                <option value="{{$time.':'.'00'}}">{{$time}}</option>
                                @endforeach
                            </select>
                
                        </div>
                        <div class="col-sm-1 center-text">
                            to
                        </div>

                        <div class="col-sm-3">
                            <select name="end_time" id="end_time" class="form-control" >
                                @foreach($time_in_config as $time)
                                <option value="{{$time.':'.'00'}}}">{{$time}}</option>
                                @endforeach
                            </select>
                            
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="location">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="location" id="location" />
                        </div>
                    </div>

                    <div class="box-footer text-center">

                        <input type="submit" class="btn btn-primary" name="Save" value="Save" />
                    </div>

                </div>
                
            </form>  
            <!-- form end -->
            

        </div>
    </div>
</div>

@endsection


@section('script')


<script type="text/javascript">
$(function () {
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("[data-mask]").inputmask();
});
</script>

<script>
$(document).ready(function(){
    $('.select-teacher').click(function(){
        var teacher_name = $(this).attr('data-teacher-name');
        var teacher_id = $(this).attr('data-teacher-id');

        console.log(teacher_name);

        $('#teacher_id').val(teacher_id);
        $('#teacher_name').val(teacher_name);
        $('#teacher_id_input').val(teacher_id);

    });

    $('.select-student').click(function(){
        var student_name = $(this).attr('data-student-name');
        var student_id = $(this).attr('data-student-id');

        $('#student_id').val(student_id);
        $('#student_name').val(student_name);
        $('#student_id_input').val(student_id);

    });

    $('#class_date_display').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "startDate": moment(),
        "minDate": moment(),
        "format": 'DD/MM/YYYY',
    }, function(date){
        
        $("#class_date").val(date.format('YYYY-MM-DD'));
    });

    
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
    // console.log('The time is ' + e.time.value);
    // console.log('The hour is ' + e.time.hours);
    // console.log('The minute is ' + e.time.minutes);
    // console.log('The meridian is ' + e.time.meridian);

     $("#class_end_time").val( ("0" + e.time.hours).slice(-2) + ":" + ("0" + e.time.minutes).slice(-2) + ":" + "00");
    });




});
</script>
@endsection

@section('style')
<link rel="stylesheet" href="{{url("plugins/timepicker/bootstrap-timepicker.css")}}" />
@endsection