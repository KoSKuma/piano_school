@extends('app')


@section('htmlheader_title')
Add a new student
@endsection


@section('contentheader_title')
<h1>Student <small>Update</small></h1>
@endsection


@section('main-content')
<div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Update Student: {{$student->nickname}} ({{$student->firstname. ' ' .$student->lastname}})</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" role="form" action="{{url("student/".$student->id)}}" method="post"  enctype="multipart/form-data">
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
							<input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" value="{{$student->firstname}}" />
						</div>
						<div class="col-sm-4">
							<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name" value="{{$student->lastname}}" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="name">Nick Name</label>
						<div class="col-sm-4">
							<input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nick Name" value="{{$student->nickname}}" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="email">Email</label>
						<div class="col-sm-8">
							<input type="text" name="email" class="form-control" id="email" placeholder="E-mail" value="{{$student->email}}" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" >Student Phone</label>
						<div class="col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" name="student_phone" class="form-control" id="student_phone" placeholder="Student Phone" value="{{$student->student_phone}}"/>
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
								<input type="text" name="parent_phone" class="form-control" id="parent_phone" placeholder="Parent Phone"  value="{{$student->parent_phone}}"/>
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
								<input type="text" name="human-format" class="form-control" id="human-format"  placeholder="DD/MM/YYYY" value="{{date('j/m/Y', strtotime($student->date_of_birth))}}" />
                				<input type="hidden" id="date_of_birth" name="date_of_birth" />
							</div>
						</div>
					</div>


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
					<a href="{{url('student')}}" class="btn btn-default">Cancel</a>
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


  $(document).ready(function(){
  	$("[data-mask]").inputmask();
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