@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Student <small>add</small></h1>
@endsection


@section('main-content')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add a New Student</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" role="form" action="{{url("student/".$student->id)}}" method="post">
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
              <label class="col-sm-3 control-label" for="name">Name</label>
              <div class="col-sm-4">
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Firstname" value="{{$student->firstname}}" />
              </div>
              <div class="col-sm-4">
                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Lastname" value="{{$student->lastname}}" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="name">Nick Name</label>
              <div class="col-sm-4">
                <input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nick name" value="{{$student->nickname}}" />
              </div>
            </div>

              
            <div class="form-group">
              <label class="col-sm-3 control-label" for="email">Email address</label>
              <div class="col-sm-8">
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{$student->email}}" />
              </div>
            </div>

     

          <div class="form-group">
            <label class="col-sm-3 control-label" >Student Phone</label>
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                  <input type="text" name="student_phone" class="form-control" id="student_phone" placeholder="Studentphone" value="{{$student->student_phone}}"/>
                </div>

            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-3 control-label" >Parent Phone</label>
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                  <input type="text" name="parent_phone" class="form-control" id="parent_phone" placeholder="Parentphone"  value="{{$student->parent_phone}}"/>
                </div>

            </div>
          </div>

       



          <div class="form-group">
            <label class="col-sm-3 control-label" for="date_of_birth">Date of Birth</label>
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="yyyy/mm/dd"  value="{{$student->date_of_birth}}"/>

            </div>
          </div>
        </div><!-- /.box-body -->

        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-2">
  </div>
</div>

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