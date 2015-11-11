@extends('app')


@section('htmlheader_title')
Update Tacher
@endsection


@section('contentheader_title')
<h1>Teacher <small>Update</small></h1>
@endsection


@section('main-content')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Update Teacher: {{$teacher->nickname . ' (' . $teacher->firstname . ' ' . $teacher->lastname . ')'}}</h3>
      </div><!-- /.box-header -->
      <!-- form start -->

      <form class="form-horizontal" role="form" action="{{url("teacher/".$teacher->id)}}" method="post" enctype="multipart/form-data">
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
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" value="{{$teacher->firstname}}"/>
              </div>
              <div class="col-sm-4">
                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name" value="{{$teacher->lastname}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label" for="name">Nick Name</label>
              <div class="col-sm-4">
                <input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nick Name" value="{{$teacher->nickname}}" />
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
            <label class="col-sm-3 control-label" >Telephone</label>
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                  <input type="text" name="teacher_phone" class="form-control" id="teacher_phone" placeholder="Telephone" data-inputmask="&quot;mask&quot;: &quot;999-999-9999&quot;" data-mask="" value="{{$teacher->teacher_phone}}">
                  
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
                <input type="text" name="human-format" class="form-control" id="human-format"  placeholder="DD/MM/YYYY" value="{{date('j/m/Y', strtotime($teacher->date_of_birth))}}" />
                <input type="hidden" id="date_of_birth" name="date_of_birth" />
            </div>
          </div>
        </div><!-- /.box-body -->


          <div class="form-group">
            <label class="col-sm-3 control-label" for="profile_picture">Profile Picture</label>
            <div class="col-sm-8">
              <div class="input-group">
                <input type="file" name="profile_picture" id="profile_picture" />
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->


        <div class="box-footer text-right">
          <a href="{{url('teacher')}}" class="btn btn-default">Cancel</a>
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


<script type="text/javascript">
  $(function () {
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("[data-mask]").inputmask();
  });

  $(document).ready(function(){
    $('#human-format').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "startDate": moment(),
        "maxDate" : moment(),
        "minDate": "01/01/1900",
        "format": 'DD/MM/YYYY',
    }, function(date){
        //console.log('Class date: ' + date.format('YYYY-MM-DD'));
        $("#date_of_birth").val(date.format('YYYY-MM-DD'));
    });


  });
</script>
@endsection