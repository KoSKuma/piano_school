@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Teacher <small>add</small></h1>
@endsection


@section('main-content')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Update Teacher</h3>
      </div><!-- /.box-header -->
      <!-- form start -->

      <form class="form-horizontal" role="form" action="{{url("teacher/".$teacher->id)}}" method="PUT">

       

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
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Firstname" value="{{$teacher->firstname}}"/>
              </div>
              <div class="col-sm-4">
                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Lastname" value="{{$teacher->lastname}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="name">Nick Name</label>
              <div class="col-sm-4">
                <input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nick name" value="{{$teacher->nickname}}" />
              </div>
            </div>

            
            <div class="form-group">
              <label class="col-sm-3 control-label" for="experience">Experience</label>
               <div class="col-sm-8">
                <input type="text" name="experience" class="form-control" id="experience" placeholder="Experience"  value="{{$teacher->experience}}" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="experience">Degrees</label>
               <div class="col-sm-8">
                <input type="text" name="degrees" class="form-control" id="degrees" placeholder="Degrees"  value="{{$teacher->degrees}}" />
               </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="experience">Institute</label>
               <div class="col-sm-8">
                <input type="text" name="institute" class="form-control" id="institute" placeholder="Institute"  value="{{$teacher->institute}}" />
               </div>
            </div>

              
            <div class="form-group">
              <label class="col-sm-3 control-label" for="email">Email address</label>
              <div class="col-sm-8">
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{$teacher->email}}" />
              </div>
            </div>

        <!--     <div class="form-group">
              <label class="col-sm-3 control-label">Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password"  / >
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-3 control-label">Confirm Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password_confirmation"/ >
              </div>
            </div> -->

     

          <div class="form-group">
            <label class="col-sm-3 control-label" >Telephone</label>
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                  <input type="text" name="teacher_phone" class="form-control" id="teacher_phone" placeholder="Telephone"  value="{{$teacher->teacher_phone}}" />
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
                <input type="text" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="yyyy/mm/dd"  value="{{$teacher->date_of_birth}}" />

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