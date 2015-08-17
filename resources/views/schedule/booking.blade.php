@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Booking<small>teacher</small></h1>
@endsection


@section('main-content')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Booking</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
        <form action="{{url("schedule")}}" method="post">
          Teacher id : <span class="teacher_id" ></span></br>
          Teacher name : <span class="teacher_name"></span></br>
          Student id : <span  class="student_id" ></span></br>
          Student name : <span class="student_name"></span></br>
          Start Time : <input type="text" name="start_time" /></br>
          End Time : <input type="text" name="end_time" /></br>
          Location : <input type="text" name="localtion" /></br>
          <button>Save</button>
        </form>     
     

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
                        @foreach($teacherlist as $teacher)
                               <tr role="row" class="odd">
                                <td class="sorting_1">{{$teacher->firstname." ".$teacher->lastname}}</td>
                                <td>{{$teacher->nickname}}</td>
                                <td>

                                    <button class="btn btn-default select-teacher" data-teacher-name="{{$teacher->firstname . ' ' . $teacher->lastname}}" data-teacher-id="{{$teacher->id}}">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Select
                                    </button>
                                </td>

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

                                    <button class="btn btn-default select-student" data-student-name="{{$student->firstname . ' ' . $student->lastname}}" data-student-id="{{$student->id}}">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Select
                                    </button>
                                </td>

                        @endforeach
                    </tbody>
                  </table>
                </div>
               </div> 
              </div>
            </div>



                <script>
                  $('.select-teacher').click(function(){
                    var teacher_name = $(this).attr('data-teacher-name');
                    var teacher_id = $(this).attr('data-teacher-id');
                    
                    $('.teacher_id').html(teacher_id);
                    $('.teacher_name').html(teacher_name);
                  });

                  $('.select-student').click(function(){
                    var student_name = $(this).attr('data-student-name');
                    var student_id = $(this).attr('data-student-id');

                    $('.student_id').html(student_id);
                    $('.student_name').html(student_name);

                  });
                </script>
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