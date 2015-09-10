@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Student <small>add</small></h1>
@endsection


@section('main-content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add a New Student</h3>
			</div><!-- /.box-header -->

			<!-- form start -->
			<form class="form-horizontal" role="form" action="{{url("student")}}" method="post"  enctype="multipart/form-data">

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
							<input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" />
						</div>
						<div class="col-sm-4">
							<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="name">Nick Name</label>
						<div class="col-sm-4">
							<input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nick Name" />
						</div>
					</div>

					
					<div class="form-group">
						<label class="col-sm-3 control-label" for="email">Email address</label>
						<div class="col-sm-8">
							<input type="email" name="email" class="form-control" id="email" placeholder="Enter E-mail" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="inputPassword" placeholder="Confirm Password" name="password">
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label">Confirm Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="inputPassword" placeholder="Confirm Password" name="password_confirmation">
						</div>
					</div>

					

					<div class="form-group">
						<label class="col-sm-3 control-label" >Student Phone</label>
						<div class="col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" name="student_phone" class="form-control" id="student_phone" placeholder="Student Phone" data-inputmask="&quot;mask&quot;: &quot;999-999-9999&quot;" data-mask="">
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
								<input type="text" name="parent_phone" class="form-control" id="parent_phone" placeholder="Parent Phone" data-inputmask="&quot;mask&quot;: &quot;999-999-9999&quot;" data-mask="">
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
								<input type="text" name="human-format" class="form-control" id="human-format" placeholder="DD/MM/YYYY"/>
                				<input type="hidden" id="date_of_birth" name="date_of_birth" value=""/>

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


					<div class="box-footer text-right">
						<a href="{{url('student')}}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>

				</div>
			</form>
		</div>
		<div class="col-md-2">
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