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
      <form class="form-horizontal" role="form">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-3 control-label" for="name">Name</label>
            <div class="col-sm-4">
              <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Firstname" />
            </div>
            <div class="col-sm-4">
              <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Lastname" />
            </div>
          </div>

           <div class="form-group">
            <label class="col-sm-3 control-label" for="name">Nick Name</label>
            <div class="col-sm-4">
              <input type="text" name="nickname" class="form-control" id="nickname" placeholder="nickname" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="email">Email address</label>
            <div class="col-sm-8"><input type="email" class="form-control" id="email" placeholder="Enter email" /></div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="name">Phone</label>
            <div class="col-sm-4">
              <input type="text" name="phone1" class="form-control" id="phone1" placeholder="Phone1" />
            </div>
            <div class="col-sm-4">
              <input type="text" name="note1" class="form-control" id="note1" placeholder="Note" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="name"></label>
            <div class="col-sm-4">
              <input type="text" name="phone2" class="form-control" id="phone2" placeholder="Phone2" />
            </div>
            <div class="col-sm-4">
              <input type="text" name="note1" class="form-control" id="note2" placeholder="Note" />
            </div>
          </div>

           <div class="form-group">
            <label class="col-sm-3 control-label" for="name"></label>
            <div class="col-sm-4">
              <input type="text" name="phone3" class="form-control" id="phone3" placeholder="Phone3" />
            </div>
            <div class="col-sm-4">
              <input type="text" name="note3" class="form-control" id="note3" placeholder="Note" />
            </div>
          </div>
          
          

       
          <div class="form-group">
            <label class="col-sm-3 control-label" for="date_of_birth">Date of Birth</label>
            <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputFile" class="col-sm-3 control-label">File input</label>
                <input type="file" id="exampleInputFile">
            <p class="help-block col-sm-3 ">Example block-level help text here.</p>
          </div>

        </div><!-- /.box-body -->

      

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
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