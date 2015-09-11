@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Payment<small></small></h1>
@endsection


@section('main-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Payment</h3>
            </div><!-- /.box-header -->

            <!-- form start -->
            <form class="form-horizontal" role="form" action="{{url("payment")}}" method="post"> 

                {!! csrf_field() !!}
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="teacher_name">Teacher Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="teacher_name" id="teacher_name" readonly />
                            <input type="hidden" value="" id="teacher_id_input" name="teachers_id" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="student_name">Student Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="student_name" id="student_name" readonly />
                            <input type="hidden" value="" id="student_id_input" name="students_id"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="topup_time">Topup (Hours)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="topup_time" id="topup_time" placeholder="Enter topup time (hours)" /> 
                        </div>
                    </div>

                    <div class="box-footer text-center">
                        <input type="submit" class="btn btn-primary" name="Save" value="Save" />
                    </div>

                </div>
                
            </form>  
            <!-- form end -->
            


            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table 
                            id="example2" 
                            class="table table-bordered table-hover dataTable" 
                            role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th 
                                    class="sorting_asc" 
                                    tabindex="0" 
                                    aria-controls="example2" 
                                    rowspan="1" colspan="1" 
                                    aria-label="Rendering engine: activate to sort column descending" 
                                    aria-sort="ascending">Teacher</th>


                                    <th 
                                    class="sorting_asc" 
                                    tabindex="0" 
                                    aria-controls="example2" 
                                    rowspan="1" colspan="1" 
                                    aria-label="Rendering engine: activate to sort column descending" 
                                    aria-sort="ascending">Nick Name</th>


                                    <th class="sorting" 
                                    tabindex="0" 
                                    aria-controls="example2" 
                                    rowspan="1" colspan="1" 
                                    aria-label="Platform(s): activate to sort column ascending">Option</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teacherlist as $teacher )
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{$teacher->firstname." ".$teacher->lastname}}</td>
                                    <td>{{$teacher->nickname}}</td>
                                    <td>

                                        <button class="btn btn-default select-teacher" data-teacher-name="ครู {{$teacher->nickname}} ({{$teacher->firstname . ' ' . $teacher->lastname}})" data-teacher-id="{{$teacher->id}}" >
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Select
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table 
                            id="example2" 
                            class="table table-bordered table-hover dataTable" 
                            role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th 
                                    class="sorting_asc" 
                                    tabindex="0" 
                                    aria-controls="example2" 
                                    rowspan="1" colspan="1" 
                                    aria-label="Rendering engine: activate to sort column descending" 
                                    aria-sort="ascending">Student</th>


                                    <th 
                                    class="sorting_asc" 
                                    tabindex="0" 
                                    aria-controls="example2" 
                                    rowspan="1" colspan="1" 
                                    aria-label="Rendering engine: activate to sort column descending" 
                                    aria-sort="ascending">Nick Name</th>


                                    <th class="sorting" 
                                    tabindex="0" 
                                    aria-controls="example2" 
                                    rowspan="1" colspan="1" 
                                    aria-label="Platform(s): activate to sort column ascending">Option</th>


                                </tr>
                            </thead>
                            <tbody>
                               @foreach($studentlist as $student)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{$student->firstname." ".$student->lastname}}</td>
                                    <td>{{$student->nickname}}</td>
                                    <td>

                                        <button class="btn btn-default select-student" data-student-name="{{$student->nickname}} ({{$student->firstname . ' ' . $student->lastname}})" data-student-id="{{$student->id}}">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true" ></span> Select
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>

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
        //console.log('Class date: ' + date.format('YYYY-MM-DD'));
        $("#class_date").val(date.format('YYYY-MM-DD'));
    });

    //$("#start_time_picker").timepicker();
    $("#start_time_picker").timepicker(
        {
            showMeridian: false
        }).on('hide.timepicker', function(e) {
    // console.log('The time is ' + e.time.value);
    // console.log('The hour is ' + e.time.hours);
    // console.log('The minute is ' + e.time.minutes);
    // console.log('The meridian is ' + e.time.meridian);

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